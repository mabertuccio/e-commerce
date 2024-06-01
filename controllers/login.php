<?php
include 'bbdd.php';

$error_message = ""; // Inicializar la variable de mensaje de error

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se enviaron los campos del formulario
    if (isset($_POST["email"]) && isset($_POST["password"])) {
        $useremail = $_POST["email"];
        $password = $_POST["password"];

        $stmt = $conn->prepare("SELECT email, password, tipo_usuario FROM usuarios WHERE email = ?");
        $stmt->execute([$useremail]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Verificar la contraseña
            if ($password == $user['password']) {
                if ($user['tipo_usuario'] == 'Cliente') {
                    session_start();
                    $_SESSION["usuario"] = $user['email'];
                    $_SESSION['authenticated'] = true;
                    $_SESSION['tipo_usuario'] = $user['tipo_usuario']; // Se agrega esta línea de código para guardar el tipo de usuario en la session.
                    header("Location: ../index.html");
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
                // Contraseña incorrecta
                $error_message = "Credenciales inválidas";
            }
        } else {
            // Usuario no encontrado
            $error_message = "Usuario no encontrado";
        }
    } else {
        // Campos del formulario no recibidos
        $error_message = "Todos los campos son obligatorios";
    }
}

// Si hay un mensaje de error, simplemente imprímelo en la página actual
if (!empty($error_message)) {
    echo "<div class='alerta-error'>$error_message</div>";
}
