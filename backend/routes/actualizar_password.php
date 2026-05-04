<?php
// backend/routes/actualizar_password.php

// 1. RESTRICCIÓN POR MÉTODO: Solo se permiten peticiones POST directas
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(403);
    die("Acceso directo no permitido."); 
}

// Requerimos los archivos lógicos del sistema
require_once __DIR__ . '/../controllers/authController.php';
require_once __DIR__ . '/../models/usuario.php';

// Iniciamos la sesión si no está iniciada previamente
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// 2. RESTRICCIÓN POR SESIÓN: Valida si el usuario pasó previamente por la verificación de identidad
if (!isset($_SESSION['temp_user_id'])) {
    header("Location: ../../admin/vistas/login.php");
    exit();
}

try {
    // Capturamos las contraseñas introducidas
    $p1 = isset($_POST['pass1']) ? $_POST['pass1'] : '';
    $p2 = isset($_POST['pass2']) ? $_POST['pass2'] : '';
    
    $auth = new AuthController();
    $modelo = new Usuario();

    // 3. VALIDACIÓN DE LOS DATOS
    if (!empty($p1) && !empty($p2)) {
        // Comprobamos si las dos contraseñas son idénticas y si cumplen las reglas de seguridad
        if ($p1 === $p2 && $auth->esPasswordSegura($p1)) {
            
            // Ejecutamos la actualización de la contraseña en la DB mediante el ID almacenado en la sesión
            if ($modelo->actualizarPassword($_SESSION['temp_user_id'], $p1)) {
                
                // Limpiamos las variables de sesión temporal utilizadas en la recuperación
                unset($_SESSION['temp_user_id']);
                unset($_SESSION['correo_verificado']);
                
                // Destruimos la sesión actual por completo para obligar a un inicio de sesión limpio
                if (session_status() === PHP_SESSION_ACTIVE) {
                    session_destroy();
                }
                
                // Redirigimos con mensaje de éxito
                header("Location: ../../admin/vistas/login.php?mensaje=exito_recuperacion");
                exit();
            } else {
                // Fallo en la base de datos al realizar el Update
                header("Location: ../../admin/vistas/nueva_password.php?error=db");
                exit();
            }
        } else {
            // Las contraseñas no coinciden o no son seguras
            header("Location: ../../admin/vistas/nueva_password.php?error=1");
            exit();
        }
    } else {
        // Los campos están vacíos
        header("Location: ../../admin/vistas/nueva_password.php?error=campos");
        exit();
    }
} catch (Exception $e) {
    // Si algo falla, se registra en el log y se redirige con error amigable
    error_log("Error en actualizar_password.php: " . $e->getMessage());
    header("Location: ../../admin/vistas/nueva_password.php?error=db");
    exit();
}