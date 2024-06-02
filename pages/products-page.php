<?php
session_start();
$variable = $_SESSION["galletita"];
$carro = $_SESSION["carrito"];
echo $carro;
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
    <header>
        <!-- Navbar search -->
        <div class="navbar-search">
            <div class="navbar-search-empty">
                <!-- Relleno para estructurar -->
            </div>
            <div class="logo">
                <img src="../static/images/imgHome/logo electro shop.png" alt="logo de la tienda">
            </div>
            <div class="login-register-container">
                <span id="nombreUsuario"></span>
                <a class="shopping-cart-button" id="shopButton" href="../pages/shopping-cart.php">
                    <span class="material-symbols-outlined">
                        shopping_cart
                    </span>
                </a>
                <a class="logout-button" id="logoutButton" href="../controllers/logout.php">
                    <span class="material-symbols-outlined">
                        logout
                    </span>
                </a>
                <a class="login-button" id="loginButton" href="../pages/login.html">
                    INICIAR SESIÓN
                </a>
            </div>
        </div>
        <!-- Navbar sections -->
        <div class="navbar-sections">
            <nav>
                <ul>
                    <li><a href="../index.php">INICIO</a></li>
                    <li><a href="">PRODUCTOS</a></li>
                    <li><a href="../pages/nosotros.html">NOSOTROS</a></li>
                    <li><a href="../pages/contactoForm.html">CONTACTO</a></li>
                </ul>
            </nav>
        </div>
    </header>

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


    <!-- Footer -->
    <footer>
        <div class="section-footer-1">
            <h2>ATENCIÓN PRESENCIAL:</h2>
            <h2>LUNES A SÁBADOS</h2>
            <h2>09:00 a 18:00 HS</h2>
        </div>
        <div class="section-footer-2">
            <h2>SEGUINOS EN NUESTRAS REDES</h2>
            <div class="redes-sociales">
                <a href="http://www.instagram.com/" target="_blank"><img src="../static/images/imgHome/instagram-logo.svg" alt="logo de Instagram"></a>
                <a href="https://www.facebook.com/" target="_blank"><img src="../static/images/imgHome/facebook-logo.svg" alt="logo de Facebook"></a>
                <a href="https://web.whatsapp.com/" target="_blank"><img src="../static/images/imgHome/whatsapp-logo.svg" alt="logo de Whatsapp"></a>
            </div>
            <a href="./pages/contactoForm.html">
                <h2 class="contact-footer">CONTACTO</h2>
            </a>
        </div>
        <div class="section-footer-3">
            <h2>NUESTRO LOCAL</h2>
            <h2>Av. Alpes Suizos 883, CABA.</h2>
            <h2>+54 9 11 2933-2342</h2>
        </div>
        <footer>
            <script>
                // Funcion que formatea el correo del usuario partiendolo en el "@" y devolviendo la parte que no es el dominio.
                function formatearNombreUsuario(correo) {
                    var partes = correo.split("@");
                    return partes[0];
                }

                function ocultarBotones(listaDeBotones) {
                    listaDeBotones.forEach(element => {
                        element.style.display = 'none';
                    });
                }

                // Función para cargar dinámicamente el nombre de usuario
                function cargarNombreUsuario() {
                    // Realizar una petición al servidor para verificar la sesión
                    fetch('../controllers/check_session.php')
                        .then(response => response.json())
                        .then(data => {
                            // Verificar si el usuario está autenticado
                            console.log(data)
                            if (data.authenticated) {
                                // Si el usuario está autenticado, mostrar su nombre de usuario
                                document.getElementById('nombreUsuario').innerHTML = formatearNombreUsuario(data.usuario);
                                document.getElementById('loginButton').style.display = 'none';
                                ocultarBotones(document.querySelectorAll('#loginButton'));
                            } else {
                                // Si el usuario no está autenticado, mostrar un mensaje predeterminado
                                document.getElementById('logoutButton').style.display = 'none';
                                document.getElementById('shopButton').style.display = 'none';
                                ocultarBotones(document.querySelectorAll('#addProdButton'));
                            }
                        });
                }

                // Llamar a la función al cargar la página
                window.onload = cargarNombreUsuario;
            </script>
</body>

</html>