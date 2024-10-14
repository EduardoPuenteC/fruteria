<?php
include '../conexion.php';

$query = "
    SELECT ventas.id, productos.nombre AS nombre_producto, ventas.cantidad, ventas.total, ventas.fecha
    FROM ventas
    JOIN productos ON ventas.id_producto = productos.id
";

$result = $conexion->query($query);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID Venta</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Total</th>
                <th>Fecha</th>
            </tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['nombre_producto']}</td>
                <td>{$row['cantidad']}</td>
                <td>{$row['total']}</td>
                <td>{$row['fecha']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No hay ventas registradas.";
}
?>
