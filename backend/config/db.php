<?php
// backend/config/db.php
class Conexion {
    private static $instancia = null;

    public static function conectar() {
        if (self::$instancia === null) {
            // Detecta si es localhost
            $isLocal = ($_SERVER['REMOTE_ADDR'] == '127.0.0.1' || $_SERVER['HTTP_HOST'] == 'localhost');

            if ($isLocal) {
                $host = "localhost";
                $db   = "fsm_database";
                $user = "root";
                $pass = "";
            } else {
                // Datos del servidor real (cámbialos cuando subas la web)
                $host = "tu_host_remoto"; 
                $db   = "fsm_database";
                $user = "tu_usuario_remoto";
                $pass = "TuClaveSegura2026*";
            }

            try {
                self::$instancia = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
                self::$instancia->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Error de conexión: " . $e->getMessage());
            }
        }
        return self::$instancia;
    }
}