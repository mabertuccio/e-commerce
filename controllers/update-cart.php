<?php
session_start();

function obtenerCarrito()
{
    return isset($_COOKIE['carrito']) ? json_decode($_COOKIE['carrito'], true) : array();
}

function guardarCarrito($carrito)
{
    setcookie('carrito', json_encode($carrito), time() + (86400 * 30), "/"); // 86400 = 1 día
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_id']) && isset($_POST['quantity'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // Obtener el carrito actual
    $carrito = obtenerCarrito();

    // Actualizar la cantidad del producto en el carrito
    $productoEncontrado = false;
    foreach ($carrito as &$producto) {
        if ($producto['id'] == $product_id) {
            $producto['cantidad'] = $quantity;
            $productoEncontrado = true;
            break;
        }
    }

    // Si el producto no está en el carrito, agregarlo
    if (!$productoEncontrado) {
        $carrito[] = array('id' => $product_id, 'cantidad' => $quantity);
    }

    // Guardar el carrito actualizado en la cookie
    guardarCarrito($carrito);

    // Devolver una respuesta exitosa
    echo 'Carrito actualizado';
}
?>