<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel = "stylesheet" href = "{{ asset('css/pdf.css') }}">
    <title>Generador de reportes - Knowledge USB</title>
</head>
<body>
    <main role = "main" class = "contenedor-pdf">
        @include('reportes.partials.pdf-header')
        @yield('content')
        @include('reportes.partials.pdf-footer')
    </main>
</body>
</html>
