<?php
include '../../../controllers/bbdd.php';

$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id) {

    try {
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error al recuperar los datos del usuario: " . $e->getMessage();
    }
} else {
    echo "ID de usuario no proporcionado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Usuario</title>
    <link rel="stylesheet" type="text/css" href="../../../static/styles/styles_admin.css">
</head>

<body>
    <div class="container-form">
        <form id="modificarUsuarioForm" action="../../../controllers/admin/modificar_usuario.php" method="post">
            <h2>Modificar Usuario</h2>
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
            <div class="input-group-from-admin">
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required value="<?php echo htmlspecialchars($usuario['email']); ?>">
            </div>
            <div class="input-group-from-admin">
                <label for="tipo_usuario">Tipo de Usuario:</label>
                <select name="tipo_usuario" id="tipo_usuario" required>
                    <option value="Cliente" <?php if ($usuario['tipo_usuario'] == 'Cliente') echo 'selected'; ?>>Cliente</option>
                    <option value="Vendedor" <?php if ($usuario['tipo_usuario'] == 'Vendedor') echo 'selected'; ?>>Vendedor</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-form">Guardar</button>
            <div>
                <button type="button" class="btn btn-secondary mt-2 btn-form" id="volverBtn">Volver</button>
            </div>
        </form>
    </div>

</body>
<script src="../../../static/js/usuarios.js"></script>

</html>