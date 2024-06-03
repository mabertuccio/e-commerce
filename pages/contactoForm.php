<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>Formulario de contacto</title>
  <link rel="stylesheet" href="../static/styles/notification.css">
  <link rel="shortcut icon" href="../static/images/file_type_favicon_icon_130608.png" type="image/x-icon" />
  <link rel="stylesheet" href="../static/styles/estilosform.css" />
  <link rel="stylesheet" type="text/css" href="../static/styles/stylesHome.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap');
  </style>
</head>

<body>
  <?php include '../pages/navBar.php'; ?>

  <section class="form-wrap">
    <section class="contact-info">
      <section class="info-titulo">
        <img src="../static/images/003-avatar.png" alt="usuario" />
        <h2>
          Informacion <br />
          de Contacto
        </h2>
      </section>
      <section class="info-item">
        <p>
          <img src="../static/images/001-correo-electronico.png" alt="correo" />
        </p>
        <p class="correo2">electroshopmas@outlook.com</p>
        <p><img src="../static/images/002-llamada.png" alt="telefono" /></p>
        <p class="telefono2">+54 9 11 2933-2342</p>
        <a href="../index.php" class="volver">volver</a>
        <!-- agragar index pagina de inicio -->
      </section>
    </section>

    <form action="../controllers/send-email.php" class="form-contact" method="POST">
      <h2>Envia una mensaje</h2>
      <?php if (isset($_GET['status'])) : ?>
        <?php if ($_GET['status'] == 'success') : ?>
          <div class="notification notification-success">
            Mensaje enviado con éxito.
          </div>
        <?php elseif ($_GET['status'] == 'error') : ?>
          <div class="notification notification-error">
            No se pudo enviar el mensaje. Por favor, inténtelo de nuevo más tarde.
          </div>
        <?php endif; ?>
      <?php endif; ?>
      <div class="user-info">
        <label for="names">Nombre*</label>
        <input type="text" id="name" name="name" />

        <label for="phono">Telefono</label>
        <input type="text" id="phone" name="phone" />

        <label for="email">Correo Electronico*</label>
        <input type="text" id="email" name="email" />

        <label for="mensaje">Mensaje*</label>
        <textarea id="mensaje" cols="30" rows="10" name="message"></textarea>

        <input type="submit" value="Enviar mensaje" id="btnSend" />
      </div>
    </form>
  </section>
  <script>
    // Eliminar el parámetro 'status' de la URL sin recargar la página
    if (window.history.replaceState) {
      const url = new URL(window.location);
      url.searchParams.delete('status');
      window.history.replaceState(null, null, url.toString());
    }
  </script>
  <?php include '../pages/footer.php'; ?>

  <script src="../static/js/scriptNavBar.js"></script>
</body>

</html>