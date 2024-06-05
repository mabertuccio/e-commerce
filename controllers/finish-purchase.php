<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "electroshop";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // Habilita el manejo de errores PDO
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Si hay un error en la conexión, se muestra un mensaje y detiene la ejecución del script
    echo 'Error de conexión: ' . $e->getMessage();
    exit;
}

// Obtiene el nombre de usuario desde la sesión
$username = $_SESSION["usuario"];

// Obtiene el ID del usuario desde la base de datos usando el nombre de usuario
$sql_get_user_id = "SELECT id FROM usuarios WHERE email = ?";
$stmt_get_user_id = $conn->prepare($sql_get_user_id);
$stmt_get_user_id->bindParam(1, $username);
$stmt_get_user_id->execute();
$idUsuario = $stmt_get_user_id->fetchColumn();

if (!$idUsuario) {
    echo "Error: El usuario no existe.";
    exit;
}

// Obtiene los datos necesarios para el pago
$dni = $_POST["dni"];
$name = $_POST["name"];
$cardType = $_POST["card-type"];
$cardNumber = $_POST["card-number"];
$cardExpirationDate = $_POST["expiration-date"];

// Divide la fecha en mes y año
list($month, $year) = explode("/", $cardExpirationDate);

// Verifica si el año es menor que 100 y ajustarlo si es necesario
$fullYear = ($year < 100) ? "20" . $year : $year;

// Construye la fecha en formato YYYY-MM-DD (asumiendo que el día es siempre "01")
$formattedExpirationDate = $fullYear . "-" . $month . "-01";

// Obtiene el total del carrito desde POST
$grandTotal = $_POST["grand-total"]; // Suponiendo que el total del carrito se envía a través de POST

try {
    // Inicia una transacción
    $conn->beginTransaction();

    // Inserta los datos de pago en la tabla "pagos"
    $sql_insert_pago = "INSERT INTO pagos (tipo, numero_tarjeta, fecha_vencimiento, dni, nombre_en_tarjeta) VALUES (?, ?, ?, ?, ?)";
    $stmt_pago = $conn->prepare($sql_insert_pago);
    $stmt_pago->bindParam(1, $cardType);
    $stmt_pago->bindParam(2, $cardNumber);
    $stmt_pago->bindParam(3, $formattedExpirationDate);
    $stmt_pago->bindParam(4, $dni);
    $stmt_pago->bindParam(5, $name);
    $stmt_pago->execute();
    $id_pago = $conn->lastInsertId(); // Obtener el ID generado por la inserción
    $stmt_pago->closeCursor();

    // Inserta los datos de la factura en la tabla "facturas"
    $date = date("Y-m-d H:i:s");
    $sql_insert_factura = "INSERT INTO facturas (fecha, id_usuario, precio_total, id_pago) VALUES (?, ?, ?, ?)";
    $stmt_factura = $conn->prepare($sql_insert_factura);
    $stmt_factura->bindParam(1, $date);
    $stmt_factura->bindParam(2, $idUsuario);
    $stmt_factura->bindParam(3, $grandTotal);
    $stmt_factura->bindParam(4, $id_pago);
    $stmt_factura->execute();
    $id_factura = $conn->lastInsertId(); // Obtiene el ID generado por la inserción
    $stmt_factura->closeCursor();

    // Inserta los datos de los ítems de la factura en la tabla "items_factura"
    $carrito = json_decode($_COOKIE["carrito"], true);

    foreach ($carrito as $producto) {
        $id_producto = $producto["id"];
        $cantidad = $producto["cantidad"];
        $precio_unitario = getUnitaryPrice($id_producto, $conn);
        $sql_insert_items = "INSERT INTO items_factura (id_factura, id_producto, cantidad, precio_unitario) VALUES (?, ?, ?, ?)";
        $stmt_items = $conn->prepare($sql_insert_items);
        $stmt_items->bindParam(1, $id_factura);
        $stmt_items->bindParam(2, $id_producto);
        $stmt_items->bindParam(3, $cantidad);
        $stmt_items->bindParam(4, $precio_unitario);
        $stmt_items->execute();
        $stmt_items->closeCursor();
    }

    // Confirma la transacción
    $conn->commit();
    echo "Transacción completada exitosamente.";
    if (isset($_COOKIE['carrito'])) {
        unset($_COOKIE['carrito']);
        setcookie('carrito', '', time() - 3600, '/'); // Establece el tiempo de expiración en el pasado
    }
    header("Location: ../pages/shopping-cart.php");
    exit; // Detiene la ejecución del script después de la redirección
} catch (Exception $e) {
    // Revierte la transacción en caso de error
    $conn->rollback();
    echo "Error: " . $e->getMessage();
    exit; // Detiene la ejecución del script en caso de error
}

// Función para obtener el precio unitario de un producto desde la base de datos
function getUnitaryPrice($id_producto, $conn)
{
    $sql = "SELECT precio FROM productos WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $id_producto);
    $stmt->execute();
    $precio_unitario = $stmt->fetchColumn();
    return $precio_unitario;
}
?>