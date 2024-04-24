<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Usuario</title>
    <link rel="stylesheet" type="text/css" href="../../../static/styles/styles_admin.css">
</head>

<body>
    <div class="container-form">
        <form action="procesar_formulario.php" method="post">
            <h2>Registrar Usuario</h2>
            <div class="input-group-from-admin">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="input-group-from-admin">
                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="apellido" required>
            </div>
            <div class="input-group-from-admin">
                <label for="username">Nombre de Usuario:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group-from-admin">
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-group-from-admin">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <div>
                <button class=" btn btn-secondary mt-2" onclick="window.location.href='../usuarios.php'">Volver</button>
            </div>
        </form>
    </div>

</body>

</html>