<?php
include '../conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $rol = $_POST['rol'];

    // Actualizar la contraseña solo si se proporcionó una nueva
    if (!empty($_POST['password'])) {
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $query = "UPDATE usuarios SET nombre = '$nombre', email = '$email', password = '$password', rol = '$rol' WHERE id = $id";
    } else {
        $query = "UPDATE usuarios SET nombre = '$nombre', email = '$email', rol = '$rol' WHERE id = $id";
    }

    if ($conexion->query($query) === TRUE) {
        echo "Usuario actualizado con éxito.";
    } else {
        echo "Error: " . $conexion->error;
    }
}
?>