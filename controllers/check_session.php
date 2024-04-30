<?php
session_start();

$response = array();

// Verificar si el usuario está autenticado
if (isset($_SESSION["usuario"]) && !empty($_SESSION["usuario"])) {
    // Si el usuario está autenticado, devolver el nombre de usuario
    $response['authenticated'] = true;
    $response['usuario'] = $_SESSION["usuario"];
} else {
    // Si el usuario no está autenticado, devolver false
    $response['authenticated'] = false;
}

// Devolver la respuesta como JSON
header('Content-Type: application/json');
echo json_encode($response);
