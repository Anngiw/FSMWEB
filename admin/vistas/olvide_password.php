<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Acceso | FSM</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../css/recuperacion.css">
</head>
<body class="recovery-page">
    <div class="recovery-card">
        <div class="recovery-logo">
            <i class="fas fa-user-check"></i>
        </div>
        <h2>Verificar Identidad</h2>
        <p>Para proteger tu cuenta en <strong>FSMWEB</strong>, confirma los datos de registro.</p>

        <?php if(isset($_GET['error'])): ?>
            <div class="alert-error">
                <i class="fas fa-times-circle"></i> Los datos no coinciden.
            </div>
        <?php endif; ?>

        <form action="../../backend/routes/validar_identidad.php" method="POST">
            <div class="input-group">
                <label>Correo Electrónico</label>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" placeholder="ejemplo@correo.com" required>
                </div>
            </div>

            <div class="input-group">
                <label>Teléfono de Contacto</label>
                <div class="input-field">
                    <i class="fas fa-phone-alt"></i>
                    <input type="text" name="telefono" placeholder="Número registrado" required>
                </div>
            </div>

            <button type="submit" class="btn-recovery">CONTINUAR</button>
        </form>

        <div class="recovery-footer">
            <a href="login.php"><i class="fas fa-arrow-left"></i> Volver al Login</a>
        </div>
    </div>
</body>
</html>