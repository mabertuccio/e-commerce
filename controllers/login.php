<?php
include 'bbdd.php';
session_start();
$error_message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["email"]) && isset($_POST["password"])) {
        $useremail = $_POST["email"];
        $password = $_POST["password"];
        $stmt = $conn->prepare("SELECT email, password, tipo_usuario FROM usuarios WHERE email = ?");
        $stmt->execute([$useremail]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            if (password_verify($password, $user['password'])) {
                if ($user['tipo_usuario'] == 'Cliente') {
                    session_start();
                    $_SESSION["usuario"] = $user['email'];
                    $_SESSION['authenticated'] = true;
                    $_SESSION['tipo_usuario'] = $user['tipo_usuario']; // Se agrega esta línea de código para guardar el tipo de usuario en la session.
                    header("Location: ../index.php");
                    exit; // Salir del script después de la redirección
                } elseif ($user['tipo_usuario'] == 'Vendedor') {
                    session_start();
                    $_SESSION["usuario"] = $user['email'];
                    $_SESSION['authenticated'] = true;
                    $_SESSION['tipo_usuario'] = $user['tipo_usuario']; // Se agrega esta línea de código para guardar el tipo de usuario en la session.
                    header("Location: ../pages/admin/usuarios.php");
                    exit; // Salir del script después de la redirección
                }
            } else {
                $_SESSION['mensaje_error_login'] = "Credenciales inválidas";
                header("Location: ../pages/login.php");
            }
        } else {
            $_SESSION['mensaje_error_login'] = "Usuario no registrado";
            header("Location: ../pages/login.php");
        }
    }
}
