<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crear Torneo - TeamUp</title>

  <link rel="stylesheet" href="{{ asset('css/crear_torneo.css') }}">
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
         <li><a href="{{ route('torneos_inicio') }}"><strong>Regresar</strong></a></li>
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

<section class="seccion_titulo text-center mt-5">
    <h1><span class="nombre_app">Condiciones / Requisitos</span></h1>
    <span class="nombre_app">Completa el formulario para registrar un nuevo torneo.</span>
</section>

<section class="contenedor_formulario mt-5">

@php($edicion = isset($torneo))
  <form action="{{ $edicion ? route('torneos.update', $torneo->id_torneo) : route('torneos.store') }}" method="POST" class="formulario shadow p-4 rounded">

        @csrf
         @if($edicion)
            @method('PUT')
        @endif

        <div class="mb-3">
            <label class="etiqueta">Nombre del Torneo</label>
            <input type="text" name="nombreTorneo" class="campo" value="{{ old('nombreTorneo', $torneo->nombre ?? '') }}" required>
        </div>
 

        <div class="mb-3">
            <label class="etiqueta">Deporte</label>
            <input type="text" name="deporte" class="campo" value="{{ old('deporte', $torneo->deporte ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label class="etiqueta">Cantidad Equipos</label>
            <input type="number" name="cantidadEquipos" class="campo" min="2" value="{{ old('cantidadEquipos', $torneo->cantidad_equipos ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label class="etiqueta">Formato</label>
            <input type="text" name="formato" class="campo" value="{{ old('formato', $torneo->formato ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label class="etiqueta">Lugar</label>
            <input type="text" name="lugar" class="campo" value="{{ old('lugar', $torneo->lugar ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label class="etiqueta">Premios</label>
            <input type="text" name="premios" class="campo" value="{{ old('premios', $torneo->premios ?? '') }}" required>
        </div>

        <div class="text-center">
            <button class="boton_guardar" type="submit">Guardar</button>
        </div>

    </form>

</section>

<footer class="pie_pagina text-center mt-5">
    <hr>
    <p>&copy; 2025 TeamUp — Crear Torneo</p>
</footer>

</body>
</html>
