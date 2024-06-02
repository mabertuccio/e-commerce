<?php
include '../bbdd.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $password = isset($_POST['password']) ? $_POST['password'] : null;
    $tipo = isset($_POST['tipo_usuario']) ? $_POST['tipo_usuario'] : 'Cliente';

    if ($email && $password) {
        try {
            $stmt = $conn->prepare("SELECT id FROM usuarios WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $existingUser = $stmt->fetch();

            if ($existingUser) {
                echo "El correo electrónico ya está registrado.";
            } else {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
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
