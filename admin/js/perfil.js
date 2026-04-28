// assets/js/perfil.js

document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('form-editar-perfil');
    const togglePass = document.getElementById('toggle_pass');
    const passInput = document.getElementById('pass_input');
    const responseMsg = document.getElementById('response-message');

    // 1. Mostrar/Ocultar contraseña
    togglePass.addEventListener('click', () => {
        const type = passInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passInput.setAttribute('type', type);
        togglePass.classList.toggle('fa-eye-slash');
    });

    // 2. Envío de formulario vía AJAX (Fetch)
    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        const formData = new FormData(form);

        try {
            const response = await fetch('../../backend/routes/procesar_perfil.php', {
                method: 'POST',
                body: formData
            });

            const result = await response.json();

            if (result.status === 'success') {
                responseMsg.innerHTML = `<div style="background: #d4edda; color: #155724; padding: 15px; border-radius: 8px; margin-bottom: 20px; text-align: center;">
                    <i class="fas fa-check-circle"></i> ${result.message}
                </div>`;
            } else {
                responseMsg.innerHTML = `<div style="background: #f8d7da; color: #721c24; padding: 15px; border-radius: 8px; margin-bottom: 20px; text-align: center;">
                    <i class="fas fa-exclamation-triangle"></i> ${result.message}
                </div>`;
            }
        } catch (error) {
            console.error("Error:", error);
        }
    });
});