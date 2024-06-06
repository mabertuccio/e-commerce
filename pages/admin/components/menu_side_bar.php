<?php

// Supongamos que el correo electrónico del usuario está almacenado en $_SESSION['usuario']
$correo = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : '';
$nombreUsuario = explode('@', $correo)[0];
?>
<div class="left-column">

    <div class="logo">
        <img src="../../static/images/WhatsApp Image 2024-04-03 at 5.04.28 PM.jpeg" alt="Logo">

    </div>
    <h3 style="padding-left: 15px;padding-bottom: 15px;">Usuario:
        <div>
            <span id="nombreUsuario">
                <?php echo htmlspecialchars($nombreUsuario, ENT_QUOTES, 'UTF-8'); ?>
            </span>
        </div>
    </h3>
    <ul class="menu">
        <li><a href="./usuarios.php">Usuarios</a></li>
        <li><a href="./productos.php">Productos</a></li>
        <li><a href="./proveedores.php">Proveedores</a></li>
        <li><a href="./facturas.php">Facturacion</a></li>
    </ul>
    <form action="../../controllers/logout.php" method="post">
        <div style="width: 150px; margin: auto; margin-top: 10px;">
            <button class="btn btn-primary" type="submit">Cerrar Sesión</button>
        </div>
    </form>

</div>