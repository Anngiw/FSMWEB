<?php
session_start();
if (!isset($_SESSION['temp_user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Contraseña | FSM</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../css/recuperacion.css">
</head>
<body class="recovery-page">
    <div class="recovery-card">
        <div class="recovery-logo" style="color: #1a005c;">
            <i class="fas fa-lock-open"></i>
        </div>
        <h2>Actualizar Clave</h2>
        <p>Crea una nueva contraseña segura debe tener Entre mayuscula, minuscula, numero y simbolo para acceder al panel.</p>

        <?php if(isset($_GET['error'])): ?>
            <div class="alert-error">
                <i class="fas fa-exclamation-triangle"></i> Verifica los datos e intenta de nuevo.
            </div>
        <?php endif; ?>

        <form action="../../backend/routes/actualizar_password.php" method="POST">
            <div class="input-group">
                <label>Nueva Contraseña</label>
                <div class="input-field">
                    <i class="fas fa-key"></i>
                    <input type="password" name="pass1" placeholder="Mínimo 8 caracteres: MnGnd12#" required minlength="8">
                </div>
            </div>

            <div class="input-group">
                <label>Confirmar Contraseña</label>
                <div class="input-field">
                    <i class="fas fa-check-circle"></i>
                    <input type="password" name="pass2" placeholder="Repite la clave" required minlength="8">
                </div>
            </div>

            <button type="submit" class="btn-recovery" style="background: #000a55; color: white;">CAMBIAR CONTRASEÑA</button>
        </form>
    </div>
</body>
</html>