const expirationDateInput = document.getElementById("expiration-date"); // Obtiene referencia al campo de entrada para la fecha de expiración

expirationDateInput.addEventListener("input", () => {
  // Agrega un evento de escucha para detectar cambios en el campo de entrada
  let value = expirationDateInput.value.replace(/\D/g, ""); // Elimina caracteres no numéricos del valor ingresado

  // Limita la entrada a 4 dígitos (2 para el mes y 2 para el año)
  if (value.length > 4) {
    value = value.substring(0, 4);
  }

  // Formatea la fecha con una barra ("/") después del mes si es necesario
  if (value.length > 2) {
    value = value.substring(0, 2) + "/" + value.substring(2);
  }

  expirationDateInput.value = value; // Actualiza el valor del campo de entrada con el formato deseado

  // Valida la fecha de expiración
  if (value.length === 5) {
    // Verifica si la longitud de la fecha es la adecuada
    const [month, year] = value.split("/"); // Divide la fecha en mes y año
    const currentDate = new Date(); // Obtiene la fecha actual
    const currentMonth = currentDate.getMonth() + 1; // Obtiene el mes actual sumándole 1 (los meses se indexan desde 0)
    const currentYear = currentDate.getFullYear() % 100; // Obtiene los últimos 2 dígitos del año actual

    /*
    Comprueba si el año es menor al actual
    Comprueba si el año es igual al actual pero el mes es menor
    Comprueba si el mes 
    */
    if (
      parseInt(month, 10) < 1 ||
      parseInt(month, 10) > 12 ||
      (parseInt(year, 10) === currentYear &&
        parseInt(month, 10) < currentMonth) ||
      parseInt(year, 10) < currentYear
    ) {
      expirationDateInput.classList.add("error"); // Agrega la clase de error para resaltar el campo
    } else {
      expirationDateInput.classList.remove("error"); // Remueve la clase de error si la fecha es válida
    }
  } else {
    expirationDateInput.classList.remove("error"); // Remueve la clase de error si la fecha ingresada no es válida
  }
});
