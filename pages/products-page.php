<?php
session_start();
include '../controllers/create-product-target.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ELECTRO SHOP</title>
    <link rel="icon" href="">
    <link rel="stylesheet" type="text/css" href="../static/styles/stylesHome.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap');
    </style>
</head>

<body>
    <?php include '../pages/navBar.php'; ?>

    <!-- Productos más vendidos -->

    <?php

    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = array();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_to_cart'])) {
        // Verificar si la sesión 'carrito' ya existe
        if (!isset($_SESSION['carrito'])) {
            // Si no existe, inicializarla como un array vacío
            $_SESSION['carrito'] = array();
        }
        // Agregar la ID y cantidad del producto al carrito
        $_SESSION['carrito'][] = array(
            'id' => $_POST['product_id'],
            'cantidad' => 1
        );
        header("Location: ./products-page.php");
    }

    echo "<h2>Productos en el carrito:</h2>";
    if (!empty($_SESSION['carrito'])) {
        foreach ($_SESSION['carrito'] as $producto) {
            echo "<p>El ID es: " . $producto['id'] . "</p>";
            echo "<p>La cantidad es: " . $producto['cantidad'] . "</p>";
            echo "<hr>";
        }
    } else {
        echo "<p>No hay productos en el carrito.</p>";
    }

    ?>

    <section class="container-products">
        <h2 class="text-most-sold">NUESTROS PRODUCTOS</h2>
        <div class="container-products-cards">
            <?php crearTarjetasProductos("SELECT * FROM productos", $conn, "login.php") ?>
        </div>
    </section>


    <!-- Slider Sponsors -->
    <section class="container-slider-sponsor">
        <div class="slide-track">
            <div class="slide-item">
                <img src="../static/images/imgHome/AMD-logo.png" alt="">
            </div>
            <div class="slide-item">
                <img src="../static/images/imgHome/LENOVO-logo.png" alt="">
            </div>
            <div class="slide-item">
                <img src="../static/images/imgHome/NVIDIA-logo.png" alt="">
            </div>
            <div class="slide-item">
                <img src="../static/images/imgHome/PHILIPS-logo.png" alt="">
            </div>
            <div class="slide-item">
                <img src="../static/images/imgHome/SAMSUNG-logo.png" alt="">
            </div>
            <div class="slide-item">
                <img src="../static/images/imgHome/SONY-logo.png" alt="">
            </div>
            <div class="slide-item">
                <img src="../static/images/imgHome/WD-logo.png" alt="">
            </div>
            <div class="slide-item">
                <img src="../static/images/imgHome/AMD-logo.png" alt="">
            </div>
            <div class="slide-item">
                <img src="../static/images/imgHome/ASUS-logo.png" alt="">
            </div>
            <div class="slide-item">
                <img src="../static/images/imgHome/NVIDIA-logo.png" alt="">
            </div>
            <div class="slide-item">
                <img src="../static/images/imgHome/PHILIPS-logo.png" alt="">
            </div>
            <div class="slide-item">
                <img src="../static/images/imgHome/SAMSUNG-logo.png" alt="">
            </div>
            <div class="slide-item">
                <img src="../static/images/imgHome/SONY-logo.png" alt="">
            </div>
            <div class="slide-item">
                <img src="../static/images/imgHome/WD-logo.png" alt="">
            </div>
        </div>
    </section>


    <?php include '../pages/footer.php'; ?>

    <script src="../static/js/scriptNavBar.js"></script>
</body>

</html>