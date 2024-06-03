<?php
session_start();

$idProducto = $_POST["product_id"];

$carrito = $_SESSION["carrito"];

unset($carrito[$idProducto]);
$_SESSION["carrito"] = $carrito;

/*
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['product_id'])) {
        $productId = intval($_POST['product_id']);

        // Verifica si el carrito existe en la sesión
        if (isset($_SESSION['carrito'])) {
            foreach ($_SESSION['carrito'] as $key => $producto) {
                if ($producto['id'] == $productId) {
                    unset($_SESSION['carrito'][$key]);
                    $_SESSION['carrito'] = array_values($_SESSION['carrito']);
                    break;
                }
            }
        }
    }
}
*/

// Redirige de vuelta al carrito
header("Location: ../pages/shopping-cart.php");
exit();
