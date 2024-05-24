<?php
include '../../../controllers/bbdd.php';

// Obtener el ID del proveedor desde los parámetros GET
$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id) {
    // Recuperar los datos del proveedor desde la base de datos
    try {
        $stmt = $conn->prepare("SELECT * FROM proveedores WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $proveedor = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error al recuperar los datos del proveedor: " . $e->getMessage();
    }
} else {
    echo "ID de proveedor no proporcionado.";
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
        <form id="modificarProveedorForm" action="../../../controllers/admin/modificar_proveedor.php" method="post">
            <h2>Modificar Proveedor</h2>
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
            <div class="input-group-from-admin">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required value="<?php echo htmlspecialchars($proveedor['nombre']); ?>">
            </div>
            <div class="input-group-from-admin">
                <label for="direccion">Dirección:</label>
                <input type="text" id="direccion" name="direccion" required value="<?php echo htmlspecialchars($proveedor['direccion']); ?>">
            </div>
            <button type="submit" class="btn btn-primary btn-form">Guardar</button>
            <div>
                <button type="button" class="btn btn-secondary mt-2 btn-form" id="volverBtn">Volver</button>
            </div>
        </form>
    </div>
    <script src="../../../static/js/proveedores.js"></script>
</body>

</html>