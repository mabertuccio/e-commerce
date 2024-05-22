function eliminarMensajesValidacion() {
  var elementos = document.querySelectorAll('.input-group-from-admin input');
  elementos.forEach(function (elemento) {
    elemento.setCustomValidity('');
  });
}

function initVolverBtn() {
  var volverBtn = document.getElementById('volverBtn');
  if (volverBtn) {
    volverBtn.addEventListener('click', function (event) {
      event.preventDefault();
      window.location.href = '../proveedores.php';
      /* eliminarMensajesValidacion(); // Eliminar mensajes de validación */
    });
  }
}

function initEditarBtns() {
  var botones = document.querySelectorAll('.modificarProveedorBtn');
  if (botones.length > 0) {
    botones.forEach(function (boton) {
      boton.addEventListener('click', function () {
        var id = this.getAttribute('data-id');
        window.location.href =
          '../../pages/admin/proveedores/modificar-proveedor.php?id=' + id;
      });
    });
  }
}

document.addEventListener('DOMContentLoaded', function () {
  initVolverBtn();
  initEditarBtns();
});
