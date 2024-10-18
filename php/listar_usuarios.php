<link rel='stylesheet' type='text/css' href='../css/listarusuario.css'>

<?php
include '../conexion.php';

$busqueda = isset($_GET['busqueda']) ? $_GET['busqueda'] : '';

$query = "SELECT * FROM usuarios WHERE nombre LIKE '%$busqueda%'";
$result = $conexion->query($query);


echo "<h1 class='title'>Lista de Usuarios</h1>";


echo '<div style="text-align: center; margin-bottom: 20px;">';
echo '<form method="GET" action="" style="display: inline;">';
echo '<input type="text" name="busqueda" placeholder="Buscar usuario" value="' . htmlspecialchars($busqueda) . '">';
echo '<button type="submit" class="btn btn-buscar">Buscar</button>';
echo '</form>';
echo '</div>'; 

// Tabla de usuarios
echo "<table class='user-table'>
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
          <!-- Botón Editar -->
          <form action='editar_usuario.php' method='GET' style='display:inline-block;'>
            <input type='hidden' name='id' value='{$usuario['id']}'>
            <button type='submit' class='btn btn-editar'>Editar</button>
          </form>
          <!-- Botón Eliminar -->
          <form action='eliminar_usuario.php' method='POST' style='display:inline-block;'>
            <input type='hidden' name='id' value='{$usuario['id']}'>
            <button type='submit' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este usuario?\");' class='btn btn-eliminar'>Eliminar</button>
          </form>
        </td>
      </tr>";
}
echo "</table>";

echo '<div style="text-align: center; margin-top: 20px;">';
echo '<a href="../index.php" class="btn btninicio">Volver al Inicio</a>';
echo '</div>';
?>
