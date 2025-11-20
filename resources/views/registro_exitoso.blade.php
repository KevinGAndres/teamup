<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Exitoso - TeamUp</title>

    <link rel="stylesheet" href="{{ asset('css/registro_exitoso.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body>

<div class="contenedor_exito">

    <div class="tarjeta_exito">

        <i class="fa-solid fa-circle-check icono_exito"></i>

        <h1 class="titulo_exito">¡Registro Exitoso!</h1>

        <p class="mensaje_exito">Tu cuenta ha sido creada correctamente.</p>

        <a href="{{ route('login_form') }}" class="boton_volver">
            Volver al Login
        </a>

    </div>

</div>

</body>
</html>
