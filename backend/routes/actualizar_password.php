<?php
// Si el método de envío no es POST, rechaza la conexión de inmediato
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(403); // Envía un error 403 manual
    die("Acceso directo no permitido."); 
}

require_once __DIR__ . '/../controllers/authController.php';
require_once __DIR__ . '/../models/usuario.php';

session_start();

if (!isset($_SESSION['temp_user_id'])) {
    header("Location: ../../admin/vistas/login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $p1 = $_POST['pass1'];
    $p2 = $_POST['pass2'];
    $auth = new AuthController();
    $modelo = new Usuario();

    // Validar coincidencia y usar tu método de seguridad
    if ($p1 === $p2 && $auth->esPasswordSegura($p1)) {
        $hash = password_hash($p1, PASSWORD_BCRYPT);
        
        if ($modelo->recuperarPasswordPorIdentidad($_SESSION['temp_user_id'], $hash)) {
            unset($_SESSION['temp_user_id']);
            session_destroy();
            header("Location: ../../admin/vistas/login.php?mensaje=exito_recuperacion");
        } else {
            header("Location: ../../admin/vistas/nueva_password.php?error=db");
        }
    } else {
        header("Location: ../../admin/vistas/nueva_password.php?error=1");
    }
    exit();
}