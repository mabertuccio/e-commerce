<?php
// Incluir el archivo de conexión a la base de datos
include '../bbdd.php';

// Verificar si la solicitud es POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $password = isset($_POST['password']) ? $_POST['password'] : null;
    $tipo = isset($_POST['tipo_usuario']) ? $_POST['tipo_usuario'] : 'Cliente';

    // Verificar que los datos no estén vacíos
    if ($email && $password) {
        try {
            // Verificar si el correo electrónico ya está registrado
            $stmt = $conn->prepare("SELECT id FROM usuarios WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $existingUser = $stmt->fetch();

            if ($existingUser) {
                echo "El correo electrónico ya está registrado.";
            } else {
                // Hash de la contraseña
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // Insertar el nuevo usuario en la base de datos
                $stmt = $conn->prepare("INSERT INTO usuarios (email, password, tipo_usuario) VALUES (:email, :password, :tipo_usuario)");
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $hashedPassword);
                $stmt->bindParam(':tipo_usuario', $tipo);
                $stmt->execute();

                header("Location: ../../pages/admin/usuarios.php");
            }
        } catch (PDOException $e) {
            echo "Error al crear el usuario: " . $e->getMessage();
        }
    } else {
        echo "Por favor, complete todos los campos.";
    }
} else {
    echo "Acceso no autorizado.";
}
