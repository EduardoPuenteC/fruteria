<?php
include '../conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    $query = "DELETE FROM ventas WHERE id = $id";

    if ($conexion->query($query) === TRUE) {
        echo "Venta eliminada con éxito.";
    } else {
        echo "Error al eliminar venta: " . $conexion->error;
    }
}
?>
