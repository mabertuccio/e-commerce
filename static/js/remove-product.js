document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll(".remove-button").forEach((button) => {
    button.addEventListener("click", () => {
      const productId = button.getAttribute("data-id");

      // Eliminar del DOM
      document.getElementById(`product-${productId}`).remove();
    });
  });
});
