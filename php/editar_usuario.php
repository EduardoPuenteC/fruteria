<?php
include '../conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM usuarios WHERE id = $id";
    $result = $conexion->query($query);
    $usuario = $result->fetch_assoc();
}
?>

<form action="editar_usuario_conexion.php" method="POST">
  <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">

  <label for="nombre">Nombre:</label>
  <input type="text" name="nombre" value="<?php echo $usuario['nombre']; ?>" required>

  <label for="email">Correo Electrónico:</label>
  <input type="email" name="email" value="<?php echo $usuario['email']; ?>" required>

  <label for="password">Nueva Contraseña (dejar en blanco para no cambiarla):</label>
  <input type="password" name="password">

  <label for="rol">Rol:</label>
  <select name="rol" required>
    <option value="administrador" <?php if ($usuario['rol'] == 'administrador') echo 'selected'; ?>>Administrador</option>
    <option value="vendedor" <?php if ($usuario['rol'] == 'vendedor') echo 'selected'; ?>>Vendedor</option>
  </select>

  <button type="submit">Actualizar Usuario</button>
</form>
