<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - TeamUp</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
    <div class="dashboard">
        <aside class="sidebar">
            <div class="logo">
                <img src="{{ asset('imagenes/logo_final.png') }}" alt="TeamUp">
                <h2>TeamUp</h2>
            </div>
            <nav class="menu">
                <a href="{{ route('principal') }}"><i class="fas fa-home"></i> Inicio</a>
                <a href="{{ route('gestion_equipos') }}"><i class="fas fa-users"></i> Equipos</a>
                <a href="{{ route('torneos_inicio') }}"><i class="fas fa-trophy"></i> Torneos</a>
                <a href="{{ route('amistoso') }}"><i class="fas fa-handshake"></i> Amistosos</a>
                <a href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a>
            </nav>
        </aside>

        <main class="contenido">
            <h1>Bienvenido al Panel de Control</h1>
            <div class="estadisticas">
                <div class="card">
                    <h3>Usuarios Registrados</h3>
                    <p>120</p>
                </div>
                <div class="card">
                    <h3>Equipos</h3>
                    <p>45</p>
                </div>
                <div class="card">
                    <h3>Torneos Activos</h3>
                    <p>25</p>
                </div>
            </div>

            
        </main>
    </div>
</body>
</html>
