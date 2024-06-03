<?php
// Iniciar la sesión si no está iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Array de objetos en el carrito
$carrito = array(
    array("id" => 1, "cantidad" => 1),
    array("id" => 2, "cantidad" => 1),
);

// Guardar el carrito en la sesión
$_SESSION["carrito"] = $carrito;

// Mostrar mensaje de éxito
echo "El carrito se ha guardado en la sesión.";

// Para acceder al carrito en otra parte del código, simplemente usa $_SESSION["carrito"]
?>