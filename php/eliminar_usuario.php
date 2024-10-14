<?php
include '../conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    $query = "DELETE FROM usuarios WHERE id = $id";

    if ($conexion->query($query) === TRUE) {
        echo "Usuario eliminado con éxito.";
    } else {
        echo "Error al eliminar usuario: " . $conexion->error;
    }
}
?>
