<?php
session_start();
include './controllers/create-product-target.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_to_cart'])) {
    // Obtener la cantidad disponible en la base de datos para el producto
    $sql = "SELECT cantidad FROM productos WHERE id = :id AND estado = 1";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $_POST['product_id']);
    $stmt->execute();
    $cantidad_disponible = $stmt->fetchColumn();

    // Verificar si la cantidad disponible es mayor que cero y si es así, continuar con el proceso de agregar al carrito
    if ($cantidad_disponible > 0) {
        // Verificar si el producto ya está en el carrito
        $product_id = $_POST['product_id'];
        $product_found = false;

        // Verificar si la cookie 'carrito' ya existe
        if (isset($_COOKIE['carrito'])) {
            // Decodificar la cookie del carrito en un array
            $carrito = json_decode($_COOKIE['carrito'], true);

            // Verificar si el producto ya está en el carrito
            foreach ($carrito as &$item) {
                if ($item['id'] == $product_id) {
                    // Incrementar la cantidad solo si no excede la cantidad disponible en la base de datos
                    if (($item['cantidad'] + 1) <= $cantidad_disponible) {
                        $item['cantidad'] += 1;
                    }
                    $product_found = true;
                    break;
                }
            }

            // Si el producto no está en el carrito y la cantidad disponible es mayor que cero, agregarlo
            if (!$product_found) {
                $carrito[] = array(
                    'id' => $product_id,
                    'cantidad' => 1
                );
            }
        } else {
            // Si la cookie no existe, inicializar el carrito con el producto
            $carrito = array(
                array(
                    'id' => $product_id,
                    'cantidad' => 1
                )
            );
        }

        // Codificar el carrito de nuevo a JSON y guardarlo en la cookie
        setcookie('carrito', json_encode($carrito), time() + (86400 * 30), "/"); // 86400 = 1 día
    }

    // Redireccionar de nuevo a la página de origen
    header("Location: index.php");
    exit();
}

// Decodificar la cookie del carrito
$carrito = isset($_COOKIE['carrito']) ? json_decode($_COOKIE['carrito'], true) : array();

echo "<h2>Productos en el carrito:</h2>";

if (!empty($carrito)) {
    foreach ($carrito as $producto) {
        echo "<p>El ID es: " . htmlspecialchars($producto['id']) . "</p>";
        echo "<p>La cantidad es: " . htmlspecialchars($producto['cantidad']) . "</p>";
        echo "<hr>";
    }
} else {
    echo "<p>No hay productos en el carrito.</p>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ELECTRO SHOP</title>
    <link rel="icon" href="">
    <link rel="stylesheet" type="text/css" href="./static/styles/stylesHome.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap');
    </style>
</head>

<body>
    <?php include './pages/navbar-index.php'; ?>
    <!-- Slider -->
    <section class="container-slider">
        <div class="slide">
            <ul>
                <li><img src="./static/images/imgHome/164.jpg" alt=""></li>
                <li><img src="./static/images/imgHome/162.jpg" alt=""></li>
                <li><img src="./static/images/imgHome/166.jpg" alt=""></li>
                <li><img src="./static/images/imgHome/165.jpg" alt=""></li>
            </ul>
        </div>
    </section>

    <!-- Productos más vendidos -->


    <!-- Imprimir la sesión 'carrito' para confirmar que se ha guardado -->

    <section class="container-products">
        <h2 class="text-most-sold">PRODUCTOS DESTACADOS</h2>
        <div class="container-products-cards">
            <?php crearTarjetasProductos("SELECT * FROM productos ORDER BY cantidad LIMIT 4", $conn, "pages\login.php") ?>
        </div>
    </section>


    <?php include './pages/slider-index.php'; ?>

    <?php include './pages/footer-index.php'; ?>

    <script src="./static/js/scriptIndex.js"></script>
</body>

</html>