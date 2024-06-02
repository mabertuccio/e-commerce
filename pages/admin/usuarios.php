<?php
include '../../controllers/bbdd.php';
session_start();
if (!isset($_SESSION["usuario"])) {
   header("Location: ../../index.html");
   exit;
}
$usuario = $_SESSION["usuario"];

$sql = "SELECT * FROM usuarios WHERE estado!=0";
$stmt = $conn->query($sql);
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE <!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <![endif]-->

<html>

<head>

   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Administración</title>
   <meta name="description" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" type="text/css" href="../../static/styles/styles_admin.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


</head>

<body>
   <div class="container">
      <?php include 'components/menu_side_bar.html'; ?>
      <?php include 'components/modal.html'; ?>
      <div class="right-column">
         <div class="content">
            <div class="header-content">
               <p>Gestor de Usuarios</p>
               <div style="float: right; ">
                  <button class=" btn btn-primary" onclick="window.location.href='../admin/usuarios/crear-usuario.php'">Agregar</button>
               </div>
            </div>
            <hr>
            <table>
               <tr>
                  <th class=" title-table">Id</th>
                  <th>Usuario</th>
                  <th>Tipo de Usuario</th>
                  <th class="table-action">Acciones</th>
               </tr>
               <?php foreach ($usuarios as $usuario) : ?>
                  <tr>
                     <td><?php echo $usuario['id']; ?></td>
                     <td><?php echo $usuario['email']; ?></td>
                     <td><?php echo $usuario['tipo_usuario']; ?></td>
                     <td class="action-cell" style="display:flex; justify-content: center">
                        <div style="width: 50px; " class="mr-1">
                           <!-- Botón para eliminar con color rojo -->
                           <button class="btn btn-danger" onclick="openModal(<?php echo $usuario['id']; ?>, '<?php echo $usuario['email']; ?>', '../../controllers/admin/eliminar_usuario.php')">
                              <i class="fas fa-trash-alt"></i>
                           </button>
                        </div>
                        <!-- Botón para editar con color gris -->
                        <div style="width: 50px;">
                           <button class="btn btn-secondary modificarUsuarioBtn" data-id="<?php echo $usuario['id']; ?>">
                              <i class="fas fa-edit"></i>
                           </button>
                        </div>
                     </td>
                  </tr>
               <?php endforeach; ?>
            </table>
            <div style="width: 150px; margin: auto; margin-top: 10px;">
               <form action="../../controllers/admin/generar_excel.php" method="get">
                  <input type="hidden" name="datos" value="usuarios">
                  <button class="btn btn-primary" type="submit">Descargar XLS</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="../../static/js/usuarios.js"></script>
<script src="../../static/js/modal.js"></script>

</html>