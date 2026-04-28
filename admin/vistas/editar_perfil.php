
<?php

// admin/vistas/editar_perfil.php
require_once __DIR__ . '/../../backend/controllers/authController.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$auth = new AuthController();
// Obtenemos los datos actuales para precargar el formulario
$usuario = $auth->obtenerDatosUsuario($_SESSION['user_id']);
?>
<?php
require_once 'check_session.php'; 
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración de Perfil | FSM</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../css/perfil.css">
    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="../css/sidebar_include.css">
    <link rel="stylesheet" href="../css/header_include.css">

</head>

<body class="admin-page">
    <div class="sidebar-overlay" id="overlay"></div>

    <?php include 'includes/sidebar.php'; ?>
    <main class="panel-main">
        <?php include 'includes/heder_include.php'; ?>

        <div class="main-container">
            <div class="profile-card">
                <header class="profile-header">
                    <div class="header-info">
                        <i class="fas fa-user-cog"></i>
                        <h2>Mi Perfi</h2>
                    </div>
                    <p>Gestiona tu información personal y credenciales de acceso.</p>
                </header>

                <div id="response-message"></div>

                <form id="form-editar-perfil" class="profile-form">
                    <div class="form-grid">
                        <div class="input-group">
                            <label><i class="fas fa-user"></i> Nombre Completo</label>
                            <input type="text" name="nombre" value="<?php echo $usuario['nombre']; ?>" required>
                        </div>

                        <div class="input-group">
                            <label><i class="fas fa-envelope"></i> Correo Electrónico</label>
                            <input type="email" name="correo" value="<?php echo $usuario['correo']; ?>" required>
                        </div>

                        <div class="input-group">
                            <label><i class="fas fa-phone"></i> Teléfono</label>
                            <input type="text" name="telefono" value="<?php echo $usuario['telefono']; ?>" required>
                        </div>

                        <div class="input-group">
                            <label><i class="fas fa-lock"></i> Nueva Contraseña (opcional)</label>
                            <div class="pass-wrapper">
                                <input type="password" name="nueva_password" id="pass_input" placeholder="No escribir para mantener actual">
                                <i class="fas fa-eye toggle-eye" id="toggle_pass"></i>
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn-save">
                            <i class="fas fa-save"></i> GUARDAR CAMBIOS
                        </button>
                        <a href="panel.php" class="btn-cancel">CANCELAR</a>
                    </div>
                </form>
            </div>
        </div>

    </main>

    <script src="../js/perfil.js"></script>
</body>

</html>