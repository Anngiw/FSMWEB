<?php
// backend/routes/procesar_perfil.php
header('Content-Type: application/json');
require_once __DIR__ . '/../controllers/authController.php';
session_start();

$response = ['status' => 'error', 'message' => 'Ocurrió un error inesperado.'];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['user_id'])) {
    $auth = new AuthController();
    
    $id = $_SESSION['user_id'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $password = $_POST['nueva_password'];
    $passwordHasheada = !empty($password) ? password_hash($password, PASSWORD_BCRYPT) : null;

    if ($auth->actualizarPerfil($id, $nombre, $correo, $telefono, $passwordHasheada)) {
        $response = ['status' => 'success', 'message' => 'Perfil actualizado con éxito.'];
    } else {
        $response = ['status' => 'error', 'message' => 'No se pudo actualizar el perfil.'];
    }
}

echo json_encode($response);
exit();