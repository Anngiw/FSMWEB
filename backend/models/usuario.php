<?php
// backend/models/usuario.php

// Requerimos el archivo de conexión para poder usar el método conectar()
require_once __DIR__ . '/../config/db.php';

//Clase Usuario Contiene todas las consultas SQL y lógica de persistencia para la tabla usuarios.

class Usuario
{
    private $db;

    //Constructor de la clase: Inicializa la conexión a la base de datos al instanciar el modelo.
     
    public function __construct()
    {
        $this->db = Conexion::conectar();
    }

    //Busca un usuario registrado por su correo electrónico.
     
    public function buscarPorCorreo($correo)
    {
        try {
            // Preparamos la consulta SQL con marcadores (?) para prevenir Inyección SQL
            $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE correo = ?");
            // Ejecutamos pasando el parámetro sanitizado
            $stmt->execute([$correo]);
            // Retornamos el registro como un arreglo asociativo o false si no existe
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Captura errores de base de datos y los escribe en el archivo de logs
            error_log("Error en buscarPorCorreo: " . $e->getMessage());
            return false;
        }
    }

    //Busca un usuario por su número de teléfono.
     
    public function buscarPorTelefono($telefono)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE telefono = ?");
            $stmt->execute([$telefono]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error en buscarPorTelefono: " . $e->getMessage());
            return false;
        }
    }

    //Actualiza la información básica del perfil del usuario logueado.
     
    public function actualizarPerfil($id, $nombre, $telefono)
    {
        try {
            $stmt = $this->db->prepare("UPDATE usuarios SET nombre = ?, telefono = ? WHERE id = ?");
            return $stmt->execute([$nombre, $telefono, $id]);
        } catch (PDOException $e) {
            error_log("Error en actualizarPerfil: " . $e->getMessage());
            return false;
        }
    }

    //Encripta y actualiza la contraseña de un usuario mediante su ID.
     
    public function actualizarPassword($id, $password)
    {
        try {
            // Aplicamos un algoritmo seguro de encriptación antes de guardar en la DB
            $hash = password_hash($password, PASSWORD_BCRYPT);
            $stmt = $this->db->prepare("UPDATE usuarios SET password = ? WHERE id = ?");
            return $stmt->execute([$hash, $id]);
        } catch (PDOException $e) {
            error_log("Error en actualizarPassword: " . $e->getMessage());
            return false;
        }
    }

    //Guarda un token de recuperación temporal con validez de 1 hora.
     
    public function guardarToken($correo, $token)
    {
        try {
            $expiracion = date("Y-m-d H:i:s", strtotime('+1 hour'));
            $stmt = $this->db->prepare("UPDATE usuarios SET token_recuperacion = ?, expiracion_token = ? WHERE correo = ?");
            return $stmt->execute([$token, $expiracion, $correo]);
        } catch (PDOException $e) {
            error_log("Error en guardarToken: " . $e->getMessage());
            return false;
        }
    }

    //Registra un nuevo usuario en la base de datos.
     
    public function registrar($nombre, $correo, $password, $telefono, $rol)
    {
        try {
            $stmt = $this->db->prepare("INSERT INTO usuarios (nombre, correo, password, telefono, rol) VALUES (?, ?, ?, ?, ?)");
            return $stmt->execute([$nombre, $correo, $password, $telefono, $rol]);
        } catch (PDOException $e) {
            error_log("Error en registrar usuario: " . $e->getMessage());
            return false;
        }
    }

    //Actualiza la contraseña y limpia los campos del token cuando la recuperación fue exitosa.
     
    public function recuperarPasswordPorIdentidad($id, $passwordEncriptada)
    {
        try {
            $sql = "UPDATE usuarios SET password = ?, token_recuperacion = NULL, expiracion_token = NULL WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([$passwordEncriptada, $id]);
        } catch (PDOException $e) {
            error_log("Error en recuperarPasswordPorIdentidad: " . $e->getMessage());
            return false;
        }
    }

    //Busca los datos de un usuario mediante su ID único.
    public function buscarPorId($id)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE id = ?");
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error en buscarPorId: " . $e->getMessage());
            return false;
        }
    }

    // Permite editar los datos de un usuario desde el panel administrativo (con o sin cambio de contraseña).
    public function actualizarDatos($id, $nombre, $correo, $telefono, $passwordHasheada = null)
    {
        try {
            if ($passwordHasheada) {
                $sql = "UPDATE usuarios SET nombre = ?, correo = ?, telefono = ?, password = ? WHERE id = ?";
                $stmt = $this->db->prepare($sql);
                return $stmt->execute([$nombre, $correo, $telefono, $passwordHasheada, $id]);
            } else {
                $sql = "UPDATE usuarios SET nombre = ?, correo = ?, telefono = ? WHERE id = ?";
                $stmt = $this->db->prepare($sql);
                return $stmt->execute([$nombre, $correo, $telefono, $id]);
            }
        } catch (PDOException $e) {
            error_log("Error en actualizarDatos: " . $e->getMessage());
            return false;
        }
    }

    //Bloquea el acceso a un usuario por un tiempo determinado en segundos.
     
    public function bloquearUsuario($id, $tiempoBloqueoSegundos)
    {
        try {
            // Calcula la fecha y hora exacta en la que se levantará el bloqueo
            $fechaExpiracion = date("Y-m-d H:i:s", time() + $tiempoBloqueoSegundos);
            $stmt = $this->db->prepare("UPDATE usuarios SET fecha_bloqueo = ? WHERE id = ?");
            return $stmt->execute([$fechaExpiracion, $id]);
        } catch (PDOException $e) {
            error_log("Error en bloquearUsuario: " . $e->getMessage());
            return false;
        }
    }

    /**Desbloquea a un usuario limpiando el campo de fecha_bloqueo.*/
    public function desbloquearUsuario($id)
    {
        try {
            $stmt = $this->db->prepare("UPDATE usuarios SET fecha_bloqueo = NULL WHERE id = ?");
            return $stmt->execute([$id]);
        } catch (PDOException $e) {
            error_log("Error en desbloquearUsuario: " . $e->getMessage());
            return false;
        }
    }
}