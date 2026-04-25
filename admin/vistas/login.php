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
            <form>
                <h2>Bienvenida</h2>
                <p class="intro-text">Ingresa tus datos para gestionar el panel</p>

                <div class="input-group">
                    <label>Usuario / Email</label>
                    <div class="field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Correo electrónico" required>
                    </div>
                </div>

                <div class="input-group">
                    <label>Contraseña</label>
                    <div class="field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="••••••••" required>
                    </div>
                </div>

                <div class="form-options">
                    <a href="#">¿Olvidaste tu contraseña?</a>
                </div>

                <button type="button" class="btn-access">INGRESAR AL PANEL</button>
            </form>
        </section>
    </div>

    <a href="../../index.php" class="btn-home-pro">
        <i class="fas fa-house"></i>
    </a>

</body>
</html>