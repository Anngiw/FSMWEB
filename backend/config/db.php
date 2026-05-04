<?php
// backend/config/db.php

/**Clase Conexion: Gestiona la conexión a la base de datos utilizando el patrón Singleton.*/
class Conexion {
    // Almacena la única instancia de la conexión PDO
    private static $instancia = null;

    /**Método conectar:Evalúa el entorno (Local o Hosting) y establece la conexión con PDO.
     * @return PDO Retorna el objeto de conexión de la base de datos.
     */
    public static function conectar() {
        if (self::$instancia === null) {
            
            // 1. EVALUACIÓN DEL ENTORNO: Detecta si estamos trabajando en Localhost o en el Servidor Real
            $isLocal = ($_SERVER['REMOTE_ADDR'] == '127.0.0.1' || $_SERVER['HTTP_HOST'] == 'localhost');

            if ($isLocal) {
                // Configuración para el entorno de desarrollo local
                $host = "localhost";
                $db   = "fsm_database";
                $user = "root";
                $pass = "";
            } else {
                // Configuración para el entorno de producción (Hosting en Internet)
                $host = "tu_host_remoto"; 
                $db   = "fsm_database";
                $user = "tu_usuario_remoto";
                $pass = "TuClaveSegura2026*";
            }

            // 2. INTENTO DE CONEXIÓN SEGURO: Bloque try/catch para controlar excepciones en la conexión
            try {
                // Creamos la instancia de PDO con la cadena de conexión DSN y el set de caracteres UTF-8
                self::$instancia = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
                
                // Configuramos PDO para que lance excepciones (ERRMODE_EXCEPTION) en caso de errores SQL
                self::$instancia->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
            } catch (PDOException $e) {
                // Si la conexión falla, se registra el error en el log del servidor para auditoría
                error_log("Error de conexión PDO: " . $e->getMessage());
                
                // Mensaje amigable para el usuario sin exponer credenciales ni datos técnicos
                die("Error de conexión a la base de datos.");
            }
        }
        
        // Retornamos la conexión lista para ser usada por los Modelos
        return self::$instancia;
    }
}