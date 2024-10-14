<?php
include '../conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['stock'];

    $query = "UPDATE productos SET nombre = '$nombre', precio = '$precio', stock = '$cantidad' WHERE id = $id";

    if ($conexion->query($query) === TRUE) {
        echo "Producto actualizado con éxito.";
    } else {
        echo "Error: " . $conexion->error;
    }
}
?>
