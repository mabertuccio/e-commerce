
<?php
//echo '<h1>Hola</h1>';
session_start();
$_SESSION["username"] = "";
header("Location: ../pages/login.html");
exit;
