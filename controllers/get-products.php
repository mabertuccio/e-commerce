<?php
// Obtengo los IDs del carrito de la session
$carrito = $_SESSION["carrito"];

// Verifica si el carrito está vacío
if (empty($carrito)) {
    echo "Carrito vacío.";
} else {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "electroshop";

    // Crea la conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Crea un array para almacenar los productos
    $products = array();

    // Consulta la base de datos para obtener los productos según su ID
    foreach ($carrito as $producto) {
        $id = $producto["id"];
        $sql = "SELECT id, nombre, precio, cantidad FROM productos WHERE id = $id";
        $result = $conn->query($sql);

        // Verifica si se encontraron resultados
        if ($result->num_rows > 0) {
            // Obtiene los datos del producto y los agrega al array de productos
            while ($row = $result->fetch_assoc()) {
                $products[] = array(
                    "id" => $row["id"],
                    "nombre" => $row["nombre"],
                    "precio" => $row["precio"],
                    "cantidad" => $row["cantidad"]
                );
            }
        } else {
            echo "No se encontraron productos con el ID: $id";
        }
    }
}

$conn->close();
?>