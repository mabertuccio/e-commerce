<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Proveedor</title>
    <link rel="stylesheet" type="text/css" href="../../../static/styles/styles_admin.css">
</head>

<body>
    <div class="container-form">
        <form action="../../../controllers/admin/crear_proveedor.php" method="post">
            <h2>Registrar proveedor</h2>
            <div class="input-group-from-admin">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="input-group-from-admin">
                <label for="direccion">Direccion:</label>
                <input type="text" id="direccion" name="direccion" required>
            </div>
            <!-- <div class="input-group-from-admin">
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required>
            </div> -->
            <button type="submit" class="btn btn-primary btn-form">Guardar</button>
            <div>
                <button class=" btn btn-secondary mt-2 btn-form" id="volverBtn">Volver</button>
            </div>
        </form>
    </div>
</body>
<script src="../../../static/js/proveedores.js"></script>

</html>