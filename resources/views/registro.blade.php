<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro - TeamUp</title>
  <link rel="stylesheet" href="{{ asset('css/registro.css') }}">
</head>
<body>

<header class="encabezado_registro">
  <div class="bloque_superior_registro">
    <div class="logo_titulo_registro">
      <img src="{{ asset('imagenes/logo_final.png') }}" class="logo_registro">
      <h2 class="titulo_registro">TeamUp</h2>
    </div>
    <ul class="menu_registro">
      <a href="{{ route('login') }}">Volver al inicio</a>
    </ul>
  </div>
</header>

<div class="texto_central_registro">
  <h1>Elige tu tipo de <span class="resaltado_registro">registro</span></h1>
</div>

<div class="contenedor_registro">

  {{-- Usuario --}}
  <a href="{{ route('registro_usuario') }}" class="enlace_tarjeta">
    <div class="tarjeta_registro">
      <img src="{{ asset('imagenes/nuevo_registro_usuario.png') }}" class="imagen_tarjeta">
      <div class="contenido_tarjeta">
        <h4>Registrar Usuario</h4>
      </div>
    </div>
  </a>

  {{-- Administrador --}}
  <a href="{{ route('registro_admin') }}" class="enlace_tarjeta">
    <div class="tarjeta_registro">
      <img src="{{ asset('imagenes/foto_organizador.png') }}" class="imagen_tarjeta">
      <div class="contenido_tarjeta">
        <h4>Registrar Administrador</h4>
      </div>
    </div>
  </a>

  {{-- Organizador --}}
  <a href="{{ route('registro_organizador') }}" class="enlace_tarjeta">
    <div class="tarjeta_registro">
      <img src="{{ asset('imagenes/nuevo_registro_admin2.png') }}" class="imagen_tarjeta">
      <div class="contenido_tarjeta">
        <h4>Registrar Organizador</h4>
      </div>
    </div>
  </a>

</div>

<footer class="pie_registro">
  © 2025 TeamUp - Todos los derechos reservados.
</footer>

</body>
</html>
