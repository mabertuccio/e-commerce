<?php
// Incluir el archivo de conexión a la base de datos
include '../bbdd.php';

// Verificar si la solicitud es POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $tipo = isset($_POST['tipo_usuario']) ? $_POST['tipo_usuario'] : 'Cliente';

    // Verificar que los datos no estén vacíos
    if ($id && $email) {
        try {
            // Actualizar el usuario en la base de datos
            $stmt = $conn->prepare("UPDATE usuarios SET email = :email,  tipo_usuario = :tipo WHERE id = :id");
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':tipo', $tipo);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            header("Location: ../../pages/admin/usuarios.php");
        } catch (PDOException $e) {
            echo "Error al modificar el usuario: " . $e->getMessage();
        }
    } else {
        echo "Por favor, complete todos los campos.";
    }
} else {
    echo "Acceso no autorizado.";
}
