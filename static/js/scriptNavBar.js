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
  fetch('../controllers/check_session.php')
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
