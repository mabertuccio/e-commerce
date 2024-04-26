<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Modificar Producto</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container mx-auto my-3">
  <div class="col-8">
    <form id="productForm" class="needs-validation" novalidate>
      <div>
        <div class="d-flex justify-content-center" style="height: 230px">
          <!-- Avatar component goes here -->
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 mb-3">
          <label for="name">Nombre del producto</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" required minlength="3" maxlength="18">
          <div class="valid-feedback">Válido!</div>
          <div class="invalid-feedback">Debe ingresar un nombre válido!</div>
        </div>
        <div class="col-md-12 mb-3">
          <label for="tradeMark">Marca</label>
          <input type="text" class="form-control" id="tradeMark" name="tradeMark" placeholder="Marca" required minlength="4">
          <div class="valid-feedback">Válido!</div>
          <div class="invalid-feedback">Debe ingresar una marca!</div>
        </div>
        <div class="col-md-12 mb-3">
          <label for="description">Descripción</label>
          <textarea class="form-control" id="description" name="description" rows="4" placeholder="Descripción del producto"></textarea>
        </div>
        <div class="col-md-12 mb-3">
          <label for="qty">Stock</label>
          <input type="text" class="form-control" id="qty" name="qty" placeholder="Stock" required pattern="[0-9]*">
          <div class="valid-feedback">Válido!</div>
          <div class="invalid-feedback">Debe ingresar una cantidad válida!</div>
        </div>
        <div class="col-md-12 mb-3">
          <label for="price">Precio</label>
          <input type="number" class="form-control" id="price" name="price" placeholder="Precio" required min="0.01" step="0.01">
          <div class="valid-feedback">Válido!</div>
          <div class="invalid-feedback">Debe ingresar un precio válido!</div>
        </div>
      </div>
      <button type="submit">Registrar</button>
    </form>
  </div>
</div>
<script src="script.js"></script>
</body>
</html>
