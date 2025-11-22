<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Equipo - TeamUp</title>

    <link rel="stylesheet" href="{{ asset('css/crear_equipo.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<header class="encabezado">
    <div class="contenedor_encabezado">
        <div class="bloque_logo">
            <img src="{{ asset('imagenes/logo_final.png') }}" alt="" class="logo">
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

<section class="seccion_titulo text-center mt-5">
    <h1><span class="nombre_app">Registro de Equipo</span></h1>
    <span class="nombre_app">Completa los datos para registrar tu equipo.</span>
</section>

<section class="contenedor_formulario mt-4">
  <form action="{{ route('equipo.store') }}" method="POST" enctype="multipart/form-data" class="formulario shadow p-4 rounded">
        @csrf

        <div class="mb-3">
            <label class="etiqueta">Nombre del Equipo</label>
            <input type="text" name="nombre" class="campo" required>
        </div>

        <div class="mb-3">
            <label class="etiqueta">Deporte</label>
            <input type="text" name="deporte" class="campo" required>
        </div>

        <div class="mb-3">
            <label class="etiqueta">Integrantes</label>
            <input type="number" name="integrantes" class="campo" min="1" required>

        </div>

        <div class="mb-3">
            <label class="etiqueta">Correo</label>
            <input type="email" name="correo" class="campo" required>
        </div>

        <div class="mb-3">
            <label class="etiqueta">Género</label>
            <select name="genero" class="campo_seleccion" required>
                <option disabled selected>Seleccione una opción</option>
                <option>Masculino</option>
                <option>Femenino</option>
                <option>Mixto</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="etiqueta">Lugar</label>
            <input type="text" name="lugar" class="campo" required>
        </div>
        <div class="mb-4">
          <label class="etiqueta">Logo del Equipo</label>
            <input type="file" name="logo" class="campo" accept="image/*">
        </div>

        <div class="text-center">
            <button type="submit" class="boton_guardar">Guardar</button>
        </div>

    </form>
</section>

@if(session('success'))
<div class="alert alert-success text-center mt-3" style="font-weight: bold;">
    {{ session('success') }}
</div>
@endif

<div class="redes_sociales text-center mt-5">
    <a href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-facebook fa-2x mx-2"></i></a>
    <a href="https://www.instagram.com/" target="_blank"><i class="fa-brands fa-instagram fa-2x mx-2"></i></a>
    <a href="https://www.whatsapp.com/" target="_blank"><i class="fa-brands fa-whatsapp fa-2x mx-2"></i></a>
</div>

<footer class="pie_pagina text-center mt-5 mb-3">
    <hr>
    <p>&copy; 2025 <strong>TeamUp</strong>. Todos los derechos reservados.</p>
</footer>

</body>
</html>
