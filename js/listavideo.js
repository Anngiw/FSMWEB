/**
 * Función para actualizar el reproductor con un nuevo video y textos
 * @param {string} id - El ID de YouTube del video
 * @param {string} titulo - Título que se mostrará abajo
 * @param {string} desc - Descripción larga que se mostrará abajo
 * @param {HTMLElement} btn - El botón que fue presionado
 */
function cambiarVideo(id, titulo, desc, btn) {
    // Referencias a los elementos del DOM
    const reproductor = document.getElementById('video-frame');
    const h3Titulo = document.getElementById('titulo-video-actual');
    const pDescripcion = document.getElementById('descripcion-video-actual');

    // 1. Cambiar el Video (con autoplay activo)
    reproductor.src = `https://www.youtube.com/embed/${id}?autoplay=1&rel=0`;

    // 2. Cambiar Textos
    h3Titulo.innerText = titulo;
    pDescripcion.innerText = desc;

    // 3. Cambiar Estilo de los Botones
    const todosLosBotones = document.querySelectorAll('.item-video');
    todosLosBotones.forEach(b => b.classList.remove('active'));
    
    // Añadir clase activa al botón actual
    btn.classList.add('active');
    
    // Opcional: Hacer scroll suave hacia arriba del video en móviles
    if (window.innerWidth < 900) {
        window.scrollTo({
            top: document.querySelector('.contenedor-playlist').offsetTop - 20,
            behavior: 'smooth'
        });
    }
}