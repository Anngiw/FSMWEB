<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Voluntariado | FSM Admin</title>
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
            <span>CONFIGURACIÓN DE VOLUNTARIADO</span>
        </div>
        
        <section class="form-container-center">
            <form action="api/update_voluntariado.php" method="POST" enctype="multipart/form-data" class="admin-main-form">

                <div class="form-section-block">
                    <div class="form-block-title">
                        <i class="fas fa-qrcode"></i> Registro y Acceso Rápido
                    </div>

                    <div class="form-row-grid">
                        <div class="input-group">
                            <label>Link del Formulario de Inscripción</label>
                            <div class="input-with-icon">
                                <i class="fas fa-link"></i>
                                <input type="url" name="link_formulario" placeholder="https://forms.gle/..." required>
                            </div>
                        </div>

                        <div class="input-group">
                            <label>Imagen Código QR (Nueva carga)</label>
                            <div class="input-with-icon">
                                <i class="fas fa-image"></i>
                                <input type="file" name="qr_image" accept="image/*" style="padding-top: 10px;">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-section-block">
                    <div class="form-block-title">
                        <i class="fas fa-comments"></i> Testimonios de Experiencia (Máximo 6)
                    </div>

                    <?php for($i = 1; $i <= 6; $i++): ?>
                    <div class="voluntario-card-edit" style="background: #fcfdfe; border: 1.5px solid #edf2f7; padding: 25px; border-radius: 20px; margin-bottom: 25px;">
                        <span style="font-weight: 800; color: #adb5bd; font-size: 0.7rem; letter-spacing: 1px;">TESTIMONIO #<?php echo $i; ?></span>
                        
                        <div class="form-row-grid" style="margin-top: 15px;">
                            <div class="input-group">
                                <label>Nombre Completo</label>
                                <div class="input-with-icon">
                                    <i class="fas fa-user"></i>
                                    <input type="text" name="vol_nombre_<?php echo $i; ?>" placeholder="Ej: Juan Pablo" required>
                                </div>
                            </div>

                            <div class="input-group">
                                <label>Rol / Título</label>
                                <div class="input-with-icon">
                                    <i class="fas fa-id-badge"></i>
                                    <input type="text" name="vol_rol_<?php echo $i; ?>" placeholder="Ej: Practicante Universitario" required>
                                </div>
                            </div>

                            <div class="input-group">
                                <label>Iniciales (Círculo)</label>
                                <div class="input-with-icon">
                                    <i class="fas fa-font"></i>
                                    <input type="text" name="vol_iniciales_<?php echo $i; ?>" placeholder="Ej: JP" maxlength="2" style="text-transform: uppercase;" required>
                                </div>
                            </div>
                        </div>

                        <div class="input-group full-width" style="margin-top: 15px;">
                            <label>Comentario / Perspectiva</label>
                            <div class="input-with-icon" style="align-items: flex-start;">
                                <i class="fas fa-quote-left" style="margin-top: 15px;"></i>
                                <textarea name="vol_comentario_<?php echo $i; ?>" placeholder="Escribe el comentario aquí..." style="width: 100%; padding: 12px 15px 12px 45px; border: 1.5px solid #edf2f7; border-radius: 12px; font-family: 'Montserrat'; min-height: 80px; resize: none;" required></textarea>
                            </div>
                        </div>
                    </div>
                    <?php endfor; ?>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-fsm-standard">
                        <i class="fas fa-save"></i> Guardar Configuración de Voluntariado
                    </button>
                </div>

            </form>
        </section>
    </main>

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