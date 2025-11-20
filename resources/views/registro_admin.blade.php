<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Administrador - TeamUp</title>

    <link rel="stylesheet" href="{{ asset('css/registro_admin.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body>

<header class="encabezado_admin">
    <div class="bloque_superior_admin">

        <div class="logo_titulo_admin">
            <img src="{{ asset('imagenes/logo_final.png') }}" class="logo_admin">
            <h2 class="titulo_admin">Registro Administrador</h2>
        </div>

        <ul class="menu_admin">
            <li><a href="{{ route('login_form') }}">Volver</a></li>
            <li><a href="{{ route('registro') }}">Tipo registro</a></li>
        </ul>

    </div>
</header>

<div class="contenido_principal_admin">

    <div class="texto_central_admin">
        <h2>Completa los <span class="resaltado_admin">datos personales</span></h2>
    </div>

    <img src="{{ asset('imagenes/admin_logo.png') }}" class="imagen_admin">

    <div class="contenedor_formulario_admin">

        <form action="{{ route('registro_admin_store') }}" method="POST" class="formulario_admin">
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

            <label class="etiqueta_dato">Correo</label>
            <input type="email" name="correo" class="campo_dato" required>

            <label class="etiqueta_dato">Teléfono</label>
            <input type="number" name="telefono" class="campo_dato" required>

            <label class="etiqueta_dato">Contraseña</label>
            <input type="password" name="contrasena" class="campo_dato" required>

            <label class="etiqueta_dato">Confirmar Contraseña</label>
            <input type="password" name="contrasena_confirmation" class="campo_dato" required>

            <div class="botonera_admin">
                <button type="submit">Registrar Administrador</button>
            </div>

        </form>

    </div>

</div>

<footer class="pie_admin">
    © 2025 TeamUp - Registro Administrador
</footer>

</body>
</html>
