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
        <form action="../../../controllers/admin/crear_usuario.php" method="post">
            <h2 class="mb-2">Registrar Usuario</h2>
            <div class="input-group-from-admin">
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-group-from-admin">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="input-group-from-admin">
                <label for="tipo_usuario">Tipo de Usuario:</label>
                <select name="tipo_usuario" id="tipo_usuario" required>
                    <option value="Cliente">Cliente</option>
                    <option value="Vendedor">Vendedor</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-form">Guardar</button>
            <div>
                <button class=" btn btn-secondary mt-2 btn-form" onclick="window.location.href='../usuarios.php'">Volver</button>
            </div>
        </form>
    </div>
</body>

</html>