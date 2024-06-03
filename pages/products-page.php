<?php
session_start();

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

    <section class="container-products">
        <h2 class="text-most-sold">NUESTROS PRODUCTOS</h2>
        <div class="container-products-cards">

            <?php
            include '../controllers/bbdd.php';

            $query = "SELECT * FROM productos";
            $stmt = $conn->prepare($query);
            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>

                <div class="product-card">
                    <div class="image-product-card">
                        <img src="">
                    </div>
                    <div class="product-info-container">
                        <h2 class="product-card-name">
                            <?= $row['nombre'] . " " . $row['descripcion'] ?>
                        </h2>
                        <div class="pr-sb-container">
                            <h3 class="product-card-price">
                                <?= $row['precio'] . "$" ?>
                            </h3>
                            <div class="product-card-shop-button">
                                <a href="#">
                                    <span class="material-symbols-outlined" id="addProdButton">
                                        add_shopping_cart
                                    </span>
                                </a>
                                <a href="./pages/login.html">
                                    <span class="material-symbols-outlined" id="loginButton">
                                        login
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endwhile; ?>
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