<?php
include '../../controllers/bbdd.php';
session_start();
if (!isset($_SESSION["usuario"])) {
   header("Location: ../../index.html");
   exit;
}
$usuario = $_SESSION["usuario"];

$sql = "SELECT p.id, p.nombre, p.descripcion,p.precio,p.cantidad,p1.nombre as proveedor_nombre FROM `productos` as p  INNER JOIN proveedores as p1 ON p.id_proveedor=p1.id WHERE p.estado=1 AND p1.estado=1;";
$stmt = $conn->query($sql);
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
   <script src="../../static/js/modal.js"></script>
</head>


<body>
   <div class="container">
      <?php include 'components/menu_side_bar.html'; ?>
      <?php include 'components/modal.html'; ?>
      <div class="right-column">
         <div class="content">
            <div class="header-content">
               <p>Gestor de Productos</p>
               <div style="float: right;">
                  <button class="btn btn-primary" onclick="window.location.href='../admin/productos/crear-producto.php'">Agregar</button>
               </div>
            </div>
            <hr>
            <table>

               <tr>
                  <th class="title-table">Id</th>
                  <th>Nombre</th>
                  <th>Descripción</th>
                  <th>Precio</th>
                  <th>Cantidad</th>
                  <th>Proveedor</th>
                  <th class="table-action">Acciones</th>
               </tr>
               <?php foreach ($productos as $producto) : ?>
                  <tr>
                     <td><?php echo $producto['id']; ?></td>
                     <td><?php echo $producto['nombre']; ?></td>
                     <td><?php echo $producto['descripcion']; ?></td>
                     <td><?php echo $producto['precio']; ?></td>
                     <td><?php echo $producto['cantidad']; ?></td>
                     <td><?php echo $producto['proveedor_nombre']; ?></td>
                     <td class="action-cell" style="display:flex; justify-content: center">
                        <div style="width: 50px; " class="mr-1">
                           <!-- Botón para eliminar con color rojo -->
                           <button class="btn btn-danger" onclick="openModal(<?php echo $producto['id']; ?>, '<?php echo $producto['nombre']; ?>', '../../controllers/admin/eliminar_producto.php')">
                              <i class="fas fa-trash-alt"></i>
                           </button>
                        </div>
                        <!-- Botón para editar con color gris -->
                        <div style="width: 50px;">
                           <button class="btn btn-secondary modificarProductoBtn" data-id="<?php echo $producto['id']; ?>">
                              <i class="fas fa-edit"></i>
                           </button>
                        </div>
                     </td>
                  </tr>
               <?php endforeach; ?>
            </table>
         </div>
      </div>

   </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="../../static/js/productos.js"></script>
<script src="../../static/js/modal.js"></script>

</html>