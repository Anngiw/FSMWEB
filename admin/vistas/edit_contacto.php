<?php
require_once 'check_session.php'; 
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Información de Contacto | FSM Admin</title>
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
            <span>EDITAR INFORMACIÓN DE CONTACTO</span>
        </div>
        
        <section class="form-container-center">

            <form action="api/update_contacto.php" method="POST" class="admin-main-form">

                <div class="form-section-block">
                    <div class="form-block-title">
                        <i class="fas fa-phone-volume"></i> Información de Comunicación
                    </div>

                    <div class="form-row-grid">
                        <div class="input-group">
                            <label>Teléfono de Atención</label>
                            <div class="input-with-icon">
                                <i class="fas fa-phone"></i>
                                <input type="text" name="telefono" placeholder="+57 300 123 4567" required>
                            </div>
                        </div>

                        <div class="input-group">
                            <label>Correo Electrónico</label>
                            <div class="input-with-icon">
                                <i class="fas fa-envelope"></i>
                                <input type="email" name="email" placeholder="info@fundacion.org" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-section-block">
                    <div class="form-block-title">
                        <i class="fas fa-map-marked-alt"></i> Ubicación de la Sede
                    </div>
                    
                    <div class="input-group full-width" style="margin-bottom: 20px;">
                        <label>Dirección Física</label>
                        <div class="input-with-icon">
                            <i class="fas fa-location-dot"></i>
                            <input type="text" name="direccion" placeholder="Calle 00 # 00 - 00, Bogotá D.C." required>
                        </div>
                    </div>

                    <div class="input-group full-width">
                        <label>Cómo llegar / Indicaciones adicionales</label>
                        <div class="input-with-icon" style="align-items: flex-start;">
                            <i class="fas fa-route" style="margin-top: 15px;"></i>
                            <textarea name="indicaciones" placeholder="Ej: A dos cuadras de la estación principal, frente al parque..." style="width: 100%; padding: 12px 15px 12px 45px; border: 1.5px solid #edf2f7; border-radius: 12px; font-family: 'Montserrat'; min-height: 100px; resize: vertical;"></textarea>
                        </div>
                    </div>
                </div>

                <div class="form-section-block">
                    <div class="form-block-title">
                        <i class="fas fa-clock"></i> Horarios de Atención
                    </div>
                    <div class="form-row-grid">
                        <div class="input-group">
                            <label>Lunes a Viernes</label>
                            <div class="input-with-icon">
                                <i class="fas fa-calendar-day"></i>
                                <input type="text" name="horario_lv" placeholder="8:00 AM - 5:00 PM" required>
                            </div>
                        </div>
                        <div class="input-group">
                            <label>Sábados y Domingos</label>
                            <div class="input-with-icon">
                                <i class="fas fa-calendar-week"></i>
                                <input type="text" name="horario_sd" placeholder="9:00 AM - 12:00 PM" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-fsm-standard">
                        <i class="fas fa-save"></i> Guardar Toda la Información
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