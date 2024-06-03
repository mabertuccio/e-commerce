<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nosotros</title>
    <link rel="stylesheet" href="../static/styles/estilo-nosotros.css">
    <link rel="stylesheet" type="text/css" href="../static/styles/stylesHome.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap');
    </style>
</head>

<body>
    <?php include '../pages/navBar.php'; ?>
    <main>
        <div class="textos texto-inicial">
            <h1>ElectroShop</h1>
            <h2>Quienes somos</h2>
            <br>
            <br>
            <div>
                <p>Desde 1992 desarrollamos nuestra actividad en el mercado informático argentino.</p>
                <p>Estamos dedicados a la venta de equipos, accesorios e insumos tanto a particulares
                    como empresas.</p>
                <p> Contamos además con un servicio técnico especializado.</p>
                <p>Somos distribuidores de las más prestigiosas marcas. Disponiendo de un amplio y variado stock.</p>
                Comercializamos computadoras, notebook, dispositivos moviles, impresoras, monitores,
                insumos y todo lo relacionado con la informática.
                <br>
                Nuestro compromiso es brindar la mejor experiencia en el servicio al Cliente,
                desde el usuário Hogareño, hasta las grandes empresas con un
                servicio de asesoramiento y ventas de equipos informáticos,
                <br>
                además de un excelente servicio de post-venta permanente
                </p>
            </div>
        </div>
        <section class="team contenedor" id="equipo">
            <h3>Servicio Personalizado</h3>
            <p class="after">Garantizado</p>
            <div class="card">
                <div class="content-card">
                    <div class="people">
                        <img src="../static/images/login/fondo azul.jpg" alt="Intech">
                    </div>
                    <div class="texto-team">
                        <h4>Lo mejor del mercado a tu mano</h4>
                    </div>
                </div>
                <div class="content-card">
                    <div class="people">
                        <img src="../static/images/login/programacion1.jpeg" alt="Tech">
                    </div>
                    <div class="texto-team">
                        <h4>Compra garantizada las 24 horas</h4>
                    </div>
                </div>
                <div class="content-card">
                    <div class="people">
                        <img src="../static/images/login/diseño1.jpeg" alt="Bios">
                    </div>
                    <div class="texto-team">
                        <h4>Marcas Internacionales</h4>
                    </div>
                </div>
            </div>
        </section>
        <section class="about" id="servicio">
            <div class="contenedor">
                <h3>Marcando la diferencia en el mercado</h3>
                <p class="after">Nos respalda 40 años de experiencia</p>
                <div class="servicios">
                    <div class="caja-servicios">
                        <img src="../static/images/login/efectos.png" alt="efecto">
                        <h4>Facturacion Online</h4>
                        <p>Todas tus compras son respaldadas fiscalmente</p>
                    </div>
                    <div class="caja-servicios">
                        <img src="../static/images/login/responsive.png" alt="portable">
                        <h4>Todo lo que buscas en un click</h4>
                        <p>Stock garantizado siempre</p>
                    </div>
                    <div class="caja-servicios">
                        <img src="../static/images/login/heart.png" alt="corazon">
                        <h4>Atención permanente</h4>
                        <p>Vendedores especializados, listo para ayudarte</p>
                    </div>
                </div>
            </div>
    </main>

    <?php include '../pages/footer.php'; ?>

    <script src="../static/js/scriptNavBar.js"></script>
</body>

</html>