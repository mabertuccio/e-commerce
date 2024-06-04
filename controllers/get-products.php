<?php
include 'bbdd.php';
$carrito = isset($_COOKIE['carrito']) ? json_decode($_COOKIE['carrito'], true) : array();
// Consulta la base de datos para obtener los productos según su ID
foreach ($carrito as $producto) {
    $id = $producto["id"];
    $sql = "SELECT id, nombre, precio, cantidad FROM productos WHERE id = $id";
    $result = $conn->query($sql);

    // Verifica si se encontraron resultados
    if ($result->rowCount() > 0) {
        // Obtiene los datos del producto y los agrega al array de productos
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $products[] = array(
                "id" => $row["id"],
                "nombre" => $row["nombre"],
                "precio" => $row["precio"],
                "cantidad" => $producto["cantidad"],
                "max_cantidad" => $row["cantidad"],
            );
        }
    } else {
        echo "No se encontraron productos con el ID: $id";
    }
}
