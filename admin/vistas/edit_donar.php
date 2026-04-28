<?php
require_once 'check_session.php'; 
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Donaciones | FSM Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="../css/sidebar_include.css">
    <link rel="stylesheet" href="../css/header_include.css">
    <link rel="stylesheet" href="../css/formularios.css">
</head>

<body>
    <div class="sidebar-overlay" id="overlay"></div>

    <?php include 'includes/sidebar.php'; ?>

    <main class="panel-main">
        <?php include 'includes/heder_include.php'; ?>

        <div class="section-divider">
            <span>CONFIGURACIÓN DE MÉTODOS DE DONACIÓN</span>
        </div>
        
        <section class="form-container-center">
            <form action="api/update_donaciones.php" method="POST" enctype="multipart/form-data" class="admin-main-form">

                <div class="form-section-block">
                    <div class="form-block-title">
                        <i class="fas fa-mobile-screen-button"></i> Monederos Digitales
                    </div>
                    
                    <div class="input-group full-width" style="margin-bottom: 25px; background: #f8f9ff; padding: 15px; border-radius: 12px; border: 1px dashed #090540;">
                        <label style="color: #090540;">Número de Contacto (Nequi y DaviPlata)</label>
                        <div class="input-with-icon">
                            <i class="fas fa-phone-flip"></i>
                            <input type="text" name="celular_monederos" placeholder="Ej: 300 123 4567" required>
                        </div>
                        <small style="font-size: 0.7rem; color: #666; margin-top: 5px; display: block;">* Este número se mostrará en ambas secciones de monedero digital.</small>
                    </div>

                    <div class="form-row-grid">
                        <div class="input-group">
                            <label>QR Nequi (Imagen)</label>
                            <div class="input-with-icon">
                                <i class="fas fa-qrcode"></i>
                                <input type="file" name="qr_nequi" accept="image/*">
                            </div>
                        </div>
                        <div class="input-group">
                            <label>QR DaviPlata (Imagen)</label>
                            <div class="input-with-icon">
                                <i class="fas fa-qrcode"></i>
                                <input type="file" name="qr_daviplata" accept="image/*">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-section-block">
                    <div class="form-block-title">
                        <i class="fas fa-building-columns"></i> Cuenta Bancaria
                    </div>
                    
                    <div class="form-row-grid">
                        <div class="input-group">
                            <label>Nombre del Banco</label>
                            <div class="input-with-icon">
                                <i class="fas fa-university"></i>
                                <input type="text" name="banco_nombre" placeholder="BBVA" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-row-grid" style="margin-top: 20px;">
                        <div class="input-group">
                            <label>Número de Cuenta</label>
                            <div class="input-with-icon">
                                <i class="fas fa-hashtag"></i>
                                <input type="text" name="banco_numero" placeholder="#18087065-1" required>
                            </div>
                        </div>
                        <div class="input-group">
                            <label>NIT de la Fundación</label>
                            <div class="input-with-icon">
                                <i class="fas fa-address-card"></i>
                                <input type="text" name="banco_nit" placeholder="#830.043.416" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-fsm-standard">
                        <i class="fas fa-save"></i> Guardar Cambios en Donaciones
                    </button>
                </div>

            </form>
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

        if(btnOpen) btnOpen.addEventListener('click', toggleMenu);
        overlay.addEventListener('click', toggleMenu);
    </script>
</body>
</html>