<?php
// backend/routes/validar_identidad.php

// 1. INICIALIZACIÓN DE SESIONES: Si no está activa, la iniciamos
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Requerimos los controladores y modelos necesarios para procesar la validación
require_once __DIR__ . '/../controllers/authController.php';
require_once __DIR__ . '/../models/usuario.php';

// 2. CONSTRUCCIÓN DE LA URL BASE: Se adapta dinámicamente tanto en local como en producción
$protocolo = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
$host = $_SERVER['HTTP_HOST'];
$url_base = ($host === 'localhost' || $host === '127.0.0.1') ? $protocolo . $host . "/FSMWEB/" : $protocolo . $host . "/";

// 3. RESTRICCIÓN DE ACCESO: Solo se permiten peticiones mediante POST (desde el formulario)
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: " . $url_base . "error404.php");
    exit();
}

// Inicializamos el contador de intentos de validación de identidad si no existe
if (!isset($_SESSION['intentos_identidad'])) {
    $_SESSION['intentos_identidad'] = 0;
}

try {
    // Instanciamos el controlador y el modelo
    $auth = new AuthController();
    $modelo = new Usuario();

    // Capturamos y limpiamos las entradas enviadas por el formulario
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $tel = isset($_POST['telefono']) ? trim($_POST['telefono']) : '';

    // Buscamos si el usuario existe en la base de datos por su correo
    $usuarioDb = $modelo->buscarPorCorreo($email);

    // Si ocurre un error en la base de datos (retorna false), lanzamos una excepción
    if ($usuarioDb === false) {
        throw new Exception("Error al consultar la base de datos.");
    }

    // 4. CONTROL DE BLOQUEO: Verificamos si el usuario ya está bloqueado en la base de datos
    if ($usuarioDb && !empty($usuarioDb['fecha_bloqueo'])) {
        if (time() < strtotime($usuarioDb['fecha_bloqueo'])) {
            // Si el tiempo de bloqueo no ha expirado, guardamos en sesión y redirigimos a la vista de bloqueo
            $_SESSION['bloqueo_seguridad'] = strtotime($usuarioDb['fecha_bloqueo']);
            header("Location: " . $url_base . "error403.php");
            exit();
        } else {
            // Si el tiempo ya expiró, desbloqueamos automáticamente al usuario
            $modelo->desbloquearUsuario($usuarioDb['id']);
        }
    }

    // 5. EVALUACIÓN DE LAS CREDENCIALES INTRODUCIDAS
    if (!empty($email) && !empty($tel)) {
        // Validamos si el teléfono coincide con el registrado en la base de datos
        if ($usuarioDb && trim($usuarioDb['telefono']) === $tel) {
            
            // ÉXITO: Limpiamos los intentos fallidos
            unset($_SESSION['intentos_identidad']);
            // Guardamos datos en sesión temporal para autorizar el cambio de contraseña en la siguiente vista
            $_SESSION['correo_verificado'] = $email;
            $_SESSION['temp_user_id'] = $usuarioDb['id'];
            
            header("Location: " . $url_base . "admin/vistas/nueva_password.php");
            exit();
        } else {
            // ERROR EN CREDENCIALES: Incrementamos el contador de intentos fallidos
            $_SESSION['intentos_identidad']++;

            // Si falla 2 veces, bloqueamos al usuario por 1 hora (3600 segundos)
            if ($_SESSION['intentos_identidad'] >= 2) {
                unset($_SESSION['intentos_identidad']); 
                $_SESSION['bloqueo_seguridad'] = time() + 3600;

                if ($usuarioDb) {
                    $modelo->bloquearUsuario($usuarioDb['id'], 3600);
                }

                header("Location: " . $url_base . "error403.php");
                exit();
            } else {
                header("Location: " . $url_base . "admin/vistas/olvide_password.php?error=1");
                exit();
            }
        }
    } else {
        // ERROR: Si los campos están vacíos se cuenta como intento fallido para mitigar ataques de fuerza bruta
        $_SESSION['intentos_identidad']++;
        if ($_SESSION['intentos_identidad'] >= 2) {
            unset($_SESSION['intentos_identidad']);
            $_SESSION['bloqueo_seguridad'] = time() + 3600;

            if ($usuarioDb) {
                $modelo->bloquearUsuario($usuarioDb['id'], 3600);
            }

            header("Location: " . $url_base . "error403.php");
            exit();
        } else {
            header("Location: " . $url_base . "admin/vistas/olvide_password.php?error=1");
            exit();
        }
    }
} catch (Exception $e) {
    // Registramos el error capturado y redirigimos a una vista con error controlado
    error_log("Error en validar_identidad.php: " . $e->getMessage());
    header("Location: " . $url_base . "admin/vistas/olvide_password.php?error=db");
    exit();
}