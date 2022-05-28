<!DOCTYPE html>
<html>

<head>
    <title>Correo nuevo usuario</title>
</head>

<body>
    <H1>Gracias por registrarte {{ $data['nombre'] }}</H1>
    <h3>Hola un placer saludarte {{ $data['nombre'] }}<h3></h3> <br>
    <p>Tu registro fue exitoso en nuestro sistema, te has registrado con el correo {{ $data['correo'] }}, con fecha de
        {{ $data['fecha'] }}</p>
</body>

</html>