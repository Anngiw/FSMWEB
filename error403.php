<?php
// error403.php
// Al estar en la raíz, solo necesitamos entrar a backend/controllers/
require_once __DIR__ . '/backend/controllers/authController.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Tiempo de bloqueo restante en segundos
$tiempo_restante = 0;
if (isset($_SESSION['bloqueo_seguridad'])) {
    $tiempo_restante = $_SESSION['bloqueo_seguridad'] - time();
    if ($tiempo_restante <= 0) {
        unset($_SESSION['bloqueo_seguridad']);
        header("Location: admin/vistas/login.php");
        exit();
    }
} else {
    header("Location: admin/vistas/login.php");
    exit();
}

$minutos = ceil($tiempo_restante / 60);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso Restringido | FSM</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/error.css">
</head>
<body>
    <div class="error-container">
        <div class="error-icon">
            <i class="fas fa-user-shield"></i>
        </div>
        <h1>Acceso Bloqueado</h1>
        <p>Has superado el número máximo de intentos permitidos. Por motivos de seguridad, tu acceso ha sido suspendido temporalmente.</p>
        <p>Inténtalo de nuevo en aproximadamente <span class="timer"><?php echo $minutos; ?> minuto(s)</span>.</p>
    </div>
</body>
</html>