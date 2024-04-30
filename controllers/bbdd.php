<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "electroshop";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // Habilitar el manejo de errores PDO
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Si hay un error en la conexión, mostrar un mensaje y detener la ejecución del script
    echo 'Error de conexión: ' . $e->getMessage();
    exit;
}
