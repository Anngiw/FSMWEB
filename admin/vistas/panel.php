<?php
require_once 'check_session.php'; 
?><!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | FSM Admin</title>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="../css/panel.css">
    <link rel="stylesheet" href="../css/sidebar_include.css">
    <link rel="stylesheet" href="../css/header_include.css">
    <link rel="stylesheet" href="../css/widgets_include.css">
</head>

<body class="panel-admin-body">

    <div class="sidebar-overlay" id="overlay"></div>

    <?php include 'includes/sidebar.php'; ?>

    <main class="panel-main">

        <?php include 'includes/heder_include.php'; ?>

        <?php include 'includes/widgets.php'; ?>

        <div class="section-divider">
            <span>GESTIÓN DE SECCIONES FRONTEND</span>
        </div>

        <section class="frontend-cards-grid">
            <div class="cms-card">
                <div class="cms-icon"><i class="fas fa-envelope-open-text"></i></div>
                <div class="cms-info">
                    <h4>Contacto</h4>
                    <p>Teléfonos y ubicación.</p>
                </div>
                <a href="edit_contacto.php" class="btn-cms">Modificar</a>
            </div>

            <div class="cms-card">
                <div class="cms-icon"><i class="fas fa-share-nodes"></i></div>
                <div class="cms-info">
                    <h4>Redes Sociales</h4>
                    <p>Instagram y WhatsApp.</p>
                </div>
                <a href="edit_redes.php" class="btn-cms">Modificar</a>
            </div>

            <div class="cms-card">
                <div class="cms-icon"><i class="fas fa-users"></i></div>
                <div class="cms-info">
                    <h4>Voluntariado</h4>
                    <p>Convocatorias activas.</p>
                </div>
                <a href="edit_voluntariado.php" class="btn-cms">Modificar</a>
            </div>

            <div class="cms-card">
                <div class="cms-icon"><i class="fas fa-hand-holding-heart"></i></div>
                <div class="cms-info">
                    <h4>Sobre Nosotros</h4>
                    <p>Historia y Misión.</p>
                </div>
                <a href="edit_nosotros.php" class="btn-cms">Modificar</a>
            </div>
            <div class="cms-card">
                <div class="cms-icon"><i class="fas fa-gift"></i></div>
                <div class="cms-info">
                    <h4>Donar</h4>
                    <p>Qr y Cuenta.</p>
                </div>
                <a href="edit_nosotros.php" class="btn-cms">Modificar</a>
            </div>
        </section>
    </main>
    <script src="../js/anti_back.js"></script>

    <script>
        const btnOpen = document.getElementById('openSidebar');
        const sidebar = document.querySelector('.panel-sidebar');
        const overlay = document.getElementById('overlay');

        function toggleMenu() {
            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');
        }

        btnOpen.addEventListener('click', toggleMenu);
        overlay.addEventListener('click', toggleMenu);
    </script>
    
</body>

</html>