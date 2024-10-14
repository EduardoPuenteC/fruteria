<?php
include '../conexion.php';

$query = "SELECT * FROM productos";
$result = $conexion->query($query);

echo "<table border='1'>
<tr>
  <th>ID</th>
  <th>Nombre</th>
  <th>Precio</th>
  <th>Cantidad</th>
  <th>Acción</th>
</tr>";

while ($producto = $result->fetch_assoc()) {
    echo "<tr>
        <td>{$producto['id']}</td>
        <td>{$producto['nombre']}</td>
        <td>{$producto['precio']}</td>
        <td>{$producto['stock']}</td>
        <td>
          <form action='editar_producto.php' method='GET' style='display:inline-block;'>
            <input type='hidden' name='id' value='{$producto['id']}'>
            <button type='submit'>Editar</button>
          </form>
          <form action='eliminar_producto.php' method='POST' style='display:inline-block;'>
            <input type='hidden' name='id' value='{$producto['id']}'>
            <button type='submit' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este producto?\");'>Eliminar</button>
          </form>
        </td>
      </tr>";
}
echo "</table>";
?>
