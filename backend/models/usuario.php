<?php
require_once __DIR__ . '/../config/db.php';

class Usuario
{
    private $db;
    public function __construct()
    {
        $this->db = Conexion::conectar();
    }

    public function buscarPorCorreo($correo)
    {
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE correo = ?");
        $stmt->execute([$correo]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function buscarPorTelefono($telefono)
    {
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE telefono = ?");
        $stmt->execute([$telefono]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizarPerfil($id, $nombre, $telefono)
    {
        $stmt = $this->db->prepare("UPDATE usuarios SET nombre = ?, telefono = ? WHERE id = ?");
        return $stmt->execute([$nombre, $telefono, $id]);
    }

    public function actualizarPassword($id, $password)
    {
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->db->prepare("UPDATE usuarios SET password = ? WHERE id = ?");
        return $stmt->execute([$hash, $id]);
    }

    public function guardarToken($correo, $token)
    {
        $expiracion = date("Y-m-d H:i:s", strtotime('+1 hour'));
        $stmt = $this->db->prepare("UPDATE usuarios SET token_recuperacion = ?, expiracion_token = ? WHERE correo = ?");
        return $stmt->execute([$token, $expiracion, $correo]);
    }

    public function registrar($nombre, $correo, $password, $telefono, $rol)
    {
        $stmt = $this->db->prepare("INSERT INTO usuarios (nombre, correo, password, telefono, rol) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$nombre, $correo, $password, $telefono, $rol]);
    }


    // Actualizamos la clave y limpiamos el token por seguridad

    // Método para el flujo de recuperación (Olvido de contraseña)
    public function recuperarPasswordPorIdentidad($id, $passwordEncriptada)
    {
        // 1. Actualiza la clave del usuario identificado por ID
        // 2. Limpia los campos de token por seguridad (vuelven a NULL)
        $sql = "UPDATE usuarios SET password = ?, token_recuperacion = NULL, expiracion_token = NULL WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$passwordEncriptada, $id]);
    }

    /**
     * Busca un usuario por su ID primario
     */
    public function buscarPorId($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**Actualiza la información del perfil Soporta actualización opcional de contraseña*/
    public function actualizarDatos($id, $nombre, $correo, $telefono, $passwordHasheada = null)
    {
        if ($passwordHasheada) {
            // Si hay nueva contraseña, la incluimos en el UPDATE
            $sql = "UPDATE usuarios SET nombre = ?, correo = ?, telefono = ?, password = ? WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([$nombre, $correo, $telefono, $passwordHasheada, $id]);
        } else {
            // Si no hay contraseña, solo actualizamos los datos básicos
            $sql = "UPDATE usuarios SET nombre = ?, correo = ?, telefono = ? WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([$nombre, $correo, $telefono, $id]);
        }
    }
}
