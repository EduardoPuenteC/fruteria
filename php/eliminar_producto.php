<?php
include '../conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    $query = "DELETE FROM productos WHERE id = $id";

    if ($conexion->query($query) === TRUE) {
        echo "Producto eliminado con éxito.";
    } else {
        echo "Error al eliminar producto: " . $conexion->error;
    }
}
?>
