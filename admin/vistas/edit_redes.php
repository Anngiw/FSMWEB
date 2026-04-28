<?php
require_once 'check_session.php'; 
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Redes Sociales | FSM Admin</title>
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
            <span>EDITAR REDES SOCIALES</span>
        </div>
        
        <section class="form-container-center">

            <form action="api/update_redes.php" method="POST" class="admin-main-form">

                <div class="form-section-block">
                    <div class="form-block-title">
                        <i class="fas fa-share-nodes"></i> Presencia Digital (Social Media)
                    </div>

                    <div class="form-row-grid">
                        <div class="input-group">
                            <label>Facebook</label>
                            <div class="input-with-icon">
                                <i class="fab fa-facebook-f"></i>
                                <input type="url" name="facebook" placeholder="https://facebook.com/fundacion" required>
                            </div>
                        </div>

                        <div class="input-group">
                            <label>Instagram</label>
                            <div class="input-with-icon">
                                <i class="fab fa-instagram"></i>
                                <input type="url" name="instagram" placeholder="https://instagram.com/fundacion" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-row-grid" style="margin-top: 25px;">
                        <div class="input-group">
                            <label>TikTok</label>
                            <div class="input-with-icon">
                                <i class="fab fa-tiktok"></i>
                                <input type="url" name="tiktok" placeholder="https://tiktok.com/@fundacion" required>
                            </div>
                        </div>

                        <div class="input-group">
                            <label>YouTube</label>
                            <div class="input-with-icon">
                                <i class="fab fa-youtube"></i>
                                <input type="url" name="youtube" placeholder="https://youtube.com/c/fundacion" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-section-block">
                    <div class="form-block-title">
                        <i class="fas fa-comment-dots"></i> Canal de Contacto Directo
                    </div>
                    
                    <div class="input-group full-width">
                        <label>WhatsApp (Link o Número)</label>
                        <div class="input-with-icon">
                            <i class="fab fa-whatsapp"></i>
                            <input type="text" name="whatsapp" placeholder="Ej: https://wa.me/573001234567" required>
                        </div>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-fsm-standard">
                        <i class="fas fa-save"></i> Actualizar Redes Sociales
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