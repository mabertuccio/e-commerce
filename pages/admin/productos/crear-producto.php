<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar producto</title>
    <link rel="stylesheet" type="text/css" href="../../../static/styles/styles_admin.css">

</head>

<body>
    <div class="container-form">
        <h2>Registrar producto</h2>
        <form action="../../../controllers/admin/crear_producto.php" method="post">
            <div class="input-group-from-admin">
                <label for="name">Nombre del producto:</label>
                <input type="text" id="nombre" placeholder="Nombre" required minlength="3" maxlength="18">
            </div>
            <div class="input-group-from-admin">
                <label for="tradeMark">Marca:</label>
                <input type="text" id="marca" placeholder="Marca" required minlength="4">
            </div>
            <div class="input-group-from-admin">
                <label for="description">Descripción:</label>
                <textarea id="descripcion" rows="4" placeholder="Descripción del producto"></textarea>
            </div>
            <div class="input-group-from-admin">
                <label for="qty">Stock:</label>
                <input type="text" id="stock" placeholder="Stock" required pattern="[0-9]*">
            </div>
            <div class="input-group-from-admin">
                <label for="price">Precio:</label>
                <input type="number" id="precio" placeholder="Precio" required min="0.01" step="0.01">
            </div>
            <div>
                <button type="submit" class="btn btn-primary btn-form">Guardar</button>
            </div>
            <div>
                <button class=" btn btn-secondary mt-2 btn-form" onclick="window.location.href='../productos.php'">Volver</button>
            </div>
        </form>
    </div>

</body>

</html>