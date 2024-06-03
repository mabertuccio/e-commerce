<?php
include 'bbdd.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["email"]) && isset($_POST["password"])) {
        $useremail = $_POST["email"];
        $password = $_POST["password"];
        $stmt = $conn->prepare("SELECT email FROM usuarios WHERE email = ?");
        $stmt->execute([$useremail]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {

            $_SESSION['mensaje_error'] = "El usuario ya se encuentra registrado";
            header("Location: ../pages/login.php");
        } else {

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO usuarios (email, password, tipo_usuario) VALUES (?, ?, ?)");
            $tipo_usuario = 'Cliente';
            $stmt->execute([$useremail, $hashedPassword, $tipo_usuario]);
            header("Location: ../index.php");
            exit();
        }
    }
}
