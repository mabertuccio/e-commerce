function initVolverBtn() {
  var volverBtn = document.getElementById('volverBtn');
  if (volverBtn) {
    volverBtn.addEventListener('click', function (event) {
      event.preventDefault();
      window.location.href = '../usuarios.php';
    });
  }
}

function initEditarBtns() {
  var botones = document.querySelectorAll('.modificarUsuarioBtn');
  if (botones.length > 0) {
    botones.forEach(function (boton) {
      boton.addEventListener('click', function () {
        var id = this.getAttribute('data-id');
        window.location.href =
          '../../pages/admin/usuarios/modificar-usuario.php?id=' + id;
      });
    });
  }
}

document.addEventListener('DOMContentLoaded', function () {
  initVolverBtn();
  initEditarBtns();
});
