<?php
include '../conexion.php'; // Incluye el archivo de conexión

// Consulta para obtener las ventas junto con los nombres de los productos
$query = "
    SELECT 
        ventas.id, 
        productos.nombre AS nombre_producto, 
        ventas.cantidad, 
        ventas.total, 
        ventas.fecha
    FROM 
        ventas
    JOIN 
        productos ON ventas.id_producto = productos.id
    ORDER BY 
        ventas.fecha DESC
";

$result = $conexion->query($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Lista de Ventas</title>
</head>
<body>
    <h1>Lista de Ventas</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Total</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($venta = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$venta['id']}</td>";
                    echo "<td>{$venta['nombre_producto']}</td>";
                    echo "<td>{$venta['cantidad']}</td>";
                    echo "<td>{$venta['total']}</td>";
                    echo "<td>{$venta['fecha']}</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No hay ventas registradas.</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <a href="index.php">Volver al menú principal</a>
</body>
</html>

<?php
$conexion->close(); // Cierra la conexión
?>
