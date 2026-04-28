<?php
// Aseguramos que el controlador esté disponible
require_once __DIR__ . '/../../backend/controllers/authController.php';

$auth = new AuthController();

/**CANDADO PARA CACHÉ (Crítico para el botón "atrás")*/
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.

/**VALIDACIÓN DE SESIÓN*/
if (!$auth->verificarSesion()) {
    // Si la sesión no es válida, limpiamos todo y lo sacamos
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    session_unset();
    session_destroy();
    
    // Redirección forzada
    header("Location: login.php");
    exit(); // 
}