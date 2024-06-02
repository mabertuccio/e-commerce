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
  <script src="js/jquery.js"></script>
  <script src="js/script2.js"></script>
</head>

<body>
  <div class="centrado" id="onload">
    <div class="lds-facebook">
      <div></div>
      <div></div>
      <div></div>
    </div>
  </div>

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
        <p class="correo2">compushop@gmail.com</p>
        <p><img src="../static/images/002-llamada.png" alt="telefono" /></p>
        <p class="telefono2">+54 0800-333-0000</p>
        <a href="../index.html" class="volver">volver</a>
        <!-- agragar index pagina de inicio -->
      </section>
    </section>

    <form action="../controllers/send-email.php" class="form-contact" method="POST">
      <h2>Envia una mensaje</h2>
      <?php if (isset($_GET['status'])): ?>
        <?php if ($_GET['status'] == 'success'): ?>
          <div class="notification notification-success">
            Mensaje enviado con éxito.
          </div>
        <?php elseif ($_GET['status'] == 'error'): ?>
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
</body>

</html>