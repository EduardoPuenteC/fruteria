<?php
include '../conexion.php';

// Inicializa la variable de búsqueda
$busqueda = isset($_GET['busqueda']) ? $_GET['busqueda'] : '';

// Obtener total de ventas
$query_ventas = "
    SELECT SUM(total) AS total_ventas
    FROM ventas
    
";
$result_ventas = $conexion->query($query_ventas);
$total_ventas = $result_ventas->fetch_assoc()['total_ventas'] ?? 0;

// Obtener total de compras
$query_compras = "
    SELECT SUM(precio_compra * cantidad) AS total_compras
    FROM compras";
$result_compras = $conexion->query($query_compras);
$total_compras = $result_compras->fetch_assoc()['total_compras'] ?? 0;

// Calcular ganancia
$ganancia_total = $total_ventas - $total_compras;

// Consulta para obtener las compras
$query = "
    SELECT compras.id, productos.nombre AS nombre_producto, compras.cantidad, compras.precio_compra AS total, compras.fecha
    FROM compras
    JOIN productos ON compras.id_producto = productos.id
    WHERE 
        productos.nombre LIKE '%$busqueda%'
    ORDER BY compras.id ASC";

$result = $conexion->query($query);
    echo '<button onclick="history.back()" class="btn">Volver Atrás</button>';
if ($result->num_rows > 0) {
    ?>
    <form method="GET" action="">
    <input type="text" name="busqueda" placeholder="Buscar compra" value="<?php echo htmlspecialchars($busqueda); ?>">
    <button type="submit">Buscar</button>
    </form>  
<?php
    echo "<table border='1'>
            <tr>
                <th>ID Compra</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio de Compra</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['nombre_producto']}</td>
                <td>{$row['cantidad']}</td>
                <td>{$row['total']}</td>
                <td>{$row['fecha']}</td>
                <td>
                    <form action='editar_compra.php' method='GET' style='display:inline-block;'>
                        <input type='hidden' name='id' value='{$row['id']}'>
                        <button type='submit'>Editar</button>
                    </form>
                </td>
              </tr>";
    }
    echo "</table>";
    echo '<a href="../index.php" class="btn">Volver al Inicio</a>';

    // Mostrar el total de compras y la ganancia
    echo "<h3>Total gastado en compras: $" . number_format($total_compras, 2) . "</h3>";
    echo "<h3>Total ganado en ventas: $" . number_format($total_ventas, 2) . "</h3>";
    echo "<h3>Ganancia total: $" . number_format($ganancia_total, 2) . "</h3>";
} else {
    echo "No hay compras registradas.";
}

$conexion->close();
?>
