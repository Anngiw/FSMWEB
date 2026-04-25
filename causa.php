<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title class="title-red">Fundación El Señor de Los Milagros</title>
    <link rel="stylesheet" href="css/styles.css">
    <!-- llamo a mis hojas de estilo la global, que es Style, donde se da estilo a el Foother y header, admas de reset y reglas globales-->
    <link rel="stylesheet" href="css/causa.css">
    <!-- llamo a la hoja de estilo que le da el diseño al cuerpo causa-->
</head>

<body>
    <?php include 'frontend/partes/header.php'; ?>

    <section class="contenedor-playlist">
        <div class="encabezado-seccion">
            <h2 class="titulo-principal">Nuestra historia la cuentan todos</h2>
            <p class="subtitulo-seccion">Voces y momentos que dan vida a nuestra misión diaria.</p>
        </div>

        <div class="reproductor-flex">
            <div class="columna-video">
                <div class="iframe-container">
                    <iframe id="video-frame" src="https://www.youtube.com/embed/X5wAS68VpeI?si=ikOm31M1I7zANUfv"
                        frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="info-reproductor">
                    <h3 id="titulo-video-actual">Video 1: Sí, Acepto para la Eternidad </h3>
                    <p id="descripcion-video-actual">En la <strong>Fundación El Señor de los Milagros</strong>, creemos
                        que el amor es el motor que dignifica la vida, sin importar los años ni las circunstancias. Hoy
                        compartimos con ustedes un capítulo inolvidable de nuestra historia: la boda de <strong>María y
                            Adolfo</strong>.</p>
                </div>
            </div>

            <div class="lista-videos">
                <button class="item-video active"
                    onclick="cambiarVideo('X5wAS68VpeI', 'Video 1: Sí, Acepto para la Eternidad  | El Amor en Nuestra Fundación', 'En la Fundación El Señor de los Milagros, creemos que el amor es el motor que dignifica la vida, sin importar los años ni las circunstancias. Hoy compartimos con ustedes un capítulo inolvidable de nuestra historia: la boda de María y Adolfo.', this)">
                    <span class="numero">1</span>
                    <p style="text-align: center;">Ver: Sí, Acepto para la Eternidad 💞 </p>
                </button>

                <button class="item-video"
                    onclick="cambiarVideo('Mgjft3Naxhw', 'Video 2: Donde la Esperanza Vuelve a Nacer', 'En este emotivo reportaje emitido el 14 de marzo de 2013 por El Ángel de la Calle, se destaca la labor de nuestra fundación. Ubicada en el barrio Santa Fe, Los Martires, en el centro de Bogotá, nuestra organización se dedica a transformar la vida de adultos mayores que lo perdieron todo debido a la indigencia, las adicciones o el abandono.', this)">
                    <span class="numero">2</span> Ver:La Esperanza Vuelve a Nacer 👼
                </button>

                <button class="item-video"
                    onclick="cambiarVideo('k3BbDDs173Q?', 'Video 3: Tu Apoyo Ayer y Hoy Hace la Diferencia', 'Aunque los años han pasado, el mensaje sigue siendo el mismo: la unión y la generosidad de personas como tú son el motor que mantiene viva nuestra fundación. Recordar este gesto nos motiva a seguir adelante y nos recuerda que no hay donación pequeña cuando se hace de corazón.', this)">
                    <span class="numero">3</span> Ver: Tu Apoyo Hace la Diferencia 🤝
                </button>

                <button class="item-video"
                    onclick="cambiarVideo('fm1NPXGpSyg', 'Video 4: El Sueño de un Hogar Propio para los Abuelitos', 'Este video de 2009 nos recuerda por qué nació nuestra fundación: para rescatar la dignidad de los abuelitos en Bogotá. Un testimonio de lucha, fe y el sueño de una nueva casa para los abuelos. ¡Mira nuestra historia y únete a nuestra causa!.', this)">
                    <span class="numero">4</span> Ver: El Sueño de un Hogar Propio 🏠
                </button>

                <button class="item-video"
                    onclick="cambiarVideo('DDhQKW15Quw', 'Video 5: Magia y Sonrisas: Navidad en la Fundación 🎄', 'Fue una jornada dedicada a llenar de amor y música los corazones de nuestros abuelitos, recordándoles que son el alma de nuestra institución. Gracias a todos los que hicieron posible que esta fecha fuera sinónimo de esperanza y felicidad para cada uno de ellos.', this)">
                    <span class="numero">5</span> Ver: 2022 Navidad en la Fundación 🎄
                </button>

                <button class="item-video"
                    onclick="cambiarVideo('_3KgqNXOr3g', 'Video 6: ¡Gracias por no Olvidarno!: El Sentido Mensaje de un Abuelito', 'Su agradecimiento no se queda solo en una empresa; es un mensaje dedicado a todos los donantes y personas de buen corazón que, día a día, hacen posible que ellos tengan una vida digna y saludable. Sus palabras nos recuerdan que, para ellos, una donación es mucho más que un recurso: es la prueba de que el mundo aún se preocupa por su bienestar.', this)">
                    <span class="numero">6</span> El Sentido Mensaje de un Abuelito ❤️
                </button>

                <button class="item-video"
                    onclick="cambiarVideo('3NAAGfxD6yg', 'Video 7:Tu Talento es su Alegría: Arte y Voluntariado en la Fundación 🎨', ' En la Fundación El Señor de los Milagros, hemos aprendido que no todas las donaciones vienen en un sobre o en una bolsa de mercado. A veces, el regalo más valioso es el tiempo y el talento de quienes deciden compartir su arte con nosotros.', this)">
                    <span class="numero">7</span> Tu Talento es su Alegría 🎨
                </button>
            </div>
        </div>
    </section>
    <section class="modulo-actividades">
        <div class="contenedor-titulos">
            <h2 class="badge-titulo">Nuestras Actividades</h2>
            <div class="visor-descripcion">
                <p id="texto-dinamico">Descubre nuestras áreas de impacto pasando el cursor sobre cada icono.</p>
            </div>
        </div>

        <div class="estacion-iconos">
            <div class="linea-conector"></div>

            <div class="fila-unificada">
                <div class="card-circular" data-info="Rehabilitación física integral para mejorar la movilidad.">
                    <div class="aro-exterior"><img src="assets\img\flatico\autocuidado.jpg" alt="Fisioterapia"></div>
                    <span>Fisioterapia</span>
                </div>
                <div class="card-circular" data-info="Talleres de pintura y manualidades para la libre expresión.">
                    <div class="aro-exterior"><img src="assets\img\flatico\arte.jpg" alt="Artes"></div>
                    <span>Artes</span>
                </div>
                <div class="card-circular" data-info="Acompañamiento profesional para el bienestar Integral.">
                    <div class="aro-exterior"><img src="assets\img\flatico\asistencia.jpg" alt="Enfermeria"></div>
                    <span>Enfermeria</span>
                </div>
                <div class="card-circular" data-info="Juegos y dinámicas para fortalecer la integración social.">
                    <div class="aro-exterior"><img src="assets\img\flatico\bingo.png" alt="Recreación"></div>
                    <span>Recreación</span>
                </div>
                <div class="card-circular" data-info="Asesoría y seguimiento para una alimentación balanceada.">
                    <div class="aro-exterior"><img src="assets\img\flatico\nutricion.jpg" alt="Nutrición"></div>
                    <span>Nutrición</span>
                </div>
                <div class="card-circular"
                    data-info="Cine, café y amigos: Un espacio para recordar y compartir juntos.">
                    <div class="aro-exterior"><img src="assets\img\flatico\cine foro.jpg" alt="Cine Foro"></div>
                    <span>Cine Foro</span>
                </div>
                <div class="card-circular" data-info="Encuentros de reflexión para la paz interior y la fe.">
                    <div class="aro-exterior"><img src="assets\img\flatico\cruzar.jpg" alt="Espiritualidad"></div>
                    <span>Espiritualidad</span>
                </div>
            </div>
        </div>
    </section>

    <section class="seccion-galeria">
        <div class="franja-amarilla">
            <h2 class=" title">Garantizando una vejez digna y plena</h2>
        </div>
        <br><br>
        <div class="contenedor-slider">
            <div class="slides-wrapper" id="cloudinary-slider">
                <p class="cargando">Cargando momentos de esperanza...</p>
            </div>
            <button class="nav-btn prev" onclick="cambiarSlide(-1)">&#10094;</button>
            <button class="nav-btn next" onclick="cambiarSlide(1)">&#10095;</button>
        </div>
    </section>

    <div class="seccion-btn-desplazamiento">
        <a href="dona.html" class="btn-ir-apoyo">APOYA SU PAZ Y FELICIDAD</a>
    </div>

    <section id="testimonios" class="seccion-testimonios">
        <div class="franja-azul"> Pequeños actos, grandes milagros: tu semilla lo cambia todo</div>
        <div class="grid-testimonios">

            <div class="card-abuelito">
                <img src="assets\img\fotos\Don Adolfo.png" alt="Don Adolfo" class="foto-grande">
                <h3 class="nombre"> Don Adolfo</h3>
                <p>"A mi edad, los días se hacían largos y el hambre pesaba. Pero aquí encontré el apoyo que ya no
                    tenía en casa. Gracias por abrirme las puertas y tratarme con tanto amor."</p>
            </div>

            <div class="card-abuelito">
                <img src="assets\img\fotos\Don Humberto.png" alt="Don Humberto" class="foto-grande">
                <h3 class="nombre">Don Humberto</h3>
                <p>"Pasé meses sintiendo que el mundo se había olvidado de mí... Aquí me devolvieron la dignidad de
                    sentirme valioso. Ya no soy una sombra en la calle; ahora tengo un hogar y gente que sabe mi
                    nombre."</p>
            </div>

            <div class="card-abuelito">
                <img src="assets\img\fotos\Don German.png" alt="Don German" class="foto-grande">
                <h3 class="nombre">Don German:</h3>
                <p>"Vivir en la calle o con tantas carencias me hacía sentir que mis días ya estaban contados. El frío y
                    el hambre me estaban consumiendo, pero aquí encontré el refugio que me salvó la vida y me devolvió
                    la tranquilidad.."</p>
            </div>


        </div>


    </section>




    <?php include 'frontend/partes/footer.php'; ?>

    <a href="https://wa.me/573124939619" class="whatsapp-btn" target="_blank" rel="noopener noreferrer">
        <img src="assets\img\redes\Wpp.webp" alt="WhatsApp" />
    </a>

    <script src="js/main.js" type="module"></script>
    <script src="js/causa.js"></script>
    <script src="js/listavideo.js"></script>
    <script src="js/actividades.js"></script>


</body>

</html>