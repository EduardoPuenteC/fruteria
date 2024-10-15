<?php
include '../conexion.php';

$busqueda = isset($_GET['busqueda']) ? $_GET['busqueda'] : '';

$query = "SELECT * FROM productos WHERE nombre LIKE '%$busqueda%'";
$result = $conexion->query($query);
echo '<button onclick="history.back()" class="btn">Volver Atrás</button>';
echo "<table border='1'>
<tr>
  <th>ID</th>
  <th>Nombre</th>
  <th>Precio</th>
  <th>Cantidad</th>
  <th>Acción</th>
</tr>";

?>
<form method="GET" action="">
  <input type="text" name="busqueda" placeholder="Buscar producto" value="<?php echo htmlspecialchars($busqueda); ?>">
  <button type="submit">Buscar</button>
</form>  
<?php

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
          
        </td>
      </tr>";
}
echo "</table>";
echo '<a href="../index.php" class="btn">Volver al Inicio</a>';
?>
