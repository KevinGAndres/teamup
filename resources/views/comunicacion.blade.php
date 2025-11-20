<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Comunicación - TeamUp</title>

    <link rel="stylesheet" href="{{ asset('css/comunicacion.css') }}">
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

<section class="titulo_pagina">
    <h2>Comunicación y Comunidad</h2>
    <p>Chats, anuncios, noticias y foros deportivos.</p>
</section>

<section class="contenedor_modulos">

    <div class="modulo">
        <i class="fa-solid fa-comments icono_modulo"></i>
        <h3>Chat Deportivo</h3>
        <p>Comunícate con equipos y jugadores.</p>
        <a href="#" class="btn_modulo">Entrar</a>
    </div>

    <div class="modulo">
        <i class="fa-solid fa-bullhorn icono_modulo"></i>
        <h3>Anuncios</h3>
        <p>Noticias, novedades y convocatorias deportivas.</p>
        <a href="#" class="btn_modulo">Ver anuncios</a>
    </div>

    <div class="modulo">
        <i class="fa-solid fa-users icono_modulo"></i>
        <h3>Foros</h3>
        <p>Debate y comparte ideas con la comunidad.</p>
        <a href="#" class="btn_modulo">Participar</a>
    </div>

</section>

<footer class="pie">
    <p>© 2025 TeamUp — Comunicación y Comunidad</p>
</footer>

<div class="redes_sociales text-center mt-4">
    <a href="#"><i class="fa-brands fa-facebook"></i></a>
    <a href="#"><i class="fa-brands fa-instagram"></i></a>
    <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
</div>

</body>
</html>
