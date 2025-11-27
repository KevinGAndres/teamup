<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device‑width, initial-scale=1.0">
   <title>Gestión de Torneos ‑ TeamUp</title>

   <link rel="stylesheet" href="{{ asset('css/gestion_torneos.css') }}">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<header class="encabezado">
   <div class="contenedor_encabezado">
      <div class="contenedor_logo">
         <img src="{{ asset('imagenes/logo_final.png') }}" class="logo" alt="TeamUp Logo">
         <h1 class="nombre_app">TeamUp</h1>
      </div>

      <nav class="menu_principal">
         <ul>
            <li><a href="{{ route('principal') }}">Regresar</a></li>
            <li>
               <form action="{{ route('logout') }}" method="POST">
                  @csrf
                  <button type="submit" class="btn btn-link p-0 text-decoration-none">Cerrar sesión</button>
               </form>
            </li>
         </ul>
      </nav>

   </div>
</header>

<section class="seccion_bienvenida text-center mt-5">
   <h1><span class="resaltado">Gestión de Torneos</span></h1>
   <span class="resaltado">Organiza, busca o participa en torneos dentro de TeamUp.</span>
</section>

<section class="seccion_tarjetas d-flex flex-wrap justify-content-center gap-4 mt-5">

   <!-- Crear Torneo -->
   <div class="tarjeta_torneo">
      <img src="{{ asset('imagenes/crea_torneo.png') }}" class="imagen_tarjeta" alt="Crear Torneo">
      <div class="contenido_tarjeta text-center">
         <h4>Crear Torneo</h4>
         <p>Diseña y configura nuevos torneos.</p>
         <a href="{{ route('torneos.create') }}" class="boton_entrar">Entrar</a>
      </div>
   </div>

   <!-- Buscar Torneo -->
   <div class="tarjeta_torneo">
      <img src="{{ asset('imagenes/convocatoria.jpg') }}" class="imagen_tarjeta" alt="Buscar Torneo">
      <div class="contenido_tarjeta text-center">
         <h4>Buscar Torneo</h4>
         <p>Explora torneos disponibles.</p>
         <a href="{{ route('torneo_buscar') }}" class="boton_entrar">Entrar</a>
      </div>
   </div>

   <!-- Amistoso -->
   <div class="tarjeta_torneo">
      <img src="{{ asset('imagenes/amistoso.jpeg') }}" class="imagen_tarjeta" alt="Amistoso">
      <div class="contenido_tarjeta text-center">
         <h4>Amistoso</h4>
         <p>Organiza partidos amistosos.</p>
         <a href="{{ route('amistoso') }}" class="boton_entrar">Entrar</a>
      </div>
   </div>

</section>

<footer class="pie_pagina text-center mt-5 mb-3">
   <hr>
   <p>© 2025 TeamUp. Todos los derechos reservados.</p>
</footer>

</body>
</html>
