<link rel="stylesheet" href="../css/agregaproductos.css"> 

<h1 class="title">Registrar Productos</h1>

<form action="agregar_productos_conexion.php" method="POST" class="form-producto">
  <label for="nombre">Nombre del Producto:</label>
  <input type="text" name="nombre" required>
  <br><br>

  <label for="precio">Precio:</label>
  <input type="number" step="0.01" name="precio" required>
  <br><br>

  <label for="stock">Cantidad:</label>
  <input type="number" name="stock" step="0.01" required>
  <br><br>

  <button type="submit" class="btn">Agregar Producto</button>
</form>

<a href="../index.php" class="btn btn-inicio">Volver al Inicio</a>
