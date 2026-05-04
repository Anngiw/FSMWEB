<?php
// error404.php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$protocolo = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
$host = $_SERVER['HTTP_HOST'];
$url_base = ($host === 'localhost' || $host === '127.0.0.1') ? $protocolo . $host . "/FSMWEB/" : $protocolo . $host . "/";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página no encontrada | FSM</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/error.css">
     
</head>
<body>
    <div class="error-container">
        <div class="error-icon">
            <i class="fas fa-exclamation-triangle"></i>
        </div>
        <h1>Página no encontrada</h1>
        <p>Lo sentimos, la página que estás buscando no existe o ha sido movida a una nueva ubicación.</p>
        
        <a href="<?php echo $url_base; ?>admin/vistas/login.php" class="btn-return">
            <i class="fas fa-arrow-left"></i> VOLVER AL INICIO
        </a>
    </div>
</body>
</html>