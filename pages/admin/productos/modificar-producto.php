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
            <h2>Modificar Producto</h2>
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
            <div class="input-group-from-admin">
                <label for="nombre">Nombre del producto:</label>
                <input type="text" id="nombre" required value="<?php echo htmlspecialchars($producto['nombre']); ?>">
            </div>
            <div class="input-group-from-admin">
                <label for="nombre">Marca:</label>
                <input type="text" id="marca" required value="<?php echo htmlspecialchars($producto['marca']); ?>">
            </div>
            <div class="input-group-from-admin">
                <label for="description">Descripción:</label>
                <textarea id="descripcion" rows="4" placeholder="Descripción del producto" value="<?php echo htmlspecialchars($producto['descripcion']); ?>"></textarea>></textarea>
            </div>
            <div class="input-group-from-admin">
                <label for="qty">Stock:</label>
                <input type="text" id="stock" placeholder="Stock" required pattern="[0-9]*" value="<?php echo htmlspecialchars($producto['cantidad']); ?>">>
            </div>
            <div class="input-group-from-admin">
                <label for="price">Precio:</label>
                <input type="number" id="precio" placeholder="Precio" required min="0.01" step="0.01" value="<?php echo htmlspecialchars($producto['precio']); ?>">>
            </div>
            <button type="submit" class="btn btn-primary btn-form">Guardar</button>
            <div>
                <button type="button" class="btn btn-secondary mt-2 btn-form" id="volverBtn">Volver</button>
            </div>
        </form>
    </div>

</body>
<script src="../../../static/js/prodcutos.js"></script>

</html>