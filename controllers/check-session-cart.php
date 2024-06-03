<?php
session_start();

function isAuthenticated()
{
    // La función se encarga de retornar un Boolean (True/False) dependiendo si existe la sesión.
    return isset($_SESSION["usuario"]) && !empty($_SESSION["usuario"]);
}

function redirectTo($url)
{
    // La función se encarga de redireccionar la página tomando de parámetro la dirección.
    header("Location: $url");
    exit();
}

function isUserType()
{
    // La función se encarga de retornar un Boolean (True/False) dependiendo si la sesión tiene un tipo de usuario.
    return isset($_SESSION["tipo_usuario"]) && !empty($_SESSION["tipo_usuario"]);
}

if (isAuthenticated()) {
    // La sesión se establece y el usuario es autenticado.
    echo "<h1>Tipo usuario</h1>";
    $user = $_SESSION["usuario"];

    // Redirige según el tipo de usuario.
    if (isUserType()) {
        switch ($_SESSION["tipo_usuario"]) {
            case "Cliente":
                break;
            case "Vendedor":
                redirectTo("https://localhost/e-commerce/pages/admin/usuarios.php");
            default:
                redirectTo("https://localhost/e-commerce/pages/login.php");
        }
    } else {
        // Si el tipo de usuario no llegase a estar definido en la sesión, se maneja el error.
        echo "Error: Tipo de usuario no definido en la sesión";
    }
} else {
    // Si la sesión no llegase a estar definida y/o el usuario no autenticado, se maneja el error.
    echo "Error: Usuario no autenticado";
    header("Location: ../index.php");
    //redirectTo("https://localhost/e-commerce/index.php");
}
