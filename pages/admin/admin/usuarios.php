<?php
session_start();
if (!isset($_SESSION["username"])) {
   header("Location: login.php");
   exit;
}
$usuario = $_SESSION["username"];
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
                  <th class="title-table">Id</th>
                  <th>Usuario</th>
                  <th>Nombre</th>
                  <th>Rol</th>
                  <th class="table-action">Acciones</th>
               </tr>
               <tr>
                  <td>1</td>
                  <td>user1</td>
                  <td>Usuario número 1</td>
                  <td>Cliente</td>
                  <td class="action-cell" style="display:flex; justify-content: center">
                     <div style="width: 50px; " class="mr-1">
                        <!-- Botón para eliminar con color rojo -->
                        <button class="btn btn-danger" onclick="openModal()">
                           <i class="fas fa-trash-alt"></i>
                        </button>
                     </div>
                     <!-- Botón para editar con color gris -->
                     <div style="width: 50px;">
                        <button class="btn btn-secondary">
                           <i class="fas fa-edit"></i>
                        </button>
                     </div>
                  </td>
               </tr>
               <tr>
                  <td>2</td>
                  <td>user2</td>
                  <td>Usuario número 2</td>
                  <td>Cliente</td>
                  <td class="action-cell" style="display:flex; justify-content: center">
                     <div style="width: 50px; " class="mr-1">
                        <!-- Botón para eliminar con color rojo -->
                        <button class="btn btn-danger">
                           <i class="fas fa-trash-alt"></i>
                        </button>
                     </div>
                     <!-- Botón para editar con color gris -->
                     <div style="width: 50px;">
                        <button class="btn btn-secondary">
                           <i class="fas fa-edit"></i>
                        </button>
                     </div>
                  </td>
               </tr>
               <tr>
                  <td>3</td>
                  <td>user3</td>
                  <td>Usuario número 3</td>
                  <td>Vendedor</td>
                  <td class="action-cell" style="display:flex; justify-content: center">
                     <div style="width: 50px; " class="mr-1">
                        <!-- Botón para eliminar con color rojo -->
                        <button class="btn btn-danger">
                           <i class="fas fa-trash-alt"></i>
                        </button>
                     </div>
                     <!-- Botón para editar con color gris -->
                     <div style="width: 50px;">
                        <button class="btn btn-secondary">
                           <i class="fas fa-edit"></i>
                        </button>
                     </div>
                  </td>
               </tr>
               <tr>
                  <td>4</td>
                  <td>user4</td>
                  <td>Usuario número 4</td>
                  <td>Vendedor</td>
                  <td class="action-cell" style="display:flex; justify-content: center">
                     <div style="width: 50px; " class="mr-1">
                        <!-- Botón para eliminar con color rojo -->
                        <button class="btn btn-danger">
                           <i class="fas fa-trash-alt"></i>
                        </button>
                     </div>
                     <!-- Botón para editar con color gris -->
                     <div style="width: 50px;">
                        <button class="btn btn-secondary">
                           <i class="fas fa-edit"></i>
                        </button>
                     </div>
                  </td>
               </tr>
            </table>
            <div class="pagination">
               <a href="#">&laquo;</a>
               <a href="#" class="active">1</a>
               <a href="#">2</a>
               <a href="#">3</a>
               <a href="#">4</a>
               <a href="#">5</a>
               <a href="#">&raquo;</a>
            </div>
         </div>
      </div>

   </div>
   <script>
      // Función para abrir el modal


      function openModal() {
         document.getElementById("myModal").style.display = "block";
      }

      // Función para cerrar el modal
      function closeModal() {
         document.getElementById("myModal").style.display = "none";
      }

      // Cerrar el modal cuando el usuario hace clic fuera del contenido
      window.onclick = function(event) {
         var modal = document.getElementById("myModal");

         if (event.target == modal) {
            modal.style.display = "none";
         }
      }
   </script>
</body>

</html>