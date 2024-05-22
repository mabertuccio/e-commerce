<?php
// Incluir el archivo de conexión a la base de datos
include '../bbdd.php';

// Verificar si la solicitud es POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $name = isset($_POST['name']) ? $_POST['name'] : null;
    $tradeMark = isset($_POST['tradeMark']) ? $_POST['tradeMark'] : null;
    $description = isset($_POST['description']) ? $_POST['description'] : null;
    $qty = isset($_POST['qty']) ? $_POST['qty'] : null;
    $price = isset($_POST['price']) ? $_POST['price'] : null;

    // Verificar que los datos no estén vacíos
    if ($name && $tradeMark && $qty && $price) {
        try {
            // Insertar el nuevo producto en la base de datos
            $stmt = $conn->prepare("INSERT INTO productos (nombre, marca, descripcion, stock, precio) VALUES (:nombre, :marca, :descripcion, :stock, :precio)");
            $stmt->bindParam(':nombre', $name);
            $stmt->bindParam(':marca', $tradeMark);
            $stmt->bindParam(':descripcion', $description);
            $stmt->bindParam(':stock', $qty);
            $stmt->bindParam(':precio', $price);
            $stmt->execute();

            echo "Producto creado correctamente.";
        } catch (PDOException $e) {
            echo "Error al crear el producto: " . $e->getMessage();
        }
    } else {
        echo "Por favor, complete todos los campos obligatorios.";
    }
} else {
    echo "Acceso no autorizado.";
}
