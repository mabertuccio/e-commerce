<?php
include '../bbdd.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
    $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : null;
    $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : 0;
    $precio = isset($_POST['precio']) ? $_POST['precio'] : 0;
    $id_proveedor = isset($_POST['proveedor']) ? $_POST['proveedor'] : 1;

    if ($nombre && $cantidad && $precio) {
        try {
            // Actualizar los datos del proveedor en la base de datos
            $stmt = $conn->prepare("UPDATE productos  SET nombre = :nombre, descripcion=:descripcion, cantidad=:cantidad, precio=:precio,id_proveedor=:id_proveedor WHERE id = :id");
            $stmt = $conn->prepare("UPDATE productos SET nombre = :nombre, descripcion = :descripcion, cantidad = :cantidad, precio = :precio, id_proveedor = :id_proveedor WHERE id = :id");
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':descripcion', $descripcion);
            $stmt->bindParam(':cantidad', $cantidad);
            $stmt->bindParam(':precio', $precio);
            $stmt->bindParam(':id_proveedor', $id_proveedor);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            header("Location: ../../pages/admin/productos.php");
        } catch (PDOException $e) {
            echo "Error al crear el producto: " . $e->getMessage();
        }
    } else {
        echo "Por favor, complete todos los campos obligatorios.";
    }
} else {
    echo "Acceso no autorizado.";
}
