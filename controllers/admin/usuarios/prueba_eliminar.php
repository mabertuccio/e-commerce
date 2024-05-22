<?php
if (isset($_POST['id'])) {

    $usuario_delete = $_GET['id'];
    $sql = "DELETE FROM usaurios WHERE id = $usuario_id";

    if (mysqli_query($conexion, $sql)) {
        header("Location: usuarios.php");
        exit();
    } else {
        echo "Error al eliminar el producto: " . mysqli_error($conexion);
    }
} else {
    echo "No se ha especificado el ID del producto.";
}
