<?php
include '../../controllers/bbdd.php';
session_start();
if (!isset($_SESSION["usuario"])) {
   header("Location: ../../index.php");
   exit;
}

$sql = "SELECT i.id_factura, i.cantidad, i.precio_unitario AS 'Precio del producto', f.precio_total AS 'Precio total', f.fecha AS 'Fecha de compra', u.email AS 'Cliente', p.nombre AS 'nombreproducto' FROM items_factura AS i INNER JOIN facturas AS f ON f.id = i.id_factura INNER JOIN usuarios AS u ON f.id_usuario=u.id INNER JOIN productos AS p ON p.id = i.id_producto;";
$stmt = $conn->query($sql);
$facturas = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


</head>

<body>
   <div class="container">
      <?php include 'components/menu_side_bar.php'; ?>
      <?php include 'components/modal-factura.html'; ?>
      <div class="right-column">
         <div class="content">
            <div class="header-content">
               <p>Gestor de Facturas</p>
            </div>
            <hr>
            <table>
               <tr>
                  <th class=" title-table">Factura</th>
                  <th>Cliente</th>
                  <th>Producto</th>
                  <th>Cantidad</th>
                  <th>Precio Unitario</th>
                  <th>Precio total</th>
                  <th>Fecha</th>
                  <th class="table-action">Acciones</th>
               </tr>
               <?php foreach ($facturas as $factura) : ?>
                  <tr>
                     <td><?php echo $factura['id_factura']; ?></td>
                     <td><?php echo $factura['Cliente']; ?></td>
                     <td><?php echo $factura['nombreproducto']; ?></td>
                     <td><?php echo $factura['cantidad']; ?></td>
                     <td><?php echo $factura['Precio del producto']; ?></td>
                     <td><?php echo $factura['Precio total']; ?></td>
                     <td><?php echo $factura['Fecha de compra']; ?></td>
                     <td class="action-cell" style="display:flex; justify-content: center">
                        <div style="width: 50px; " class="mr-1">
                           <!-- Botón para imprimir pdf -->
                           <button class="btn btn-secondary" onclick="openPDF('<?php echo $factura['id_factura']; ?>')">
                              <i class="fa-solid fa-file-pdf"></i>
                           </button>
                        </div>
                     </td>
                  </tr>
               <?php endforeach; ?>
            </table>

            <div style="width: 150px; margin: auto; margin-top: 10px;">
               <button class="btn btn-primary" onclick="openPDFList()">Exportar PDF</button>
            </div>
         </div>
      </div>
   </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="../../static/js/usuarios.js"></script>
<script src="../../static/js/openPdf.js"></script>


</html>