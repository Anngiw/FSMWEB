// Esta función carga el HTML desde un archivo externo
async function cargarComponente(id, url) {
    try {
        const respuesta = await fetch(url);
        const html = await respuesta.text();
        
        // Aquí insertamos el HTML en la página (el header o el footer)
        document.getElementById(id).innerHTML = html;

        // llamamos a la función para activar el botón.
        if (id === 'main-header') {
            activarLogicaDelMenu();
        }
    } catch (error) {
        console.error("No se pudo cargar el componente: ", error);
    }
}

// Esta función busca el botón y le da vida
function activarLogicaDelMenu() {
    const btn = document.querySelector('.menu-toggle');
    const nav = document.querySelector('.nav-wrapper');

    //Ahora sí el botón existe porque cargamos el header antes
    if (btn && nav) {
        btn.addEventListener('click', () => {
            nav.classList.toggle('mobile-active');
            btn.classList.toggle('is-open');
        });
    }
}

// Ejecutamos la carga al iniciar la página
document.addEventListener('DOMContentLoaded', () => {
    // Primero cargamos los archivos
    cargarComponente('main-header', 'frontend/partes/header.html');
    cargarComponente('main-footer', 'frontend/partes/footer.html');
});