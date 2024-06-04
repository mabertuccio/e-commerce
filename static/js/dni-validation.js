const dniInput = document.getElementById("dni"); // Guarda el input

dniInput.addEventListener("input", () => {
  let dni = dniInput.value.trim(); // Obtiene el valor del input y elimina espacios en blanco al principio y al final

  // Limita la entrada a 8 dígitos
  if (dni.length > 8) {
    dni = dni.substring(0, 8);
    dniInput.value = dni;
  }

  // Verifica si el DNI tiene exactamente 8 caracteres numéricos
  if (/^\d{8}$/.test(dni)) {
    dniInput.classList.remove("error"); // Remueve la clase 'error' si el DNI es válido
    document.getElementById("validacion-dni").style.display = "none";
  } else {
    dniInput.classList.add("error"); // Agrega la clase 'error' para resaltar el campo
    document.getElementById("validacion-dni").style.display = "block";
  }
});
