<?php

// Incluir el archivo de conexión a la base de datos
include '../bbdd.php';

// Verificar si la solicitud es POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
    $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : null;
    echo "<h1>$nombre asdsadas</h1>";
    echo $nombre;
    echo $direccion;
    // Verificar que los datos no estén vacíos
    if ($nombre && $direccion) {
        try {
            // Insertar el nuevo proveedor en la base de datos
            $stmt = $conn->prepare("INSERT INTO proveedores (nombre, direccion) VALUES (:nombre, :direccion)");
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':direccion', $direccion);
            $stmt->execute();
            header("Location: ../../pages/admin/proveedores.php");
        } catch (PDOException $e) {
            echo "Error al crear el proveedor: " . $e->getMessage();
        }
    } else {
        echo "Por favor, complete todos los campos.";
    }
} else {
    echo "Acceso no autorizado.";
}
