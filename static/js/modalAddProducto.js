// Obtener los elementos del DOM
var modalSuccess = document.getElementById('myModalSuccess');
var modalError = document.getElementById('myModalError');
var closeButtons = document.getElementsByClassName('close');

// Función para mostrar el modal de éxito
function mostrarModalExito() {
  modalSuccess.style.display = 'block';
}

// Función para mostrar el modal de error
function mostrarModalError() {
  modalError.style.display = 'block';
}

// Ocultar los modales al hacer clic en el botón de cerrar
for (var i = 0; i < closeButtons.length; i++) {
  closeButtons[i].onclick = function () {
    this.closest('.modal').style.display = 'none';
  };
}

// Mostrar el modal basado en la sesión PHP
