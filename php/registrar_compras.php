<?php
include '../conexion.php';
?>

<link rel="stylesheet" href="../css/estilo.css"> 

<form action="registrar_compras_conexion.php" method="POST">
  <label for="producto">Producto:</label>
  <select name="id_producto" required>
    <?php
    $result = $conexion->query("SELECT * FROM productos");
    if ($result) {
        // Iterar sobre los resultados y crear opciones
        while ($producto = $result->fetch_assoc()) {
          echo "<option value='{$producto['id']}' data-precio='{$producto['precio']}'>{$producto['nombre']} - Stock: {$producto['stock']}</option>";
        }
    } else {
        echo "<option disabled>No hay productos disponibles</option>";
    }
    ?>
  </select>

  <label for="cantidad">Cantidad:</label>
  <input type="number" name="cantidad" required>

  <label for="precio_compra">Precio de Compra:</label>
  <input type="number" step="0.01" name="precio_compra">
<button type="submit">Registrar Compra</button>
</form>