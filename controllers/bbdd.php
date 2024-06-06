<?php
// Datos de conexión a la base de datos
include 'primer-script.php';
$servername = "localhost";
$username = "root";
$password = "";
$database = "electroshop";

try {
    // Crear la conexión sin especificar la base de datos
    $conn = new PDO("mysql:host=$servername", $username, $password);
    // Habilitar el manejo de errores PDO
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verificar si la base de datos existe
    $stmt = $conn->query("SELECT COUNT(*) FROM information_schema.SCHEMATA WHERE SCHEMA_NAME = '$database'");
    $databaseExists = (bool) $stmt->fetchColumn();

    // Si la base de datos no existe, crearla
    if (!$databaseExists) {
        $conn->exec("CREATE DATABASE $database");
        $conn->exec("USE $database");
        crearTablas($conn);
        // Generar datos de prueba
        generarDatosPrueba($conn);

        // Crear el usuario administrador
        crearUsuarioAdmin($conn);
    }

    // Conectar a la base de datos especificada
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // Habilitar el manejo de errores PDO
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Si hay un error en la conexión, mostrar un mensaje
    echo 'Error de conexión: ' . $e->getMessage();
}
