<?php
include '../conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];

    // Verificar si el producto ya existe
    $query_verificacion = "SELECT * FROM productos WHERE nombre = '$nombre'";
    $resultado = $conexion->query($query_verificacion);

    if ($resultado->num_rows > 0) {
        echo "Error: Ya existe un producto con el nombre '$nombre'.";
    } else {
        // Si el producto no existe, proceder a la inserción
        $query = "INSERT INTO productos (nombre, precio, stock) VALUES ('$nombre', $precio, $stock)";
        
        if ($conexion->query($query) === TRUE) {
            echo "Producto agregado correctamente.";
        } else {
            echo "Error al agregar el producto: " . $conexion->error;
        }
    }
}
?>
