<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TeamUp - Iniciar Sesión</title>

    <link rel="stylesheet" href="{{ asset('css/inicio.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="contenedor_login">
        <div class="caja_login">

            <div class="titulo_login">
                <h2><span class="texto_azul">Iniciar Sesión</span></h2>
            </div>

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

                <form action="{{ route('login_process') }}" method="POST">

                @csrf

                <input type="email" name="email" class="form_control" placeholder="Correo electrónico">
                <input type="password" name="password" class="form_control" placeholder="Contraseña" required>

                <button type="submit" class="btn_login">Iniciar sesión</button>

                <a href="{{ route('registro') }}" class="link_registro">¿No tienes cuenta? Regístrate</a>
            </form>

        </div>
    </div>

    <div class="redes_sociales text-center mt-4">
        <a href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-facebook"></i></a>
        <a href="https://www.instagram.com/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
        <a href="https://www.whatsapp.com/" target="_blank"><i class="fa-brands fa-whatsapp"></i></a>
    </div>

    <footer class="pie_pagina text-center mt-3">
        <p>&copy; 2025 <strong>TeamUp</strong>. Todos los derechos reservados.</p>
    </footer>

</body>
</html>
