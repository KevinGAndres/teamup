<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscar Jugador - TeamUp</title>
    <link rel="stylesheet" href="{{ asset('css/buscar_jugador.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>

<header class="encabezado">
    <div class="contenedor_encabezado">
        <div class="bloque_logo">
            <img src="{{ asset('imagenes/logo_final.png') }}" class="imagen_logo" alt="TeamUp Logo">
            <h1 class="nombre_sitio">TeamUp</h1>
        </div>
        <nav class="menu_superior">
            <ul class="lista_menu">
                <li><a href="{{ route('gestion_equipos') }}"><strong>Regresar</strong></a></li>
            </ul>
        </nav>
    </div>
</header>

<section class="presentacion text-center mt-4">
    <h1 class="texto_resaltado">Buscar Jugadores</h1>
    <p class="texto_resaltado">Lista de todos los jugadores registrados</p>
</section>

<div class="contenedor_buscador">
    <form action="{{ route('buscar_jugadores.resultados') }}" method="GET">
        <input type="text" name="query" placeholder="Buscar por nombre, deporte o posición" class="input_buscador">
        <button type="submit" class="boton_buscador"><i class="fas fa-search"></i></button>
    </form>
</div>

<div class="contenedor_tabla">
    <table class="tabla_jugadores">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Deporte</th>
                <th>Posición</th>
                <th>Correo</th>
                <th>Teléfono</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jugadores as $j)
            <tr>
                <td>{{ $j->nombre }}</td>
                <td>{{ $j->edad }}</td>
                <td>{{ $j->deporte }}</td>
                <td>{{ $j->posicion }}</td>
                <td>{{ $j->correo }}</td>
                <td>{{ $j->telefono }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
