<?php
// FSMWEB/crear_admin.php

// 1. Cargamos el controlador y el modelo explícitamente
// Usamos rutas basadas en tu estructura: backend/controllers y backend/models
require_once __DIR__ . '/backend/controllers/authController.php';
require_once __DIR__ . '/backend/models/usuario.php';

$auth = new AuthController();
$usuario = new Usuario();

$pass = "Anloarva1997*";

// 2. Verificamos la seguridad antes de registrar
if ($auth->esPasswordSegura($pass)) {
    // La encriptación se hace con BCRYPT como estándar de seguridad
    $passHash = password_hash($pass, PASSWORD_BCRYPT);
    
    try {
        // Intentamos el registro
        $exito = $usuario->registrar("Admin FSM", "fsmadmiweb@gmail.com", $passHash, "3171077479", "Ing. Angie Arias");
        
        if ($exito) {
            echo "<h2>✅ Usuario administrador creado con éxito.</h2>";
            echo "<p>Ya puedes ir a <b>admin/vistas/login.php</b> para ingresar.</p>";
        }
    } catch (Exception $e) {
        echo "<h2>❌ Error de Base de Datos:</h2> " . $e->getMessage();
    }
} else {
    echo "<h2>❌ Error de Seguridad:</h2> La contraseña debe tener al menos 8 caracteres, una mayúscula y un símbolo.";
}