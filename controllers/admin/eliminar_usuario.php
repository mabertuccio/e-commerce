<?php
include '../bbdd.php';
// Verificar si la solicitud es POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener el ID del usuario desde los datos POST
    $id = isset($_POST['id']) ? $_POST['id'] : null;

    // Verificar que el ID no esté vacío
    if ($id !== null) {
        try {
            $stmt = $conn->prepare("UPDATE usuarios SET estado = 0 WHERE id = :id");
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);

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
        echo 'ID de usuario no válido';
    }
} else {
    echo 'error';
}
