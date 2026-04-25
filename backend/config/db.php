<?php
// Detectar el entorno (Local o Producción)
if ($_SERVER['SERVER_NAME'] == 'localhost') {
    // Datos para XAMPP
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db   = "db_fsmweb";
} else {
    // Datos para el servidor real (Los pondrás cuando compres el hosting)
    $host = "nombre_del_servidor_remoto"; 
    $user = "usuario_del_hosting";
    $pass = "contraseña_segura";
    $db   = "nombre_bd_hosting";
}

// Crear la conexión utilizando la extensión mysqli
$conexion = mysqli_connect($host, $user, $pass, $db);

// Configurar el juego de caracteres a UTF-8 para evitar problemas con tildes y la ñ
mysqli_set_charset($conexion, "utf8mb4");

// Verificar si la conexión falló
if (!$conexion) {
    die("Error crítico: No se pudo conectar a la base de datos. " . mysqli_connect_error());
}
?>