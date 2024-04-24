<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "usuario";
$password = "contraseña";
$database = "basedatos";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
} else {
    echo "Conexión exitosa";
}


$conn->close();
