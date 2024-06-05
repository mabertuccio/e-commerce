document.addEventListener("DOMContentLoaded", function () {
  // Función para actualizar la cantidad y el precio
  function updateQuantityAndPrice(input, increment) {
    const unitPrice = parseFloat(input.getAttribute("data-price"));
    const productId = input.getAttribute("data-id");
    let newQuantity = parseInt(input.value) + increment;

    // Obtener la cantidad máxima permitida
    const maxQuantity = parseInt(input.getAttribute("max"));

    // Comprobar si el nuevo valor excede la cantidad máxima permitida
    if (newQuantity < 1) {
      newQuantity = 1;
    } else if (newQuantity > maxQuantity) {
      newQuantity = maxQuantity;
    }

    // Actualizar la cantidad en el input
    input.value = newQuantity;

    // Actualizar el precio en el DOM
    const totalPriceElement = document.getElementById("price-" + productId);
    const newTotalPrice = unitPrice * newQuantity;
    totalPriceElement.innerText = "$" + newTotalPrice.toFixed(2);

    // Actualizar el carrito en el servidor
    updateCart(productId, newQuantity);
  }

  // Manejar incremento
  const incrementBtns = document.querySelectorAll("#increment-btn");
  incrementBtns.forEach(function (btn) {
    btn.addEventListener("click", function () {
      const input = document.querySelector(
        `.quantity-input[data-id='${btn.getAttribute("data-id")}']`
      );
      updateQuantityAndPrice(input, 1);
    });
  });

  // Manejar decremento
  const decrementBtns = document.querySelectorAll("#decrement-btn");
  decrementBtns.forEach(function (btn) {
    btn.addEventListener("click", function () {
      const input = document.querySelector(
        `.quantity-input[data-id='${btn.getAttribute("data-id")}']`
      );
      updateQuantityAndPrice(input, -1);
    });
  });

  // Función para actualizar el carrito en el servidor
  function updateCart(productId, quantity) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "../controllers/update-cart.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
        console.log("Carrito actualizado");
        // No recargar la página después de actualizar el carrito
        window.location.reload();
      }
    };
    xhr.send("product_id=" + productId + "&quantity=" + quantity);
  }
});
