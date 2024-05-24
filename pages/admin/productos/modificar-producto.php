<?php
include '../../../controllers/bbdd.php';
$id = isset($_GET['id']) ? $_GET['id'] : null;
if ($id) {

    try {
        $stmt = $conn->prepare("SELECT * FROM productos WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $producto = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error al recuperar los datos del producto: " . $e->getMessage();
    }
} else {
    echo "ID de producto no proporcionado.";
    exit;
}
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
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Proveedor</title>
    <link rel="stylesheet" type="text/css" href="../../../static/styles/styles_admin.css">
</head>

<body>
    <div class="container-form">
        <form id="modificarProductoForm" action="../../../controllers/admin/modificar_producto.php" method="post">
            <h2 class="mb-2">Modificar Producto</h2>
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
            <div class="input-group-from-admin">
                <label for="nombre">Nombre del producto:</label>
                <input type="text" id="nombre" name="nombre" required value="<?php echo htmlspecialchars($producto['nombre']); ?>">
            </div>
            <div class="input-group-from-admin">
                <label for="description">Descripción:</label>
                <textarea id="descripcion" name="descripcion" rows="4" placeholder="Descripción del producto"><?php echo htmlspecialchars($producto['descripcion']); ?></textarea>
            </div>
            <div class="input-group-from-admin">
                <label for="cantidad">Stock:</label>
                <input type="text" id="cantida" name="cantidad" placeholder="Stock" required pattern="[0-9]*" value="<?php echo htmlspecialchars($producto['cantidad']); ?>">
            </div>
            <div class="input-group-from-admin">
                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" placeholder="Precio" required min="0.01" step="0.01" value="<?php echo htmlspecialchars($producto['precio']); ?>">
            </div>
            <div class="input-group-from-admin">
                <label for="proveedor">Proveedor:</label>
                <select name="proveedor" id="proveedor" required>
                    <?php foreach ($proveedores as $proveedor) : ?>
                        <option value="<?php echo $proveedor['id']; ?>" <?php if ($proveedor['id'] == $producto['id_proveedor']) echo 'selected'; ?>>
                            <?php echo htmlspecialchars($proveedor['nombre']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-form">Guardar</button>
            <div>
                <button type="button" class="btn btn-secondary mt-2 btn-form" id="volverBtn">Volver</button>
            </div>
        </form>
    </div>

</body>
<script src="../../../static/js/productos.js"></script>

</html>