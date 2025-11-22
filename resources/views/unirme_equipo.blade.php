<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Unirme a un Equipo - TeamUp</title>
  <link rel="stylesheet" href="{{ asset('css/unirme_equipo.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<header class="encabezado">
    <div class="contenedor_encabezado">
        <div class="bloque_logo">
            <img src="{{ asset('imagenes/logo_final.png') }}" class="logo">
            <h1 class="titulo_principal">TeamUp</h1>
        </div>

        <nav class="barra_menu">
            <ul class="lista_menu">
                 <li><a href="{{ route('gestion_equipos') }}"><strong>Regresar</strong></a></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 text-decoration-none"><strong>Cerrar Sesión</strong></button>
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</header>

<section class="contenedor_equipos mt-5 container">

    @if(session('success'))
        <div class="alert alert-success text-center fw-bold">{{ session('success') }}</div>
    @endif
 @if(session('error'))
        <div class="alert alert-danger text-center fw-bold">{{ session('error') }}</div>
    @endif



    <div class="row justify-content-center g-4">

        @foreach($equipos as $equipo)
        <div class="col-md-4">
            <div class="tarjeta_equipo shadow">

    @if($equipo->logo)
                <img src="{{ asset('storage/' . ($equipo->logo ?? '')) }}" class="imagen_equipo">

                @else
                    <img src="{{ asset('imagenes/logo_final.png') }}" class="imagen_equipo">
                @endif 

                <div class="contenido_tarjeta text-center">
                    <h5 class="nombre_equipo">{{ $equipo->nombre }}</h5>
                    <p><strong>Deporte:</strong> {{ $equipo->deporte }}</p>
                    <p><strong>Lugar:</strong> {{ $equipo->lugar }}</p>

                <form action="{{ route('equipo.solicitud', $equipo->id_equipo) }}" method="POST">
                        @csrf
                        <button class="boton_solicitud" type="submit">Enviar Solicitud</button>
                    </form>

                </div>

            </div>
        </div>
        @endforeach

    </div>
</section>

<div class="redes_sociales text-center mt-5">
    <a href="#"><i class="fa-brands fa-facebook fa-2x mx-2" style="color:white"></i></a>
    <a href="#"><i class="fa-brands fa-instagram fa-2x mx-2" style="color:white"></i></a>
    <a href="#"><i class="fa-brands fa-whatsapp fa-2x mx-2" style="color:white"></i></a>
</div>

<footer class="pie_pagina text-center mt-5 mb-3">
    <hr>
    <p>&copy; 2025 TeamUp. Todos los derechos reservados.</p>
</footer>

</body>
</html>
