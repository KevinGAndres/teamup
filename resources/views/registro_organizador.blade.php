<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Organizador - TeamUp</title>
    <link rel="stylesheet" href="{{ asset('css/registro_organizador.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>

<header class="encabezado_organizador">
    <div class="bloque_superior_organizador">
        <div class="logo_titulo_organizador">
            <img src="{{ asset('imagenes/logo_final.png') }}" class="logo_organizador">
            <h2 class="titulo_organizador">Registro Organizador</h2>
        </div>
        <ul class="menu_organizador">
            <li><a href="{{ route('login') }}">Volver al inicio</a></li>
            <li><a href="{{ route('registro') }}">Tipo registro</a></li>
        </ul>
    </div>
</header>

<div class="contenido_principal_organizador">
    <div class="texto_central_organizador">
        <h2>Completa los <span class="resaltado_organizador">datos personales</span></h2>
    </div>

    <img src="{{ asset('imagenes/nuevo_registro_admin2.png') }}" class="imagen_organizador">

    <div class="contenedor_formulario_organizador">
        <form action="{{ route('registro_organizador.store') }}" method="POST" class="formulario_organizador">
            @csrf

            <label class="etiqueta_dato">Tipo Documento</label>
            <select name="tipodoc" class="campo_dato" required>
                <option value="">Seleccione...</option>
                <option value="CC">Cédula de Ciudadanía</option>
                <option value="TI">Tarjeta de Identidad</option>
                <option value="CE">Cédula de Extranjería</option>
                <option value="PA">Pasaporte</option>
            </select>

            <label class="etiqueta_dato">Documento</label>
            <input type="number" name="documento" class="campo_dato" required>

            <label class="etiqueta_dato">Nombre</label>
            <input type="text" name="nombre" class="campo_dato" required>

            <label class="etiqueta_dato">Apellido</label>
            <input type="text" name="apellido" class="campo_dato" required>

            <label class="etiqueta_dato">Correo</label>
            <input type="email" name="correo" class="campo_dato" required>

            <label class="etiqueta_dato">Teléfono</label>
            <input type="number" name="telefono" class="campo_dato" required>

            <label class="etiqueta_dato">Género</label>
            <select name="genero" class="campo_dato" required>
                <option value="">Seleccione...</option>
                <option value="masculino">Masculino</option>
                <option value="femenino">Femenino</option>
                <option value="otro">Otro</option>
            </select>

            <label class="etiqueta_dato">Contraseña</label>
            <input type="password" name="contrasena" class="campo_dato" required>

            <label class="etiqueta_dato">Confirmar Contraseña</label>
            <input type="password" name="contrasena_confirmation" class="campo_dato" required>

            <div class="botonera_organizador">
                <button type="submit" class="boton_registro">Registrar Organizador</button>
            </div>
        </form>
    </div>
</div>

<footer class="pie_organizador">
    © 2025 TeamUp – Registro Organizador
</footer>

</body>
</html>
