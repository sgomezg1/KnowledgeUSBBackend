<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Generador de reportes - Knowledge USB</title>
    <style>
        @page {
            margin: 150px 60px;
        }

        header {
            position: fixed;
            top: -140px;
            left: 0px;
            right: 0px;
            height: 130px;
        }

        footer {
            position: fixed;
            bottom: -150px;
            left: 0px;
            right: 0px;
            height: 50px;
        }

        .contenedor-pdf {
            font-size: 12px;
        }

        .logo-usb {
            max-width: 400px;
            width: 80%;
        }

        .titulo-resultado {
            text-decoration: underline;
            font-weight: bold;
            margin-top: 0;
            margin-bottom: 5px !important;
        }

        .descripcion-resultado {
            color: #6f6f6f;
            text-align: justify;
            text-align-last: left;
            margin-bottom: 10px;
        }

        .subtitulo-resultados {
            color: #ea8500;
            margin-bottom: 5px !important;
        }

        .resultados-buscador-tarjeta {
            display: flex;
            flex-wrap: wrap;
            width: 100%;
            margin-bottom: 20px;
            padding: 20px;
            border: 1px solid rgba(111, 111, 111, 0.85);
            text-decoration: none;
            cursor: pointer;
        }

        .contenedor-flex-tarjeta-buscador {
            width: 50%;
        }

        .texto-resultado {
            color: #6f6f6f;
            display: flex;
        }

        .texto-resultado div,
        .texto-resultado a {
            border: 1px solid #6f6f6f;
            padding: 5px;
            margin: 5px 10px 5px 0;
            border-radius: 5px;
        }

        .subcontenedor-resultados-tarjeta {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <header>
        @include('reportes.partials.pdf-header')
    </header>
    <footer>
        @include('reportes.partials.pdf-footer')
    </footer>
    <main role="main" class="contenedor-pdf">
        @yield('content')
    </main>
</body>

</html>
