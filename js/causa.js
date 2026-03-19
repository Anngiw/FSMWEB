// Configuración de conexión con tu nube (Cambia esto si creas otra nube)
const cloudName = "dimzkncaa"; 
const tagBusqueda = "galeria_fsm"; 

// Función principal para traer las fotos de Cloudinary
async function cargarFotosDeCloudinary() {
    const contenedor = document.getElementById('cloudinary-slider');
    // URL que genera la lista de imágenes con el tag específico
    const urlApi = `https://res.cloudinary.com/${cloudName}/image/list/${tagBusqueda}.json`;

    try {
        const respuesta = await fetch(urlApi);
        
        // Verificamos si la respuesta es correcta
        if (!respuesta.ok) {
            throw new Error('No se pudo conectar con Cloudinary. Revisa la configuración "Resource list".');
        }

        const datos = await respuesta.json();
        
        // Limpiamos el contenedor (quitamos mensaje "Cargando")
        contenedor.innerHTML = "";

        // Recorremos cada foto encontrada en la nube y la dibujamos
        datos.resources.forEach(archivo => {
            const nuevaImagen = document.createElement('img');
            
            // f_auto convierte automáticamente a WebP si el navegador lo soporta
            // q_auto optimiza la calidad para que no pesen tanto las fotos
            // w_1200 ajusta el ancho máximo a 1200px para que todas tengan el mismo lienzo
            nuevaImagen.src = `https://res.cloudinary.com/${cloudName}/image/upload/f_auto,q_auto,w_1200/${archivo.public_id}.${archivo.format}`;
            nuevaImagen.alt = "Actividades de la Fundación FSM";
            
            contenedor.appendChild(nuevaImagen);
        });

        console.log("Galería cargada exitosamente con " + datos.resources.length + " fotos.");

    } catch (error) {
        console.error("Hubo un error al conectar con Cloudinary:", error);
        contenedor.innerHTML = "<p class='cargando'>Hubo un problema al cargar las imágenes de la nube. Por favor, revisa la consola (F12) o intenta más tarde.</p>";
    }
}

// Lógica del movimiento del Slider
let indiceActual = 0;

function cambiarSlide(paso) {
    const contenedor = document.getElementById('cloudinary-slider');
    const totalFotos = document.querySelectorAll('#cloudinary-slider img').length;

    if (totalFotos === 0) return; // Si no han cargado las fotos, no hace nada

    // Calculamos la posición con loop infinito
    indiceActual = (indiceActual + paso + totalFotos) % totalFotos;

    // Movemos el contenedor usando transformaciones CSS
    const desplazamiento = -indiceActual * 100;
    contenedor.style.transform = `translateX(${desplazamiento}%)`;
}

// Inicialización
document.addEventListener("DOMContentLoaded", () => {
    // Cargamos las fotos apenas abra la página
    cargarFotosDeCloudinary();

    // Configuramos el auto-play cada 4 segundos
    setInterval(() => {
        cambiarSlide(1);
    }, 4000);
});