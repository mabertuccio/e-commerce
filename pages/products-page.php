<?php
session_start();
include '../controllers/create-product-target.php';
$classSuccess = '';
$classError = '';
if (isset($_SESSION['modalSuccess'])) {
    $classSuccess = $_SESSION['modalSuccess'];
    unset($_SESSION['modalSuccess']);
}
if (isset($_SESSION['modalError'])) {
    $classError = $_SESSION['modalError'];
    unset($_SESSION['modalError']);
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_to_cart'])) {
    // Obtener la cantidad disponible en la base de datos para el producto
    $sql = "SELECT cantidad FROM productos WHERE id = :id AND estado = 1";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $_POST['product_id']);
    $stmt->execute();
    $cantidad_disponible = $stmt->fetchColumn();

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
                    $_SESSION['modalSuccess'] = 'show-success';
                } else {
                    //$_SESSION['modal_error'] = "No se puede agregar más de la cantidad disponible.";
                    $_SESSION['modalError'] = 'show-error';
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
            $_SESSION['modalSuccess'] = 'show-success';
        }
    } else {
        // Si la cookie no existe, inicializar el carrito con el producto
        $carrito = array(
            array(
                'id' => $product_id,
                'cantidad' => 1
            )
        );
        $_SESSION['modalSuccess'] = 'show-success';
    }

    setcookie('carrito', json_encode($carrito), time() + (86400 * 30), "/"); // 86400 = 1 día
    // Codificar el carrito de nuevo a JSON y guardarlo en la cookie
    // Redireccionar de nuevo a la página de origen
    header("Location: ../pages/products-page.php");
    exit();
}
// Decodificar la cookie del carrito
$carrito = isset($_COOKIE['carrito']) ? json_decode($_COOKIE['carrito'], true) : array();

/* echo "<h2>Productos en el carrito:</h2>";

if (!empty($carrito)) {
    foreach ($carrito as $producto) {
        echo "<p>El ID es: " . htmlspecialchars($producto['id']) . "</p>";
        echo "<p>La cantidad es: " . htmlspecialchars($producto['cantidad']) . "</p>";
        echo "<hr>";
    }
} else {
    echo "<p>No hay productos en el carrito.</p>";
} */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ELECTRO SHOP</title>
    <link rel="icon" href="">
    <link rel="stylesheet" type="text/css" href="../static/styles/stylesHome.css">
    <link rel="stylesheet" type="text/css" href="../static/styles/modal-add.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap');
    </style>
</head>

<body>
    <?php include '../pages/navBar.php'; ?>

    <!-- Modal de éxito -->
    <div id="myModalSuccess" class="modal <?php echo htmlspecialchars($classSuccess) ?>">
        <div class="modal-dialog">
            <div class="modal-content modal-success">
                <div class="modal-header">
                    <h5 class="modal-title">Éxito</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>¡El producto se ha agregado al carrito con éxito!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de error -->
    <div id="myModalError" class="modal <?php echo htmlspecialchars($classError) ?>">
        <div class="modal-dialog">
            <div class="modal-content modal-error">
                <div class="modal-header">
                    <h5 class="modal-title">Error</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>No se puede agregar el producto debido a la disponibilidad limitada.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Productos más vendidos -->


    <section class="container-products">
        <h2 class="text-most-sold">NUESTROS PRODUCTOS</h2>
        <div class="container-products-cards">
            <?php crearTarjetasProductos("SELECT * FROM productos WHERE estado = 1", $conn, "login.php") ?>
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
    <script src="../static/js/modalAddProducto.js"></script>

</body>

</html>