<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Amistoso - TeamUp</title>

  <link rel="stylesheet" href="{{ asset('css/amistoso.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<header class="encabezado_amistoso">
    <div class="bloque_superior">

        <div class="logo_titulo_amistoso">
            <img src="{{ asset('imagenes/logo_final.png') }}" class="logo_amistoso">
            <h1 class="titulo_amistoso">TeamUp</h1>
        </div>

        <nav>
            <ul class="menu_amistoso">
                <li><a href="{{ route('gestion_torneos') }}"><strong>REGRESAR</strong></a></li>
                <li><a href="{{ route('logout') }}"><strong>CERRAR SESIÓN</strong></a></li>
            </ul>
        </nav>

    </div>
</header>

<section class="texto_central text-center mt-5">
    <h1><span class="resaltado_amistoso">Organizar Amistoso</span></h1>
    <span class="resaltado_amistoso">Registra los datos del partido amistoso para coordinar equipos.</span>
</section>

<section class="contenedor_formulario mt-5">

    <form action="{{ route('amistoso_store') }}" method="POST" class="formulario_amistoso sombra_amistoso p-4 rounded">
        @csrf

        <div class="mb-3">
            <label class="etiqueta_campo">Nombre del Partido</label>
            <input type="text" name="nombre_partido" class="entrada_campo" required>
        </div>

        <div class="mb-3">
            <label class="etiqueta_campo">Equipo Local</label>
            <input type="text" name="equipo_local" class="entrada_campo" required>
        </div>

        <div class="mb-3">
            <label class="etiqueta_campo">Equipo Visitante</label>
            <input type="text" name="equipo_visitante" class="entrada_campo" required>
        </div>

        <div class="mb-3">
            <label class="etiqueta_campo">Fecha</label>
            <input type="date" name="fecha" class="entrada_campo" required>
        </div>

        <div class="mb-3">
            <label class="etiqueta_campo">Hora</label>
            <input type="time" name="hora" class="entrada_campo" required>
        </div>

        <div class="mb-3">
            <label class="etiqueta_campo">Lugar</label>
            <input type="text" name="lugar" class="entrada_campo" required>
        </div>

        <div class="mb-4">
            <label class="etiqueta_campo">Comentarios</label>
            <textarea name="comentarios" class="entrada_area" rows="3"></textarea>
        </div>

        <div class="botones_amistoso text-center d-flex justify-content-center gap-3">
            <button type="submit" class="boton_guardar">Guardar</button>

            <button type="button" class="boton_enviar"
                    onclick="alert('Solicitud enviada correctamente');">
                Enviar Solicitud
            </button>
        </div>

    </form>

</section>

<footer class="pie_amistoso text-center mt-5 mb-3">
    <hr>
    <p>&copy; 2025 <strong>TeamUp</strong>. Todos los derechos reservados.</p>
</footer>

<div class="redes_amistoso text-center mt-4">
    <a href="#" target="_blank"><i class="fa-brands fa-facebook"></i></a>
    <a href="#" target="_blank"><i class="fa-brands fa-instagram"></i></a>
    <a href="#" target="_blank"><i class="fa-brands fa-whatsapp"></i></a>
</div>

</body>
</html>
