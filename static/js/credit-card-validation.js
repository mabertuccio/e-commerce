const cardNumberInput = document.getElementById("card-number"); // Guarda el input
const cardLabel = document.getElementById("card-label"); // Guarda el label

// Agrega un evento de escucha para detectar cambios en el campo de entrada del número de tarjeta
cardNumberInput.addEventListener("input", () => {
  let cardNumber = cardNumberInput.value.replace(/\D/g, ""); // Elimina caracteres no numéricos

  // Verifica si la longitud del número de tarjeta excede los 16 dígitos
  if (cardNumber.length < 16) {
    cardNumberInput.classList.add("error"); // Agrega la clase 'error' para resaltar el campo
    cardLabel.textContent = "N° de Tarjeta:";
  } else {
    cardNumberInput.classList.remove("error"); // Remueve la clase 'error' para eliminar el resaltado
  }

  // Formatea el número de tarjeta con guiones cada 4 dígitos
  let formattedCardNumber = "";
  for (let i = 0; i < cardNumber.length && i < 16; i++) {
    if (i > 0 && i % 4 === 0) {
      formattedCardNumber += "-";
    }
    formattedCardNumber += cardNumber[i];
  }

  cardNumberInput.value = formattedCardNumber; // Actualiza el valor del input con el formato

  // Verifica si la longitud del número de tarjeta es exactamente 16 dígitos
  if (cardNumber.length === 16) {
    const firstFourDigits = parseInt(cardNumber.substring(0, 4), 10); // Obtiene los primeros 4 dígitos

    // Verifica si los primeros 4 dígitos son números
    if (!isNaN(firstFourDigits)) {
      if (firstFourDigits < 4000) {
        // Si los primeros 4 números son menores a 4000, se considera una tarjeta de crédito
        cardLabel.textContent = "N° de Tarjeta de Credito:";
      } else {
        // De lo contrario, se considera una tarjeta de débito
        cardLabel.textContent = "N° de Tarjeta de Debito:";
      }
    }
  } else {
    // Si la longitud del número de tarjeta no es exactamente 16 dígitos, muestra el texto predeterminado
    // cardLabel.textContent = "N° de Tarjeta:";
  }
});
