<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header Panel de Control</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../../css/header_include.css">
</head>

<body>
  <header class="panel-header">
    <div class="header-left-group">
        <button class="hamburger-btn" id="openSidebar">
            <i class="fas fa-bars"></i>
        </button>

        <div class="header-welcome">
            <h1 id="live-clock">00:00:00</h1>
            <p id="live-date">Cargando fecha...</p>
        </div>
    </div>

    <div class="header-user">
        <div class="notif-bell">
            <i class="fas fa-user"></i>
       
        </div>
        
        <div class="user-meta">
            <strong>Marleny Mayorga Molina |</strong>
            <span>Administrador</span>
        </div>
    </div>
</header>

<script>
    function updateClock() {
        const now = new Date();
        const optionsTime = { hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: true };
        const timeString = now.toLocaleTimeString('es-CO', optionsTime);
        const optionsDate = { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' };
        const dateString = now.toLocaleDateString('es-CO', optionsDate);

        document.getElementById('live-clock').innerText = timeString;
        document.getElementById('live-date').innerText = dateString;
    }
    setInterval(updateClock, 1000);
    updateClock();
</script>
</body>

</html>