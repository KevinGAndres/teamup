<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Exitoso - TeamUp</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <style>
        body {
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #657cff, #000000, #ffffff);
            background-size: 200% 200%;
            color: white;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            animation: fondo_animado 10s ease infinite;
        }

        @keyframes fondo_animado {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .tarjeta {
            background: rgba(255, 255, 255, 0.90);
            width: 90%;
            max-width: 450px;
            padding: 35px;
            border-radius: 15px;
            text-align: center;
            color: #000;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.4);
            animation: aparecer 0.8s ease;
        }

        @keyframes aparecer {
            from { transform: scale(0.8); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }

        .tarjeta i {
            font-size: 4rem;
            color: #28a745;
            margin-bottom: 15px;
            text-shadow: 0 0 10px #2fff72;
        }

        .titulo {
            font-size: 1.8rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .mensaje {
            font-size: 1.1rem;
            margin-bottom: 25px;
            color: #333;
        }

        .btn-volver {
            display: block;
            width: 100%;
            background: linear-gradient(90deg, #007bff, #0048ff);
            color: white;
            text-decoration: none;
            font-weight: bold;
            padding: 12px 0;
            border-radius: 8px;
            transition: 0.3s;
        }

        .btn-volver:hover {
            background: linear-gradient(90deg, #0048ff, #001f70);
            transform: scale(1.05);
        }
    </style>
</head>

<body>

<div class="tarjeta">
    <i class="fa-solid fa-circle-check"></i>

    <div class="titulo">
        ¡Registro Completado!
    </div>

    <div class="mensaje">
        Tus datos se han guardado correctamente en TeamUp.
    </div>

    <a href="{{ route('gestion_equipos') }}" class="btn-volver">
        Volver a Gestión de Equipo y Jugadores
    </a>
</div>

</body>
</html>
