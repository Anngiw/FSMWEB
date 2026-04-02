// Seleccionamos todos los elementos necesarios
const visorTexto = document.getElementById('texto-dinamico');
const cards = document.querySelectorAll('.card-circular');
const textoPorDefecto = visorTexto.textContent;

// Agregamos los eventos a cada card automáticamente
cards.forEach(card => {
    card.addEventListener('mouseenter', () => {
        const info = card.getAttribute('data-info');
        actualizarVisor(info, true);
    });

    card.addEventListener('mouseleave', () => {
        actualizarVisor(textoPorDefecto, false);
    });
});

function actualizarVisor(mensaje, resaltado) {
    visorTexto.style.opacity = "0";
    
    setTimeout(() => {
        visorTexto.textContent = mensaje;
        visorTexto.style.opacity = "1";
        visorTexto.style.color = resaltado ? "#001a4d" : "#555";
        visorTexto.style.fontWeight = resaltado ? "700" : "400";
    }, 150);
}