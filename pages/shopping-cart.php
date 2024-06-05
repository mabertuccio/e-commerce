<?php
include ("../controllers/check-session-cart.php");
include ("../controllers/get-products.php");

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
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="../static/styles/main.css" />
    <link rel="stylesheet" href="../static/styles/table.css" />
    <link rel="stylesheet" href="../static/styles/validations.css">
    <link rel="stylesheet" href="../static/styles/danger-validation.css">
    <link rel="stylesheet" href="../static/styles/summary.css" />
    <link rel="stylesheet" href="../static/styles/checkout-modal.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" type="text/css" href="../static/styles/stylesHome.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap');
    </style>
</head>

<body>
    <?php include '../pages/navBar.php'; ?>
    <main>
        <div class="container">
            <div class="left-panel">
                <h2 style="padding:10px;">Carrito de Compras</h2>
                <div class="shopping-cart">
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Nombre</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            /*
                        ------------------
                        28/05/2024 - 16:00
                        ------------------
                        El código siguente se encarga de guardar por el momento los productos ficticios agregados.
                        A su vez, hará uso de una función externa que es llamada para mostrarlos en la tabla.
                        ------------------
                        */
                            include "products.php";


                            // Verifica si hay productos en el carrito
                            if (!empty($products)) {
                                foreach ($products as $product) {

                                    echo generateProduct($product["nombre"], $product["precio"], $product["cantidad"], $product["id"], $product['max_cantidad']);
                                }
                            } else {
                                echo "<tr><td colspan='5'>Carrito vacío.</td></tr>";
                            }
                            ?>
                        </tbody>

                    </table>
                </div>

            </div>
            <div class="right-panel">
                <h2 style="padding:10px;">Sumario</h2>
                <div class="pricing">
                    <h3 style="padding:0 0 10px 0;">Precios</h3>
                    <div class="summary-row">
                        <span>Subtotal</span>
                        <span id="subtotal">
                            <span>
                                <?php
                                /*
                            ------------------
                            28/05/2024 - 16:17
                            ------------------
                            Se encarga de calcular y mostrar la suma de los precios de los productos.
                            ------------------
                            */
                                $subtotal = array_sum($precios);
                                echo "$$subtotal";
                                ?>
                            </span>
                        </span>
                    </div>
                    <div class="summary-row">
                        <span>Envío</span>
                        <span id="shipping">
                            <span>
                                <?php
                                /*
                            ------------------
                            28/05/2024 - 16:18
                            ------------------
                            Se encarga de declarar y mostrar el precio del envio.
                            ------------------
                            */
                                $envio = 10;
                                echo "$$envio";
                                ?>
                            </span>
                        </span>
                    </div>
                    <div class="summary-row">
                        <span>Impuestos</span>
                        <span id="tax">
                            <span>
                                <?php
                                /*
                            ------------------
                            28/05/2024 - 16:19
                            ------------------
                            Se encarga de calcular y mostrar el impuesto.
                            Se asume que el impuesto es del 21% sobre el total de los productos a comprar.
                            ------------------
                            */
                                $impuesto = $subtotal * 0.21;
                                echo "$$impuesto";
                                ?>
                            </span>
                        </span>
                    </div>
                    <div class="summary-row">
                        <span>Total General</span>
                        <span id="grand-total">
                            <span>
                                <?php
                                /*
                            ------------------
                            28/05/2024 - 16:20
                            ------------------
                            Se encarga de calcular y mostrar el precio final de la compra de productos.
                            ------------------
                            */
                                $total = $subtotal + $impuesto + $envio;
                                echo "$$total";
                                ?>
                            </span>
                        </span>
                    </div>

                    <hr class="divider">
                    <form action="">
                        <h3 style="padding:10px 0 10px 0;">Información de la Tarjeta</h3>
                        <div>
                            <label for="name">Nombre:</label>
                            <div class="input-container">
                                <input type="text" name="name" id="name" placeholder="Nombre" required />
                            </div>
                            <span class="danger-validation" id="validacion-nombre">
                                <p>Error en el nombre</p>
                            </span>
                        </div>
                        <div>
                            <label for="dni">DNI:</label>
                            <div class="input-container">
                                <input type="text" name="dni" id="dni" placeholder="XXXXXXXX" required />
                            </div>
                            <span class="danger-validation" id="validacion-dni" style="display:none; color:red;">
                                <p>Error en el DNI</p>
                            </span>
                        </div>
                        <div>
                            <label for="card-number" id="card-label">N° de Tarjeta:</label>
                            <div class="input-container">
                                <input type="text" name="card-number" id="card-number" placeholder="XXXX-XXXX-XXXX-XXXX"
                                    required />
                            </div>
                            <span class="danger-validation" id="validacion-tarjeta" style="display:none; color:red;">
                                <p>Error en la tarjeta</p>
                            </span>
                        </div>
                        <div>
                            <label for="expiration-date" id="expiration-label">Fecha de Vencimiento:</label>
                            <div class="input-container">
                                <input type="text" name="expiration-date" id="expiration-date" placeholder="MM/YY"
                                    required />
                            </div>
                            <span class="danger-validation" id="validacion-fecha" style="display:none; color:red;">
                                <p>Error en la fecha</p>
                            </span>
                        </div>
                        <div>
                            <label for="cvv" id="cvv-label">CVV:</label>
                            <div class="input-container">
                                <input type="text" id="cvv" name="cvv" placeholder="XXX" required />
                            </div>
                            <span class="danger-validation" id="validacion-cvv" style="display:none; color:red;">
                                <p>Error en el CVV</p>
                            </span>
                        </div>
                        <hr class="divider">
                        <div id="confirm-modal" class="modal">
                            <div class="modal-content">
                                <span class="close">&times;</span>
                                <p>¿Está seguro que quiere confirmar la compra?</p>
                                <button id="confirm-yes">Sí</button>
                                <button id="confirm-no">No</button>
                            </div>
                        </div>
                        <span class="danger-validation" id="checkout-validation" style="display:none; color:red;">
                            <p>Complete los campos para confirmar la compra</p>
                        </span>
                        <button id="checkout-button">Comprar</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <?php include '../pages/footer.php'; ?>

    <script src="../static/js/scriptNavBar.js"></script>

    <script src="../static/js/credit-card-validation.js"></script>
    <script src="../static/js/expiration-date-validation.js"></script>
    <script src="../static/js/cvv-validation.js"></script>
    <script src="../static/js/name-validation.js"></script>
    <script src="../static/js/dni-validation.js"></script>
    <script src="../static/js/remove-product.js"></script>
    <script src="../static/js/checkout-handler.js"></script>
    <script src="../static/js/increment-quantity.js"></script>
</body>

</html>