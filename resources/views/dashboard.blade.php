<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin - TeamUp</title>

    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body>

<header class="encabezado">
    <div class="contenedor_encabezado">

        <div class="logo_titulo">
            <img src="{{ asset('imagenes/logo_final.png') }}" class="logo">
            <h1>TeamUp</h1>
        </div>

        <nav>
            <ul class="menu">
                <li><a href="{{ route('principal') }}">Volver</a></li>
                <li><a href="{{ route('logout') }}">Cerrar Sesión</a></li>
            </ul>
        </nav>

    </div>
</header>

<section class="titulo_dashboard">
    <h2>Panel del Administrador</h2>
    <p>Vista general del sistema y estadísticas globales.</p>
</section>

<section class="contenedor_estadisticas">

    <div class="tarjeta">
        <i class="fa-solid fa-user icono"></i>
        <h3>Usuarios Registrados</h3>
        <p class="numero">{{ $usuarios ?? 0 }}</p>
        <a href="#" class="btn_detalle">Ver detalles</a>
    </div>

    <div class="tarjeta">
        <i class="fa-solid fa-people-group icono"></i>
        <h3>Equipos Activos</h3>
        <p class="numero">{{ $equipos ?? 0 }}</p>
        <a href="#" class="btn_detalle">Gestionar</a>
    </div>

    <div class="tarjeta">
        <i class="fa-solid fa-trophy icono"></i>
        <h3>Torneos en Curso</h3>
        <p class="numero">{{ $torneos ?? 0 }}</p>
        <a href="#" class="btn_detalle">Ver torneos</a>
    </div>

</section>

<section class="seccion_graficos">

    <div class="grafico">
        <h4>Actividad Reciente</h4>
        <div class="placeholder">Gráfico próximamente…</div>
    </div>

    <div class="grafico">
        <h4>Crecimiento de Usuarios</h4>
        <div class="placeholder">Gráfico próximamente…</div>
    </div>

</section>

<footer class="pie">
    © 2025 TeamUp — Panel Administrador
</footer>

<div class="redes_sociales text-center mt-4">
    <a href="#"><i class="fa-brands fa-facebook"></i></a>
    <a href="#"><i class="fa-brands fa-instagram"></i></a>
    <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
</div>

</body>
</html>
