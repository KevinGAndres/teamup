<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Administrador - TeamUp</title>
   <link rel="stylesheet" href="{{ asset('css/administrador.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <header class="encabezado_admin">
    <div class="bloque_superior_admin">
      <div class="logo_titulo_admin">
        <img src="Imagenes/logo_final.jpg" alt="Logo TeamUp" class="logo_admin">
        <h1 class="titulo_admin">Panel de Administración</h1>
      </div>
      <nav>
        <ul class="menu_admin">
          <li><a href="index.html">Inicio</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <section class="resumen_admin">
    <div class="tarjeta_admin">
      <i class="fa-solid fa-users icono_admin"></i>
      <h3>Usuarios Registrados</h3>
      <p>248</p>
    </div>
    <div class="tarjeta_admin">
      <i class="fa-solid fa-trophy icono_admin"></i>
      <h3>Torneos Activos</h3>
      <p>5</p>
    </div>
    <div class="tarjeta_admin">
      <i class="fa-solid fa-people-group icono_admin"></i>
      <h3>Equipos</h3>
      <p>32</p>
    </div>
  </section>

  <section class="panel_datos_admin">
    <div class="bloque_datos">
      <h2>Últimas Noticias</h2>
      <div class="cuadro_noticia">
        <h4>Nuevo Torneo de Verano</h4>
        <p>Inscripciones abiertas para el torneo regional. Cupos limitados.</p>
        <span>09/11/2025</span>
      </div>
      <div class="cuadro_noticia">
        <h4>Actualización de Reglamento</h4>
        <p>Se ajustaron las normas para la categoría Sub-20.</p>
        <span>08/11/2025</span>
      </div>
    </div>

    <div class="bloque_datos">
      <h2>Próximos Partidos</h2>
      <table class="tabla_admin">
        <thead>
          <tr>
            <th>Equipo A</th>
            <th>Equipo B</th>
            <th>Fecha</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Águilas</td>
            <td>Tiburones</td>
            <td>12/11/2025</td>
          </tr>
          <tr>
            <td>Guerreros</td>
            <td>Leones</td>
            <td>13/11/2025</td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>

  <footer class="pie_admin">
    <p>&copy; 2025 TeamUp. Panel del Administrador.</p>
  </footer>
</body>
</html>
