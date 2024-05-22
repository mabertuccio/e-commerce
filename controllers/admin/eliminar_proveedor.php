<?php
include '../bbdd.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener el ID del usuario desde los datos POST
    $id = isset($_POST['id']) ? $_POST['id'] : null;

    // Verificar que el ID no esté vacío
    if ($id !== null) {
        try {
            // Preparar la consulta SQL para eliminar el usuario
            $sql = "DELETE FROM proveedores WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);

            // Ejecutar la consulta y comprobar si fue exitosa
            if ($stmt->execute()) {
                echo 'success';
            } else {
                echo 'error';
            }
        } catch (PDOException $e) {
            // Manejar errores de PDO
            echo 'Error al ejecutar la consulta: ' . $e->getMessage();
        }
    } else {
        echo 'ID de proveedor no válido';
    }
} else {
    echo 'error';
}
