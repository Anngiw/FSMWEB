<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión Sobre Nosotros | FSM Admin</title>
    
    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="../css/formularios.css">
    <link rel="stylesheet" href="../css/sidebar_include.css">
    <link rel="stylesheet" href="../css/header_include.css">
    
    <link rel="stylesheet" href="../css/nosotros_cards.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="sidebar-overlay" id="overlay"></div>

    <?php include 'includes/sidebar.php'; ?>

    <main class="panel-main">
        <?php include 'includes/heder_include.php'; ?>

        <div class="section-divider">
            <span>GESTIÓN DE IDENTIDAD INSTITUCIONAL</span>
        </div>

        <div class="nosotros-grid-menu">
            <div class="card-seccion" onclick="mostrarSeccion('form-filosofia')">
                <i class="fas fa-lightbulb"></i>
                <h3>Filosofía</h3>
            </div>
            <div class="card-seccion" onclick="mostrarSeccion('form-actualidad')">
                <i class="fas fa-calendar-alt"></i>
                <h3>Actualidad</h3>
            </div>
            <div class="card-seccion" onclick="mostrarSeccion('form-causa')">
                <i class="fas fa-hand-holding-heart"></i>
                <h3>Nuestra Causa</h3>
            </div>
            <div class="card-seccion" onclick="mostrarSeccion('form-equipo')">
                <i class="fas fa-users-gear"></i>
                <h3>Equipo</h3>
            </div>
        </div>

        <div id="form-filosofia" class="form-desplegable">
            <form action="api/update_filosofia.php" method="POST" class="admin-main-form">
                <div class="form-section-block">
                    <div class="form-block-title">Editar Misión y Visión</div>
                    <div class="input-group full-width">
                        <label>Misión Institucional</label>
                        <textarea name="mision" required></textarea>
                    </div>
                    <div class="input-group full-width">
                        <label>Visión Institucional</label>
                        <textarea name="vision" required></textarea>
                    </div>
                </div>
                <button type="submit" class="btn-fsm-standard">Guardar Filosofía</button>
            </form>
        </div>

        <div id="form-actualidad" class="form-desplegable">
            <form action="api/update_actualidad.php" method="POST" enctype="multipart/form-data" class="admin-main-form">
                <div class="form-section-block">
                    <div class="form-block-title">Sección Actualidad (Historia)</div>
                    <div class="form-row-grid">
                        <div class="input-group"><label>Título</label><input type="text" name="act_titulo"></div>
                        <div class="input-group"><label>Tiempo (Años)</label><input type="text" name="act_tiempo"></div>
                    </div>
                    <div class="input-group full-width">
                        <label>Imagen de la Etapa</label>
                        <input type="file" name="act_img">
                    </div>
                    <div class="input-group full-width">
                        <label>Texto Descriptivo</label>
                        <textarea name="act_texto"></textarea>
                    </div>
                </div>
                <button type="submit" class="btn-fsm-standard">Actualizar Actualidad</button>
            </form>
        </div>

        <div id="form-causa" class="form-desplegable">
            <form action="api/update_causa.php" method="POST" enctype="multipart/form-data" class="admin-main-form">
                <div class="form-section-block">
                    <div class="form-block-title">Testimonios de Nuestra Causa</div>
                    <?php for($i=1; $i<=3; $i++): ?>
                    <div class="testimonio-box" style="margin-bottom: 30px; border-bottom: 1px solid #eee; padding-bottom: 20px;">
                        <label>Beneficiario <?php echo $i; ?></label>
                        <div class="form-row-grid">
                            <div class="input-group"><input type="text" name="cau_nombre_<?php echo $i; ?>" placeholder="Nombre"></div>
                            <div class="input-group"><input type="file" name="cau_img_<?php echo $i; ?>"></div>
                        </div>
                        <textarea name="cau_texto_<?php echo $i; ?>" maxlength="254" placeholder="Testimonio (Máx 254 caracteres)"></textarea>
                    </div>
                    <?php endfor; ?>
                </div>
                <button type="submit" class="btn-fsm-standard">Guardar Causa</button>
            </form>
        </div>

        <div id="form-equipo" class="form-desplegable">
            <form action="api/update_equipo.php" method="POST" enctype="multipart/form-data" class="admin-main-form">
                
                <div class="form-section-block">
                    <div class="form-block-title">Card 1: Gestión Administrativa</div>
                    <div class="form-row-grid">
                        <div class="input-group"><label>Nombre</label><input type="text" name="e_nom_1"></div>
                        <div class="input-group"><label>Foto</label><input type="file" name="e_img_1"></div>
                    </div>
                    <div class="input-group full-width"><label>Rol</label><input type="text" name="e_rol_1"></div>
                    <textarea name="e_desc_1" placeholder="Descripción..."></textarea>
                </div>

                <div class="form-section-block" style="border: 2px solid #090540;">
                    <div class="form-block-title">Card 2: Coordinación (Doble Perfil)</div>
                    <div class="form-row-grid">
                        <div class="input-group"><label>Título General</label><input type="text" name="e_titulo_c2" value="COORDINACIÓN Y CUIDADO INTEGRAL"></div>
                        <div class="input-group"><label>Foto Principal</label><input type="file" name="e_img_2"></div>
                    </div>

                    <div class="equipo-double-layout">
                        <div class="perfil-block">
                            <label>Nombre Perfil A</label>
                            <input type="text" name="e_nom_2a" placeholder="Ej: Milena Zamudio">
                            <label>Texto Perfil A</label>
                            <textarea name="e_desc_2a" rows="4"></textarea>
                        </div>
                        <div class="perfil-block">
                            <label>Nombre Perfil B</label>
                            <input type="text" name="e_nom_2b" placeholder="Ej: Grupo de Cuidadores">
                            <label>Texto Perfil B</label>
                            <textarea name="e_desc_2b" rows="4"></textarea>
                        </div>
                    </div>
                </div>

                <div class="form-section-block">
                    <div class="form-block-title">Card 3: Infraestructura</div>
                    <div class="form-row-grid">
                        <div class="input-group"><label>Nombre</label><input type="text" name="e_nom_3"></div>
                        <div class="input-group"><label>Foto</label><input type="file" name="e_img_3"></div>
                    </div>
                    <div class="input-group full-width"><label>Rol</label><input type="text" name="e_rol_3"></div>
                    <textarea name="e_desc_3" placeholder="Descripción..."></textarea>
                </div>

                <button type="submit" class="btn-fsm-standard">Actualizar Equipo Completo</button>
            </form>
        </div>

    </main>

    <script>
        function mostrarSeccion(id) {
            // Ocultar todos
            document.querySelectorAll('.form-desplegable').forEach(f => f.classList.remove('active'));
            // Mostrar el elegido
            const seleccion = document.getElementById(id);
            seleccion.classList.add('active');
            // Scroll suave
            seleccion.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }

        // Script para el sidebar (el que ya usas)
        const btnOpen = document.getElementById('openSidebar');
        const sidebar = document.querySelector('.panel-sidebar');
        const overlay = document.getElementById('overlay');
        function toggleMenu() { sidebar.classList.toggle('active'); overlay.classList.toggle('active'); }
        if(btnOpen) btnOpen.addEventListener('click', toggleMenu);
        overlay.addEventListener('click', toggleMenu);
    </script>
</body>
</html>