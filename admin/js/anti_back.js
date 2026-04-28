/**
 * anti_back.js
 * Protege contra el BFCache del navegador para asegurar 
 * que la validación de sesión de PHP se ejecute siempre.
 */
window.addEventListener('pageshow', function(event) {
    // Si la página se carga desde el historial (botón atrás)
    if (event.persisted || (typeof window.performance != "undefined" && window.performance.navigation.type === 2)) {
        // Forzamos la recarga desde el servidor para que el PHP verifique la sesión
        window.location.reload();
    }
});