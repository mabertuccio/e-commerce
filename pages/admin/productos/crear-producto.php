<?php
include '../../../controllers/bbdd.php';
$sql = "SELECT id, nombre FROM proveedores";
$result = $conn->query($sql);
if ($result && $result->rowCount() > 0) {
    $proveedores = array();
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $proveedores[] = $row;
    }
} else {
    $proveedores = array();
}
?>
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
                <label for="nombre">Nombre del producto:</label>
                <input type="text" id="nombre" name="nombre" placeholder="Nombre" required minlength="3" maxlength="18">
            </div>
            <div class="input-group-from-admin">
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" rows="4" placeholder="Descripción del producto"></textarea>
            </div>
            <div class="input-group-from-admin">
                <label for="cantidad">Stock:</label>
                <input type="text" id="stock" name="cantidad" placeholder="Stock" required pattern="[0-9]*">
            </div>
            <div class="input-group-from-admin">
                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" placeholder="Precio" required min="0.01" step="0.01">
            </div>
            <div class="input-group-from-admin">
                <label for="Proveedor">Proveedor</label>
                <select name="proveedor" id="proveedor" required>
                    <?php foreach ($proveedores as $proveedor) : ?>
                        <option value="<?php echo $proveedor['id']; ?>"><?php echo $proveedor['nombre']; ?></option>
                    <?php endforeach; ?>
                </select>
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