<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Equipos - TeamUp</title>

    <link rel="stylesheet" href="{{ asset('css/gestion_equipo.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>

<header class="encabezado">
    <div class="contenedor-header">
        <div class="logo">
            <img src="{{ asset('imagenes/logo_final.png') }}" alt="Logo TeamUp">
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

<section class="bienvenida text-center mt-5">
    <h1><span>Gestión de Usuarios y Equipos</span></h1>
    <span>Administra tu información o únete a un equipo.</span>
</section>

<section class="modulos d-flex flex-wrap justify-content-center gap-4 mt-5">

    <div class="card modulo">
        <img src="{{ asset('imagenes/gestion_equipo.jpg') }}">
        <div class="card-body">
            <h4>Jugador</h4>
            <p>Consulta y actualiza tu perfil como jugador.</p>
            <a href="{{ route('registro_jugador') }}" class="btn btn-modulo">Entrar</a>
        </div>
    </div>

    <div class="card modulo">
        <img src="{{ asset('imagenes/crear_equipo.jpg') }}">
        <div class="card-body">
            <h4>Crear Equipo</h4>
            <p>Registra tu nuevo equipo.</p>
            <a href="{{ route('crear_equipo') }}" class="btn btn-modulo">Entrar</a>
        </div>
    </div>

    <div class="card modulo">
        <img src="{{ asset('imagenes/unirme_equipo.png') }}">
        <div class="card-body">
            <h4>Unirme a un Equipo</h4>
            <p>Explora equipos disponibles.</p>
            <a href="{{ route('unirme_equipo') }}" class="btn btn-modulo">Entrar</a>
        </div>
    </div>

    <div class="card modulo">
        <img src="{{ asset('imagenes/buscar_jugador.jpg') }}">
        <div class="card-body">
            <h4>Buscar Jugador</h4>
            <p>Consulta la lista de jugadores registrados.</p>
            <a href="{{ route('buscar_jugador') }}" class="btn btn-modulo">Entrar</a>
        </div>
    </div>

</section>

<div class="redes text-center mt-5">
    <a href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-facebook fa-2x" style="color: white;"></i></a>
    <a href="https://www.instagram.com/" target="_blank"><i class="fa-brands fa-instagram fa-2x" style="color: white;"></i></a>
    <a href="https://www.whatsapp.com/" target="_blank"><i class="fa-brands fa-whatsapp fa-2x" style="color: white;"></i></a>
</div>

<footer class="text-center mt-5 mb-3">
    <hr>
    <p>&copy; 2025 <strong>TeamUp</strong>. Todos los derechos reservados.</p>
</footer>

</body>
</html>
