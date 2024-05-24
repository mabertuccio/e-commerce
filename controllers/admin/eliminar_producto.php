<?php
include '../bbdd.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = isset($_POST['id']) ? $_POST['id'] : null;
    if ($id !== null) {
        try {
            $stmt = $conn->prepare("UPDATE productos SET estado = 0 WHERE id = :id");
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
        echo 'ID de producto no válido';
    }
} else {
    echo 'error';
}
