document.addEventListener("DOMContentLoaded", () => {
    
    // Capturamos los elementos
    const modal = document.getElementById("modalGracias");
    const botonesDonacion = document.querySelectorAll(".btn-agradecer");
    const btnCerrar = document.getElementById("btnCerrar");

    // Función para la explosión de confeti y abrir modal
    const activarAgradecimiento = (e) => {
        if (e) e.preventDefault(); // Evita que la página salte
        
        if (modal) {
            modal.style.display = "block";
            
            // Confeti que cae sobre la tarjeta blanca
            confetti({
                particleCount: 150,
                spread: 70,
                origin: { y: 0.6 },
                zIndex: 2000, // Muy alto para que se vea sobre todo
                colors: ['#090540', '#f5c114', '#ffffff']
            });
        } else {
            console.error("No se encontró el modal con ID 'modalGracias'");
        }
    };

    //Asignamos el evento a CADA botón de las cards
    botonesDonacion.forEach(boton => {
        boton.addEventListener("click", activarAgradecimiento);
    });

    // Función para cerrar
    if (btnCerrar) {
        btnCerrar.onclick = () => {
            modal.style.display = "none";
        };
    }

    // Cerrar al hacer clic fuera de la tarjeta blanca
    window.onclick = (event) => {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    };
});