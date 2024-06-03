// Obtiene referencia al campo de entrada del CVV
const cvvInput = document.getElementById("cvv");

// Agrega un evento de escucha para detectar cambios en el campo de entrada
cvvInput.addEventListener("input", () => {
  // Obtiene el valor actual del campo de entrada y eliminar espacios en blanco
  let value = cvvInput.value.trim();

  // Limita la entrada a solo caracteres numéricos
  value = value.replace(/\D/g, "");

  // Limita la entrada a 3 caracteres
  if (value.length > 3) {
    value = value.substring(0, 3);
  }

  // Actualiza el valor del campo de entrada con los cambios
  cvvInput.value = value;

  // Valida el CVV con una expresión regular que comprueba si hay exactamente 3 dígitos
  const cvvPattern = /^\d{3}$/;
  const isValidCVV = cvvPattern.test(value);

  // Aplica estilos de error en caso de ser necesario
  if (!isValidCVV) {
    cvvInput.classList.add("error"); // Aplicar clase de error para resaltar el campo
  } else {
    cvvInput.classList.remove("error"); // Quitar la clase de error si el valor es válido
  }
});
