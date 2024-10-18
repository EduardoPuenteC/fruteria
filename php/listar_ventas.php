<link rel="stylesheet" href="../css/listarventas.css"> 
<?php
include '../conexion.php';

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

// Consulta para obtener las ventas
$query = "
    SELECT ventas.id, productos.nombre AS nombre_producto, ventas.cantidad, ventas.total, ventas.fecha
    FROM ventas
    JOIN productos ON ventas.id_producto = productos.id
    WHERE 
        productos.nombre LIKE '%$busqueda%'
    ORDER BY ventas.id ASC
    ";

$result = $conexion->query($query);

echo '<br>
    <h1 class="title">Listar Ventas</h1>
    <br>';


if ($result->num_rows > 0) {
    // Formulario de búsqueda
    echo '<form method="GET" action="">';
    echo '<input type="text" name="busqueda" placeholder="Buscar ventas" value="' . htmlspecialchars($busqueda) . '">';
    echo '<button type="submit">Buscar</button>';
    echo '</form>';

    // Tabla de ventas
    echo "<table>
            <tr>
                <th>ID Venta</th>
                <th>Producto</th>
                <th>Cantidad (Kg)</th>
                <th>Total</th>
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
    <form action='editar_venta.php' method='GET' style='display: inline; margin-right: 10px;'>
        <input type='hidden' name='id' value='{$row['id']}'>
        <button type='submit'>Editar</button>
    </form>
    <button onclick='imprimirFila({$row['id']}, \"{$row['nombre_producto']}\", {$row['cantidad']}, {$row['total']}, \"{$row['fecha']}\")'>
        Imprimir
    </button>
</td>




              </tr>";
    }
    echo "</table>";
    
    // Tabla de totales
    echo "<table class='table-totales'>
            <tr>
                <th>Total ganado en ventas</th>
                <th>Total gastado en compras</th>
                <th>Ganancia total</th>
                
            </tr>
            <tr>
                <td>$" . number_format($total_ventas, 2) . "</td>
                <td>$" . number_format($total_compras, 2) . "</td>
                <td>$" . number_format($ganancia_total, 2) . "</td>
            </tr>
          </table>";
          
    echo '<button class="btn-inicio"><a style="color: white; text-decoration: none;" href="../index.php">Volver al Inicio</a></button>';
} else {
    echo "No hay ventas registradas.";
}

$conexion->close();
?>
<script>
// Función para imprimir los datos de una fila
function imprimirFila(id, producto, cantidad, total, fecha) {
    const contenido = `
        <center>
        <h1>Información de la Venta</h1>
        <p><strong>ID Venta:</strong> ${id}</p>
        <p><strong>Producto:</strong> ${producto}</p>
        <p><strong>Cantidad:</strong> ${cantidad}</p>
        <p><strong>Total:</strong> $${total.toFixed(2)}</p>
        <p><strong>Fecha:</strong> ${fecha}</p>
        </center>
    `;

    const ventana = window.open('', '_blank');
    ventana.document.write('<html><head><title>Imprimir Venta</title></head><body>');
    ventana.document.write(contenido);
    ventana.document.write('</body></html>');
    ventana.document.close();
    ventana.focus();
    ventana.print();
    ventana.close();
}
</script>