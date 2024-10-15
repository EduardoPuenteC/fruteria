<?php
include '../conexion.php';

$query = "SELECT * FROM usuarios";
$result = $conexion->query($query);
echo '<button onclick="history.back()" class="btn">Volver Atrás</button>';
echo "<table border='1'>
<tr>
  <th>ID</th>
  <th>Nombre</th>
  <th>Email</th>
  <th>Rol</th>
  <th>Acción</th>
</tr>";

while ($usuario = $result->fetch_assoc()) {
    echo "<tr>
        <td>{$usuario['id']}</td>
        <td>{$usuario['nombre']}</td>
        <td>{$usuario['email']}</td>
        <td>{$usuario['rol']}</td>
        <td>
          <form action='editar_usuario.php' method='GET' style='display:inline-block;'>
            <input type='hidden' name='id' value='{$usuario['id']}'>
            <button type='submit'>Editar</button>
          </form>
          <form action='eliminar_usuario.php' method='POST' style='display:inline-block;'>
            <input type='hidden' name='id' value='{$usuario['id']}'>
            <button type='submit' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este usuario?\");'>Eliminar</button>
          </form>
        </td>
      </tr>";
}
echo "</table>";
echo '<a href="../index.php" class="btn">Volver al Inicio</a>';
?>
