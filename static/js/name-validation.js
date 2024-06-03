const nameInput = document.getElementById("name"); // Guarda el input

nameInput.addEventListener("input", () => {
  let name = nameInput.value.trim(); // Obtiene el valor del input y elimina espacios en blanco al principio y al final

  // Limita la entrada a 20 caracteres
  if (name.length > 20) {
    name = name.substring(0, 20);
    nameInput.value = name;
  }

  // Verifica si el nombre tiene al menos 2 caracteres
  if (name.length < 1) {
    nameInput.classList.add("error"); // Agrega la clase 'error' para resaltar el campo
  } else {
    nameInput.classList.remove("error"); // Remueve la clase 'error' si el nombre es válido
  }
});
