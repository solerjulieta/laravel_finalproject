<?php
/** @var \App\Models\Usuario $usuario */
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recuperar contraseña</title>
</head>
<body>
    <section>
        <h1>Recuperar contraseña</h1>

        <p>¡Hola, {{ $usuario->nombre }}!</p>
        <p>Recibimos tu pedido de cambio de contraseña, para cambiarla debés ingresar al siguiente link: <a href="{{ route('auth.formResetear', ['token' => $token, 'id' => $usuario->usuario_id]) }}">Cambiar contraseña</a></p>
        <p>Te recordamos que el link estará habilitado sólo por 30 minutos desde que se realizó el pedido.</p>
        <p>Si no podés acceder al link, copiá y pegá el siguiente enlace: {{ route('auth.formResetear', ['token' => $token, 'id' => $usuario->usuario_id]) }}</p>
        <p>En caso que no hayas solicitado cambiar la contraseña, desestimá este correo.</p>
        <p>Saludos cordiales, <br> QuicKourses</p>
        <img src="{{ url('img/logo-mail.png') }}" alt="Isologo de QuicKourses" />
    </section>
</body>
</html>