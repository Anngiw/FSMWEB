<?php
// backend/controllers/authController.php
require_once __DIR__ . '/../models/usuario.php';

class AuthController {
    private $modelo;

    public function __construct() {
        $this->modelo = new Usuario();
    }

    /**
     * Valida que la contraseña sea segura
     */
    public function esPasswordSegura($pass) {
        // 8 caracteres mín, una Mayúscula y un Símbolo
        return preg_match('/^(?=.*[A-Z])(?=.*[\W_]).{8,}$/', $pass);
    }

    /**
     * Lógica para iniciar sesión
     */
    public function iniciarSesion($identificador, $password) {
        $user = $this->modelo->buscarPorCorreo($identificador);
        
        if ($user && password_verify($password, $user['password'])) {
            if (session_status() == PHP_SESSION_NONE) session_start();
            
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['nombre']  = $user['nombre'];
            $_SESSION['rol']     = $user['rol'];
            
            return true;
        }
        return false;
    }

    /**
     * LÓGICA DE CIERRE DE SESIÓN
     * Se añade aquí para centralizar la gestión de autenticación
     */
    public function cerrarSesion() {
        // Aseguramos que la sesión esté abierta para poder manipularla
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // 1. Vaciamos todas las variables de sesión ($_SESSION)
        $_SESSION = array();

        // 2. Destruimos la cookie de sesión si existe (opcional pero recomendado)
        if (ini_get("session_use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        // 3. Destruimos la sesión físicamente en el servidor
        session_destroy();

        return true;
    }
    // Dentro de la clase AuthController
public function verificarSesion() {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    // Retorna true si existe el ID, de lo contrario false
    return isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
}


//Recuperar contraseña cuando se a olvidado

// Valida si el correo y el teléfono pertenecen al mismo usuario
// Cambia solo este método dentro de tu AuthController
public function validarIdentidad($correo, $telefono) {
    $user = $this->modelo->buscarPorCorreo($correo);
    
    if ($user && trim($user['telefono']) === trim($telefono)) {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        $_SESSION['temp_user_id'] = $user['id'];
        $_SESSION['correo_verificado'] = $user['correo']; 
        
        return true;
    }
    return false;
}

/**
     * Obtiene todos los datos de un usuario por su ID
     * Útil para precargar el formulario de edición
     */
    public function obtenerDatosUsuario($id) {
        return $this->modelo->buscarPorId($id);
    }

    /**
     * Procesa la actualización del perfil
     * Valida datos básicos antes de mandarlos al modelo
     */
    public function actualizarPerfil($id, $nombre, $correo, $telefono, $passwordHasheada = null) {
        // Validación simple: no permitir campos obligatorios vacíos
        if (empty($nombre) || empty($correo) || empty($telefono)) {
            return false;
        }

        // Si el usuario intentó cambiar la clave, validamos la seguridad aquí si es necesario
        // Pero como ya viene hasheada desde la Route, se la pasamos directo al modelo
        return $this->modelo->actualizarDatos($id, $nombre, $correo, $telefono, $passwordHasheada);
    }
}