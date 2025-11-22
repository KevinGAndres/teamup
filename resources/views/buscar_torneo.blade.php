<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buscar Torneo - TeamUp</title>

  <link rel="stylesheet" href="{{ asset('css/buscar_torneo.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<header class="encabezado">
    <div class="bloque_encabezado">
        <div class="logo_titulo">
            <img src="{{ asset('imagenes/logo_final.png') }}" class="logo_imagen" alt="TeamUp Logo">
            <h1 class="titulo_principal">TeamUp</h1>
        </div>

        <nav>
            <ul class="menu_opciones">
                <li><a href="{{ route('torneos_inicio') }}"><strong>REGRESAR</strong></a></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 text-decoration-none"><strong>CERRAR SESIÓN</strong></button>
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</header>

<section class="texto_cabecera text-center mt-5">
    <h1><span class="resaltado">Buscar Torneo</span></h1>
    <span class="resaltado">Encuentra torneos disponibles.</span>
</section>

<div class="contenedor_buscador text-center mt-4 mb-4">
    <form action="{{ route('torneo_buscar') }}" method="GET">
        <input type="text" name="query" id="entrada_buscador" class="form-control campo_buscador"
               placeholder="Buscar torneo por nombre, deporte o lugar..." value="{{ old('query', $query ?? '') }}">
        <button type="submit" class="btn boton_buscador"><i class="fas fa-search"></i></button>
    </form>
</div>

<section class="contenedor_torneos container">
    <div class="row justify-content-center" id="lista_torneos">

        @forelse($torneos as $torneo)
        <div class="col-md-4 tarjeta_torneo text-center p-3 m-3 sombra">
            <h4>{{ $torneo->nombre }}</h4>
            <p><strong>Deporte:</strong> {{ $torneo->deporte }}</p>
            <p><strong>Lugar:</strong> {{ $torneo->lugar }}</p>
            <p><strong>Equipos:</strong> {{ $torneo->cantidad_equipos }}</p>
            <a href="#" class="btn boton_unirse">Unirse</a>
        </div>
        @empty
        <p class="text-center text-white mt-5">No se han encontrado torneos para "{{ $query ?? '' }}"</p>
        @endforelse

    </div>
</section>

<footer class="pie_pagina text-center mt-5 mb-3">
   <hr>
   <p>&copy; 2025 TeamUp</p>
</footer>

<script>
    const buscador = document.getElementById('entrada_buscador');
    const torneos  = document.querySelectorAll('.tarjeta_torneo');

    buscador.addEventListener('keyup', () => {
        const texto = buscador.value.toLowerCase();
        torneos.forEach(t => {
            const nombre = t.querySelector('h4').innerText.toLowerCase();
            t.style.display = nombre.includes(texto) ? 'block' : 'none';
        });
    });
</script>

</body>
</html>
