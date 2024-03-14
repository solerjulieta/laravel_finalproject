<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inscripción exitosa</title>
</head>
<body>
    <section>
        <h1>Inscripción realizada con éxito</h1>

        <p>¡Hola, {{ $usuario }}!</p>
        <p>Tu inscripción al curso <b>{{ $cursoInscripcion }}</b> fue realizada con éxito.</p>
        <p>¡Gracias por elegirnos!</p>
        <p>Saludos cordiales,<br> QuicKourses</p>
        <img src="{{ url('img/logo-mail.png') }}" alt="Isologo de QuicKourses" />
    </section>
</body>
</html>