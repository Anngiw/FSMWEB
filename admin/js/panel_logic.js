document.addEventListener('DOMContentLoaded', () => {
    const btnOpen = document.getElementById('openSidebar');
    const sidebar = document.querySelector('.panel-sidebar');
    const overlay = document.getElementById('overlay');

    if (btnOpen && sidebar && overlay) {
        // Al dar click al botón abre/cierra
        btnOpen.addEventListener('click', () => {
            sidebar.classList.add('active');
            overlay.classList.add('active');
        });

        // Al dar click al fondo oscuro cierra
        overlay.addEventListener('click', () => {
            sidebar.classList.remove('active');
            overlay.classList.remove('active');
        });
    }

    // Si la pantalla se agranda, limpiamos las clases
    window.addEventListener('resize', () => {
        if (window.innerWidth > 992) {
            if(sidebar) sidebar.classList.remove('active');
            if(overlay) overlay.classList.remove('active');
        }
    });
});