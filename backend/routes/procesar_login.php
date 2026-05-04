<?php
// backend/routes/procesar_login.php

// Requerimos controladores y modelos
require_once __DIR__ . '/../controllers/authController.php';
require_once __DIR__ . '/../models/usuario.php';

// Iniciamos la sesión si no está activa
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// 1. CONSTRUCCIÓN DE LA URL BASE: Se adapta según el entorno
$protocolo = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
$host = $_SERVER['HTTP_HOST'];
$url_base = ($host === 'localhost' || $host === '127.0.0.1') ? $protocolo . $host . "/FSMWEB/" : $protocolo . $host . "/";

// 2. VALIDAR BLOQUEO EN SESIÓN: Si el usuario ya está bloqueado en sesión, le impedimos el paso
if (isset($_SESSION['bloqueo_seguridad']) && time() < $_SESSION['bloqueo_seguridad']) {
    header("Location: " . $url_base . "error403.php");
    exit();
}

// 3. RESTRICCIÓN POR MÉTODO: Solo permitimos peticiones POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../../admin/vistas/login.php");
    exit();
}

// 4. VALIDACIÓN ANTI-CSRF: Verificamos el token de seguridad para prevenir ataques
if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    header("Location: ../../admin/vistas/login.php?error=csrf");
    exit();
}

try {
    $auth = new AuthController();
    $modelo = new Usuario();

    // Capturamos y sanitizamos el identificador (Correo) y la clave
    $identificador = isset($_POST['identificador']) ? trim(filter_var($_POST['identificador'], FILTER_SANITIZE_EMAIL)) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    // 5. VERIFICAR BLOQUEO EN BASE DE DATOS: Antes de verificar credenciales, consultamos si está bloqueado en la DB
    $usuarioDb = $modelo->buscarPorCorreo($identificador);

    if ($usuarioDb === false) {
        throw new Exception("No se pudo consultar el usuario en la base de datos.");
    }

    if ($usuarioDb && !empty($usuarioDb['fecha_bloqueo'])) {
        if (time() < strtotime($usuarioDb['fecha_bloqueo'])) {
            // El bloqueo sigue activo: guardamos el tiempo en sesión y redirigimos
            $_SESSION['bloqueo_seguridad'] = strtotime($usuarioDb['fecha_bloqueo']);
            header("Location: " . $url_base . "error403.php");
            exit();
        } else {
            // El bloqueo ya expiró: procedemos a desbloquearlo en la DB
            $modelo->desbloquearUsuario($usuarioDb['id']);
        }
    }

    // 6. LÓGICA DE INICIO DE SESIÓN
    if (!empty($identificador) && !empty($password)) {
        // Llamamos al controlador de autenticación para comprobar la clave hasheada
        if ($auth->iniciarSesion($identificador, $password)) {
            
            // ÉXITO: Limpiamos los contadores de intentos fallidos y bloqueos
            unset($_SESSION['intentos_login']);
            unset($_SESSION['intentos_identidad']);
            unset($_SESSION['bloqueo_seguridad']);
            
            // Regeneramos el ID de la sesión por seguridad contra secuestro de sesiones
            session_regenerate_id(true);
            header("Location: ../../admin/vistas/panel.php");
            exit();
        } else {
            // ERROR: Credenciales inválidas. Incrementamos el contador
            if (!isset($_SESSION['intentos_login'])) {
                $_SESSION['intentos_login'] = 0;
            }
            $_SESSION['intentos_login']++;

            // Si falla 3 veces, redirigimos a recuperación de contraseña
            if ($_SESSION['intentos_login'] >= 3) {
                unset($_SESSION['intentos_login']);
                header("Location: ../../admin/vistas/olvide_password.php?mensaje=limite_intentos");
                exit();
            } else {
                header("Location: ../../admin/vistas/login.php?error=1");
                exit();
            }
        }
    } else {
        // Datos vacíos
        header("Location: ../../admin/vistas/login.php?error=vacio");
        exit();
    }
} catch (Exception $e) {
    // Si algo falla, se guarda en el log y se muestra error controlado
    error_log("Error en procesar_login.php: " . $e->getMessage());
    header("Location: ../../admin/vistas/login.php?error=db");
    exit();
}