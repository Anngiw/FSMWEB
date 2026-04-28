<?php
// admin/vistas/login.php
// Importamos la lógica del controlador
require_once __DIR__ . '/../../backend/controllers/authController.php';

session_start();

// Si ya hay sesión activa, redirigir al panel directamente
if (isset($_SESSION['user_id'])) {
    header("Location: panel.php");
    exit();
}

// Variables para manejar los mensajes de error o éxito
$error_mensaje = ""; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $auth = new AuthController();
    
    // Capturamos los datos del formulario
    $identificador = isset($_POST['identificador']) ? $_POST['identificador'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    if (!empty($identificador) && !empty($password)) {
        // Intentamos iniciar sesión
        if ($auth->iniciarSesion($identificador, $password)) {
            header("Location: panel.php");
            exit();
        } else {
            $error_mensaje = "Credenciales incorrectas. Intenta de nuevo.";
        }
    } else {
        $error_mensaje = "Por favor, completa todos los campos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | FSM Administración</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../css/login.css">
</head>
<body class="login-page">

    <div class="background-overlay"></div>

    <div class="login-card">
        <aside class="login-aside">
            <div class="aside-content">
                <div class="logo-circle">
                    <img src="../img/logo.png" alt="Logo FSM">
                </div>
                <h1>FSM<span>WEB</span></h1>
                <p>Fundación El Señor de los Milagros</p>
            </div>
        </aside>

        <section class="login-form-area">
            <form method="POST" action="">
                <h2>Bienvenida</h2>
                <p class="intro-text">Ingresa tus datos para gestionar el panel</p>

                <?php if (isset($_GET['mensaje']) && $_GET['mensaje'] == 'exito_recuperacion'): ?>
                    <div class="alert-success" style="background: #d4edda; color: #155724; padding: 12px; border-radius: 8px; margin-bottom: 20px; text-align: center; border: 1px solid #c3e6cb; font-size: 0.9em;">
                        <i class="fas fa-check-circle"></i> ¡Contraseña actualizada con éxito! Ya puedes ingresar.
                    </div>
                <?php endif; ?>

                <?php if ($error_mensaje): ?>
                    <div class="nota-error-login">
                        <i class="fas fa-exclamation-circle"></i> <?php echo $error_mensaje; ?>
                    </div>
                <?php endif; ?>

                <div class="input-group">
                    <label>Usuario / Email</label>
                    <div class="field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="identificador" placeholder="Correo electrónico" required>
                    </div>
                </div>

                <div class="input-group">
                    <label>Contraseña</label>
                    <div class="field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" id="password" placeholder="••••••••" required>
                        <i class="fas fa-eye toggle-pass" id="togglePassword" style="cursor: pointer; margin-left: -30px; z-index: 100; color: #666;"></i>
                    </div>
                </div>

                <div class="form-options">
                    <a href="olvide_password.php">¿Olvidaste tu contraseña?</a>
                </div>

                <button type="submit" class="btn-access">INGRESAR AL PANEL</button>
            </form>
        </section>
    </div>

    <a href="../../index.php" class="btn-home-pro">
        <i class="fas fa-house"></i>
    </a>

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function (e) {
            // Cambiar el tipo de input
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // Cambiar el icono
            this.classList.toggle('fa-eye-slash');
        });
    </script>

</body>
</html>