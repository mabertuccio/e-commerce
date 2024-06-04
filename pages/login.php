<?php
session_start();

$registerFormClass = '';
$loginFormClass = 'hide';

if (isset($_SESSION['mensaje_error_login'])) {
    $registerFormClass = 'hide';
    $loginFormClass = '';
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../static/styles/estilo.css">
    <title>FORMULARIO DE REGISTRO E INICIO SESIÓN</title>
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
                <a class="login-button" id="loginButton" href="./login.php">
                    INICIAR SESIÓN
                </a>
            </div>
        </div>
        <!-- Navbar sections -->
        <div class="navbar-sections">
            <nav>
                <ul>
                    <li><a href="../index.php">INICIO</a></li>
                    <li><a href="./products-page.php">PRODUCTOS</a></li>
                    <li><a href="./nosotros.php">NOSOTROS</a></li>
                    <li><a href="./contactoForm.php">CONTACTO</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="form-container-body">
        <div class="container-form register <?php echo $registerFormClass; ?>">
            <div class="information">
                <div class="info-childs">
                    <h2>Bienvenido</h2>
                    <p>¿Ya tienes una cuenta?</p>
                    <input type="button" value="INICIAR SESIÓN" id="sign-in">
                </div>
            </div>
            <div class="form-information">
                <div class="form-information-childs">
                    <h2>Crear una cuenta</h2>
                    <?php
                    if (isset($_SESSION['mensaje_error'])) {
                        echo '<div style="color: red;">' . $_SESSION['mensaje_error'] . '</div>';
                        unset($_SESSION['mensaje_error']);
                    }
                    ?>
                    <form id="register-form" class="form form-register" action="../controllers/registro.php" method="post">
                        <div>
                            <label>
                                <i class='bx bx-envelope'></i>
                                <input type="email" placeholder="Correo Electronico" name="email" id="register-email" required>
                            </label>
                        </div>
                        <div>
                            <label>
                                <i class='bx bx-lock-alt'></i>
                                <input type="password" placeholder="Contraseña" name="password" id="register-password" required>
                            </label>
                        </div>
                        <input type="submit" value="REGISTRARSE">
                        <div class="alerta-error" id="register-error" style="display: none; color:red">Todos los campos son
                            obligatorios</div>
                    </form>
                </div>
            </div>
        </div>
        <div class="container-form login <?php echo $loginFormClass; ?>">
            <div class="information">
                <div class="info-childs">
                    <h2>Bienvenido</h2>
                    <p>¿No tienes una cuenta?</p>
                    <input type="button" value="REGISTRARSE" id="sign-up">
                </div>
            </div>
            <div class="form-information">
                <div class="form-information-childs">
                    <h2>Iniciar sesión</h2>
                    <?php
                    if (isset($_SESSION['mensaje_error_login'])) {
                        echo '<div style="color: red;">' . $_SESSION['mensaje_error_login'] . '</div>';
                        unset($_SESSION['mensaje_error_login']);
                    }
                    ?>
                    <form id="login-form" action="../controllers/login.php" class="form form-login" method="post">
                        <div>
                            <label>
                                <i class='bx bx-envelope'></i>
                                <input type="email" placeholder="Correo Electronico" name="email" id="login-email" required>
                            </label>
                        </div>
                        <div>
                            <label>
                                <i class='bx bx-lock-alt'></i>
                                <input type="password" placeholder="Contraseña" name="password" id="login-password" required>
                            </label>
                        </div>
                        <input type="submit" value="INGRESAR">
                        <div class="alerta-error" id="login-error" style="display: none; color: red;">Todos los campos son
                            obligatorios
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include '../pages/footer.php'; ?>
    <!--     <script>
        document.addEventListener('DOMContentLoaded', function () {
            const registerForm = document.getElementById('register-form');
            const registerEmail = document.getElementById('register-email');
            const registerPassword = document.getElementById('register-password');
            const registerError = document.getElementById('register-error');
            const registerSuccess = document.getElementById('register-success');

            registerForm.addEventListener('submit', function (event) {
                let valid = true;

                if (registerEmail.value.trim() === '' || registerPassword.value.trim() === '') {
                    valid = false;
                }

                if (!valid) {
                    event.preventDefault();
                    registerError.style.display = 'block';
                    registerSuccess.style.display = 'none';
                } else {
                    registerError.style.display = 'none';
                    registerSuccess.style.display = 'block';
                    registerForm.submit();
                }
            });

            const loginForm = document.getElementById('login-form');
            const loginEmail = document.getElementById('login-email');
            const loginPassword = document.getElementById('login-password');
            const loginError = document.getElementById('login-error');
            const loginSuccess = document.getElementById('login-success');

            loginForm.addEventListener('submit', function (event) {
                let valid = true;

                if (loginEmail.value.trim() === '' || loginPassword.value.trim() === '') {
                    valid = false;
                }

                if (!valid) {
                    event.preventDefault();
                    loginError.style.display = 'block';
                    loginSuccess.style.display = 'none';
                } else {
                    loginError.style.display = 'none';
                    loginSuccess.style.display = 'block';
                    loginForm.submit();
                }
            });
        });
    </script> -->
    <script src="../static/js/script.js"></script>
    <script src="../static/js/register.js"></script>
</body>

</html>