<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Registro de Jugador - TeamUp</title>

   <link rel="stylesheet" href="{{ asset('css/registro_jugador.css') }}">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body>

<header class="encabezado">
   <div class="contenedor_encabezado">

      <div class="bloque_logo">
         <img src="{{ asset('imagenes/logo_final.png') }}" class="imagen_logo">
         <h1 class="nombre_sitio">TeamUp</h1>
      </div>

      <nav class="menu_superior">
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

<section class="presentacion text-center mt-5">
   <h1><span class="texto_resaltado">Registro de Jugador</span></h1>
   <p class="texto_resaltado">Completa tu perfil deportivo para unirte a TeamUp.</p>
</section>
<section class="contenedor_formulario mt-4">

 <form action="{{ route('jugador.store') }}" method="POST" class="formulario_registro">
      @csrf

      <div class="campo_formulario">
         <label class="etiqueta_campo">Nombre</label>
         <input type="text" name="nombre" class="entrada_texto" required>
      </div>

      <div class="campo_formulario">
         <label class="etiqueta_campo">Edad</label>
         <input type="number" name="edad" class="entrada_texto" required>
      </div>

      <div class="campo_formulario">
         <label class="etiqueta_campo">Correo</label>
         <input type="email" name="correo" class="entrada_texto" required>
      </div>

      <div class="campo_formulario">
         <label class="etiqueta_campo">Deporte</label>
         <input type="text" name="deporte" class="entrada_texto" required>
      </div>

      <div class="campo_formulario">
         <label class="etiqueta_campo">Posición</label>
         <input type="text" name="posicion" class="entrada_texto" required>
      </div>

      <div class="campo_formulario">
         <label class="etiqueta_campo">Género</label>
         <select name="genero" class="lista_opciones" required>
            <option value="">Seleccione…</option>
            <option value="masculino">Masculino</option>
            <option value="femenino">Femenino</option>
         </select>
      </div>

      <div class="campo_formulario">
         <label class="etiqueta_campo">Teléfono</label>
         <input type="text" name="telefono" class="entrada_texto" required>
      </div>

      <div class="boton_contenedor">
         <button type="submit" class="boton_guardar">Guardar Jugador</button>
      </div>

   </form>

</section>

@if(session('success'))
<div class="alert alert-success text-center" style="font-weight: bold;">
    {{ session('success') }}
</div>
@endif

<div class="redes_sociales text-center mt-4">
    <a href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-facebook"></i></a>
    <a href="https://www.instagram.com/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
    <a href="https://www.whatsapp.com/" target="_blank"><i class="fa-brands fa-whatsapp"></i></a>
</div>

<footer class="pie_pagina">
   © 2025 TeamUp — Registro de Jugador
</footer>

</body>
</html>
