<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal - TeamUp</title>

    <link rel="stylesheet" href="{{ asset('css/principal.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body>

<header class="encabezado_principal">
    <div class="contenedor_encabezado">

        <div class="logo_titulo">
            <img src="{{ asset('imagenes/logo_final.png') }}" class="logo_imagen">
            <h1 class="titulo_pagina">TeamUp</h1>
        </div>

        <nav>
            <ul class="menu_sesion">
                <li><a href="{{ route('logout') }}">Cerrar Sesión</a></li>
            </ul>
        </nav>

    </div>
</header>

<section class="seccion_modulos d-flex flex-wrap justify-content-center gap-4 mt-5">

    <div class="tarjeta caja_equipo">
        <img src="{{ asset('imagenes/imagen_gestion_jugadores.png') }}">
        <div class="contenido_tarjeta text-center">
            <h4>Gestión de Usuarios y Equipos</h4>
            <p>Administra jugadores, crea equipos y asigna roles fácilmente.</p>
            <a href="{{ route('gestion_equipos') }}" class="btn btn_modulo">Entrar</a>
        </div>
    </div>

    <div class="tarjeta caja_torneos">
        <img src="{{ asset('imagenes/imagen_gestion_torneos_a.png') }}">
        <div class="contenido_tarjeta text-center">
            <h4>Gestión de Torneos y Partidos</h4>
            <p>Organiza torneos, registra resultados y visualiza estadísticas.</p>
            <a href="{{ route('torneos_inicio') }}" class="btn btn_modulo">Entrar</a>
        </div>
    </div>

    <div class="tarjeta caja_comunicacion">
        <img src="{{ asset('imagenes/comunicacion_deportiva.png') }}">
        <div class="contenido_tarjeta text-center">
            <h4>Comunicación y Comunidad</h4>
            <p>Chatea, comparte noticias y participa en foros deportivos.</p>
            <a href="{{ route('comunicacion') }}" class="btn btn_modulo">Entrar</a>
        </div>
    </div>

    <div class="tarjeta caja_admin">
        <img src="{{ asset('imagenes/administrador_final1.png') }}">
        <div class="contenido_tarjeta text-center">
            <h4>Administrador</h4>
            <p>Controla torneos, usuarios, estadísticas y configuraciones.</p>
            <a href="{{ route('admin_dashboard') }}" class="btn btn_modulo">Entrar</a>
        </div>
    </div>

</section>

<div class="redes_sociales">
    <a href="#"><i class="fa-brands fa-facebook"></i></a>
    <a href="#"><i class="fa-brands fa-instagram"></i></a>
    <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
</div>

<footer class="pie_pagina">
    © 2025 <strong>TeamUp</strong>. Todos los derechos reservados.
</footer>

</body>
</html>
