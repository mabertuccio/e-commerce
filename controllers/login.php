<?php
echo "<h1>Paso</h1>";
session_start();
$_SESSION["username"] = "test";
header("Location: ../pages/admin/admin/usuarios.php");
exit;
// Verificar si se enviaron los datos del formulario
/* if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Verificar si se enviaron los campos de usuario y contraseña
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        // Aquí deberías verificar los datos de inicio de sesión en tu base de datos
        // Por ejemplo, podrías usar una consulta SQL para buscar el usuario en la base de datos

        // Ejemplo básico de verificación (solo para propósitos de demostración)
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Verificar si el usuario y la contraseña coinciden (en un entorno de producción, esto debe ser más seguro)
        if ($username === "usuario" && $password === "contraseña") {
            // Iniciar sesión (aquí podrías establecer variables de sesión, por ejemplo)
            session_start();
            $_SESSION["username"] = $username;

            // Redireccionar a la página de inicio o a otra página después del inicio de sesión
            header("Location: welcome.php");
            exit;
        } else {
            // Si el usuario y la contraseña no coinciden, mostrar un mensaje de error
            echo "Usuario o contraseña incorrectos.";
        }
    } else {
        // Si no se enviaron los campos de usuario y contraseña, mostrar un mensaje de error
        echo "Por favor, complete todos los campos.";
    }
}
 */