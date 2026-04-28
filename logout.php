<?php
// logout.php
require_once __DIR__ . '/backend/controllers/authController.php';

$auth = new AuthController();

// Ejecutamos la lógica del controlador
if ($auth->cerrarSesion()) {
    // Al terminar, enviamos al usuario al login
    // Nota: Si ya estás en producción, la ruta podría ser solo /admin/vistas/login.php
    header("Location: admin/vistas/login.php");
    exit();
}