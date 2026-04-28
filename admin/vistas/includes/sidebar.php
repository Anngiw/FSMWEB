<?php
require_once 'check_session.php'; 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slidebard</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../../css/sidebar_include.css">
</head>

<body>
    <main>
        <aside class="panel-sidebar">
            <div class="sidebar-header-section">
                <div class="sidebar-brand">
                    <img src="../img/logo.png" alt="Logo FSM" class="panel-logo">
                    <h2>FSM<span>ADMIN</span></h2>
                </div>
            </div>

            <nav class="sidebar-nav">
                <div class="nav-group">PRINCIPAL</div>
                <a href="panel.php" class="nav-link"><i class="fas fa-home"></i><span>Inicio</span></a>

                <div class="nav-group">EDICIÓN FRONTEND</div>
                <a href="edit_contacto.php" class="nav-link"><i class="fas fa-envelope-open-text"></i><span>Contacto</span></a>
                <a href="edit_redes.php" class="nav-link"><i class="fas fa-share-nodes"></i><span>Redes Sociales</span></a>
                <a href="edit_voluntariado.php" class="nav-link"><i class="fas fa-users"></i><span>Voluntariado</span></a>
                <a href="edit_donar.php" class="nav-link"><i class="fas fa-gift"></i><span>Donar</span></a>
                <a href="edit_nosotros.php" class="nav-link"><i class="fas fa-hand-holding-heart"></i><span>Sobre Nosotros</span></a>

                <div class="nav-group">USUARIO</div>
                <a href="editar_perfil.php" class="nav-link">
                    <i class="fas fa-user-shield"></i><span>Mi Perfil</span>
                </a>
            </nav>

            <div class="sidebar-footer-section">
                <div class="sidebar-exit">
                    <a href="../../logout.php" class="btn-logout">
                        <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                    </a>
                </div>
            </div>
        </aside>

        <div id="overlay" class="sidebar-overlay"></div>
    </main>

</body>

</html>