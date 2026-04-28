<?php
// Si el método de envío no es POST, rechaza la conexión de inmediato
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(403); // Envía un error 403 manual
    die("Acceso directo no permitido."); 
}

// backend/routes/validar_identidad.php
require_once __DIR__ . '/../controllers/authController.php';

// Si alguien intenta entrar escribiendo la URL (GET) en lugar de enviar el formulario (POST)
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../../admin/vistas/olvide_password.php");
    exit();
}

$auth = new AuthController();
$email = isset($_POST['email']) ? $_POST['email'] : '';
$tel = isset($_POST['telefono']) ? $_POST['telefono'] : '';

if ($auth->validarIdentidad($email, $tel)) {
    header("Location: ../../admin/vistas/nueva_password.php");
} else {
    header("Location: ../../admin/vistas/olvide_password.php?error=1");
}
exit();