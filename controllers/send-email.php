<?php
require "../vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true); // Se crea una nueva instancia de PHPMailer.

try {
    // Configura el servidor.
    $mail->isSMTP();
    $mail->Host = "smtp.office365.com";
    $mail->SMTPAuth = true;
    $mail->Username = "electroshopmas@outlook.com";
    $mail->Password = "electro2024";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // 
    $mail->Port = 587;

    // Se comprueba si existen los campos y se guardan en sus respectivas variables.
    $name = isset($_POST["name"]) ? $_POST["name"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $phone = isset($_POST["phone"]) ? $_POST["phone"] : "";
    $message = isset($_POST["message"]) ? $_POST["message"] : "";

    // Específica desde dónde y hacía dónde se enviará el mail.
    $mail->setFrom("electroshopmas@outlook.com", "Electro Shop");
    $mail->addAddress($email);

    // Configura el cuerpo del mail.
    $mail->isHTML(true);
    $mail->Subject = "Formulario Completado";
    $mail->Body = "Hola, <strong>$name</strong>!<br>En la brevedad estaremos respondiendo tu consulta.<br>Electro Shop";

    $mail->send(); // Se envía el mail.
    header("Location: ../pages/contactoForm.php?status=success"); // Si el mail pudo enviarse con éxito se mostrará una notificación en color verde.
} catch (Exception $e) {
    header("Location: ../pages/contactoForm.php?status=error"); // Si el mail no pudo enviarse con éxito se mostrá una notificación en color rojo.
}
