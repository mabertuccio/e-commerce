<?php
// Función para obtener el carrito desde la cookie
function obtenerCarrito()
{
    return isset($_COOKIE['carrito']) ? json_decode($_COOKIE['carrito'], true) : array();
}



// Función para guardar el carrito en la cookie
function guardarCarrito($carrito)
{
    setcookie('carrito', json_encode($carrito), time() + (86400 * 30), "/"); // 86400 = 1 día
}

// Función para eliminar un elemento del carrito según su ID
function eliminarElementoDelCarrito($carrito, $productId)
{
    foreach ($carrito as $key => &$producto) {
        if ($producto['id'] == $productId) {
            unset($carrito[$key]);
            break; // Salir del bucle después de eliminar el producto
        }
    }
    return array_values($carrito); // Reindexar el array
}

// Código principal


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    // Obtener el carrito actual
    $carrito = obtenerCarrito();


    // Eliminar el elemento del carrito
    $carrito = eliminarElementoDelCarrito($carrito, $product_id);


    // Guardar el carrito actualizado en la cookie
    guardarCarrito($carrito);

    // Redirigir de nuevo a la página del carrito de compras
    header("Location: ../pages/shopping-cart.php");
    exit();
}
