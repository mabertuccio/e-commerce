document
  .getElementById("checkout-button")
  .addEventListener("click", function (e) {
    e.preventDefault();
    // Verifica si todos los campos requeridos están completos
    if (
      document.getElementById("name").value === "" ||
      document.getElementById("dni").value === "" ||
      document.getElementById("card-number").value === "" ||
      document.getElementById("expiration-date").value === "" ||
      document.getElementById("cvv").value === ""
    ) {
      // Si algún campo está vacío, muestra un mensaje de error en el div
      document.getElementById("checkout-validation").style.display = "block";
    } else {
      // Si todos los campos están completos, muestra el modal de confirmación
      document.getElementById("confirm-modal").style.display = "block";
    }
  });

document
  .getElementsByClassName("close")[0]
  .addEventListener("click", function (e) {
    e.preventDefault();
    document.getElementById("confirm-modal").style.display = "none";
  });

document.getElementById("confirm-no").addEventListener("click", function (e) {
  e.preventDefault();
  document.getElementById("confirm-modal").style.display = "none";
});

document.getElementById("confirm-yes").addEventListener("click", function () {
  const date = getCurrentDate();
  const grandtotal = getGrandTotal();

  const billData = {
    date: date,
    grandtotal: grandtotal,
  };

  const xhr = new XMLHttpRequest();
  xhr.open("POST", "../controllers/finish-purchase.php", true);
  xhr.setRequestHeader("Content-Type", "application/json");
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 2 && xhr.status === 200) {
      console.log("Factura guardada con éxito");
      window.location.reload();
    }
  };

  xhr.send(JSON.stringify(billData));
});

function getCurrentDate() {
  const date = new Date();
  return date.toISOString().slice(0, 19).replace("T", "");
}

function getUserId() {}

function getGrandTotal() {
  return parseFloat(
    document.getElementById("grand-total").innerText.replace("$", "")
  );
}
