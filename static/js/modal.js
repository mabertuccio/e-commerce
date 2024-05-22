function openModal(id, nombre, path) {
  document.getElementById(
    'modal-text'
  ).innerText = `¿Desea eliminar ${nombre} ?`;
  document.getElementById('myModal').style.display = 'block';
  $('#confirmDeleteButton')
    .off('click')
    .one('click', function () {
      if (id) {
        $.post(path, { id: id }, function (response) {
          if (response === 'success') {
            location.reload();
          } else {
            alert('Error al eliminar el registro');
          }
        });
      }
    });
}

function closeModal() {
  document.getElementById('myModal').style.display = 'none';
}

window.onclick = function (event) {
  var modal = document.getElementById('myModal');

  if (event.target == modal) {
    modal.style.display = 'none';
  }
};
