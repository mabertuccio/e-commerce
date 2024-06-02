<?php
include ("../controllers/check-session-cart.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="../static/styles/main.css" />
    <link rel="stylesheet" href="../static/styles/table.css" />
    <link rel="stylesheet" href="../static/styles/summary.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet" />
</head>

<body>
    <div class="container">
        <div class="left-panel">
            <h2>Shopping Cart</h2>
            <div class="shopping-cart">
                <table class="table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
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

                        $products = [
                            ["name" => "Product 1", "price" => 10.00],
                            ["name" => "Product 2", "price" => 10.50],
                            ["name" => "Product 3", "price" => 11.00],
                            ["name" => "Product 4", "price" => 11.50]
                        ];

                        foreach ($products as $product) {
                            echo generateProduct($product["name"], $product["price"]);
                        }
                        ?>
                    </tbody>

                </table>
            </div>

        </div>
        <div class="right-panel">
            <h2>Summary</h2>
            <div class="pricing">
                <h3>Pricing</h3>
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
                    <span>Shipping</span>
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
                    <span>Tax</span>
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
                    <span>Grand Total</span>
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

                <hr>
                <form action="">
                    <h3>Card Information</h3>
                    <div>
                        <label for="card-number">Card Number:</label>
                        <div class="input-container">
                            <input type="text" name="card-number" placeholder="XXXX-XXXX-XXXX-XXXX" />
                        </div>
                    </div>
                    <div>
                        <label for="expiration-date">Expiration Date:</label>
                        <div class="input-container">
                            <input type="text" name="expiration-date" placeholder="MM/YY" />
                        </div>
                    </div>
                    <div>
                        <label for="">CVV:</label>
                        <div class="input-container">
                            <input type="text" name="cvv" placeholder="XXX" />
                        </div>
                    </div>
                    <hr>
                    <button id="checkout-button">Checkout</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>