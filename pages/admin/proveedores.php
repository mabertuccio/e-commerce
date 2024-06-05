<?php
include '../../controllers/bbdd.php';
session_start();
if (!isset($_SESSION["usuario"])) {
   header("Location: ../../index.php");
   exit;
}
$usuario = $_SESSION["usuario"];

$sql = "SELECT * FROM proveedores WHERE estado!=0";
$stmt = $conn->query($sql);
$proveedores = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
               <p>Gestor de Proveedores</p>
               <div style="float: right;">
                  <button class="btn btn-primary" onclick="window.location.href='../admin/proveedores/crear-proveedor.php'">Agregar</button>
               </div>
            </div>
            <hr>
            <table>
               <tr>
                  <th class="title-table">Id</th>
                  <th>Nombre</th>
                  <th>Dirección</th>
                  <!-- <th>Email</th> -->
                  <th class="table-action">Acciones</th>

               </tr>
               <?php foreach ($proveedores as $proveedor) : ?>
                  <tr>
                     <td><?php echo $proveedor['id']; ?></td>
                     <td><?php echo $proveedor['nombre']; ?></td>
                     <td><?php echo $proveedor['direccion']; ?></td>
                     <!-- <td><?php echo $proveedor['email']; ?></td> -->
                     <td class="action-cell" style="display:flex; justify-content: center">
                        <div style="width: 50px; " class="mr-1">
                           <!-- Botón para eliminar con color rojo -->
                           <button class="btn btn-danger" onclick="openModal(<?php echo $proveedor['id']; ?>, '<?php echo $proveedor['nombre']; ?>', '../../controllers/admin/eliminar_proveedor.php')">
                              <i class=" fas fa-trash-alt"></i>
                           </button>
                        </div>
                        <!-- Botón para editar con color gris -->
                        <div style="width: 50px;">
                           <button class="btn btn-secondary modificarProveedorBtn" data-id="<?php echo $proveedor['id']; ?>">
                              <i class="fas fa-edit"></i>
                           </button>
                        </div>
                     </td>
                  </tr>
               <?php endforeach; ?>
            </table>
            <div style="width: 150px; margin: auto; margin-top: 10px;">
               <form action="../../controllers/admin/generar_excel.php" method="get">
                  <input type="hidden" name="datos" value="proveedores">
                  <button class="btn btn-primary" type="submit">Descargar XLS</button>
               </form>
            </div>
         </div>
      </div>

   </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="../../static/js/proveedores.js"></script>
<script src="../../static/js/modal.js"></script>
<script>
   // Funcion que formatea el correo del usuario partiendolo en el "@" y devolviendo la parte que no es el dominio.
   function formatearNombreUsuario(correo) {
      var partes = correo.split('@');
      return partes[0];
   }

   function ocultarBotones(listaDeBotones) {
      listaDeBotones.forEach((element) => {
         element.style.display = 'none';
      });
   }

   // Función para cargar dinámicamente el nombre de usuario
   function cargarNombreUsuario() {
      // Realizar una petición al servidor para verificar la sesión
      fetch('../../controllers/check_session.php')
         .then((response) => response.json())
         .then((data) => {
            // Verificar si el usuario está autenticado            
            if (data.authenticated) {
               // Si el usuario está autenticado, mostrar su nombre de usuario
               document.getElementById('nombreUsuario').innerHTML =
                  formatearNombreUsuario(data.usuario);
               document.getElementById('loginButton').style.display = 'none';
               ocultarBotones(document.querySelectorAll('#addProdButtonUnloged'));
            } else {
               // Si el usuario no está autenticado, mostrar un mensaje predeterminado
               document.getElementById('logoutButton').style.display = 'none';
               document.getElementById('shopButton').style.display = 'none';
               ocultarBotones(document.querySelectorAll('#addProdButton'));
            }
         });
   }

   // Llamar a la función al cargar la página
   window.onload = cargarNombreUsuario;
</script>

</html>