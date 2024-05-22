<?php
include '../bbdd.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
    $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : null;

    // Verificar que los datos no estén vacíos
    if ($id && $nombre && $direccion) {
        try {
            // Actualizar los datos del proveedor en la base de datos
            $stmt = $conn->prepare("UPDATE proveedores SET nombre = :nombre, direccion = :direccion WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':direccion', $direccion);
            $stmt->execute();

            echo "Proveedor actualizado correctamente.";
        } catch (PDOException $e) {
            echo "Error al actualizar el proveedor: " . $e->getMessage();
        }
    } else {
        echo "Por favor, complete todos los campos.";
    }
} else {
    echo "Acceso no autorizado.";
}
