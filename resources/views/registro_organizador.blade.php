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

<header class="encabezado_usuario">
    <div class="bloque_superior_usuario">
        <div class="logo_titulo_usuario">
            <img src="{{ asset('imagenes/logo_final.png') }}" class="logo_usuario">
            <h2 class="titulo_usuario">Registro de Usuario</h2>
        </div>

        <ul class="menu_usuario">

            <li><a href="{{ route('registro') }}">Tipo registro</a></li>
        </ul>
    </div>
</header>

<div class="contenido_principal_usuario">

    <div class="texto_central_usuario">
        <h2>Completa tus <span class="resaltado_usuario">datos personales</span></h2>
    </div>

    <img src="{{ asset('imagenes/nuevo_registro_usuario.png') }}" class="imagen_cuenta">

    <div class="contenedor_formulario_usuario">

        {{-- FORMULARIO CORRECTO --}}
        <form action="{{ route('registro_usuario.store') }}" method="POST" class="formulario_usuario">
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
            <input type="email" name="email" class="campo_dato" required>



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

            <div class="botones_usuario">
                <button type="submit">Registrar Usuario</button>
            </div>

        </form>
        {{-- FIN FORMULARIO --}}
    </div>
</div>

<footer class="pie_usuario">
    © 2025 TeamUp – Registro de Usuario
</footer>

</body>
</html>
