<link rel="stylesheet" href="../css/listarproductos.css"> 
<?php
include '../conexion.php';

$busqueda = isset($_GET['busqueda']) ? $_GET['busqueda'] : '';

$query = "SELECT * FROM productos WHERE nombre LIKE '%$busqueda%'";
$result = $conexion->query($query);

echo "<h1 class='title'>Lista de Productos</h1>";
echo '<div style="text-align: center; margin-bottom: 20px;">';
echo '<form method="GET" action="" style="display: inline;">';
echo '<input type="text" name="busqueda" placeholder="Buscar producto" value="' . htmlspecialchars($busqueda) . '">';
echo '<button type="submit" class="btn btn-buscar">Buscar</button>';
echo '</form>';
echo '</div>'; 


// Tabla de usuarios
echo "<table border='1'  id ='tabla-productos'>
<tr>
  <th>ID</th>
  <th>Nombre</th>
  <th>Precio</th>
  <th>Cantidad (Kg)</th>
  <th class='no-imprimir'>Acción</th>

</tr>";

while ($producto = $result->fetch_assoc()) {
    echo "<tr>
        <td>{$producto['id']}</td>
        <td>{$producto['nombre']}</td>
        <td>{$producto['precio']}</td>
        <td>{$producto['stock']}</td>
        <td class='no-imprimir'>
          <!-- Botón Editar -->
          <form action='editar_producto.php' method='GET' style='display:inline-block;'>
            <input type='hidden' name='id' value='{$producto['id']}'>
            <button type='submit' class='btn btn-editar'>Editar</button>
          </form>
          <!-- Botón Eliminar -->
          
        </td>
      </tr>";
}
echo "</table>";

echo '<div style="text-align: center;">';
echo '<a href="../index.php" class="btn btn-eliminar">Volver al Inicio</a>';
echo '</div>';

echo '<button class="btn btn-inicio" onclick="imprimirTabla()" class="btn">Imprimir Tabla</button>';

?>
<script>
// Función para imprimir la tabla de productos sin la columna de Acción
function imprimirTabla() {
    const tabla = document.getElementById('tabla-productos').cloneNode(true);

    // Eliminar la columna de Acción incluyendo encabezado
    const columnasNoImprimir = tabla.querySelectorAll('.no-imprimir');
    columnasNoImprimir.forEach(columna => columna.remove());

    const encabezadoNoImprimir = tabla.querySelector('th.no-imprimir');
    if (encabezadoNoImprimir) encabezadoNoImprimir.remove();

    const contenido = `
        <center>
        <h1>Lista de Productos</h1>
        ${tabla.outerHTML}
        </center>
    `;

    const ventana = window.open('', '_blank');
    ventana.document.write('<html><head><title>Imprimir Tabla</title></head><body>');
    ventana.document.write(contenido);
    ventana.document.write('</body></html>');
    ventana.document.close();
    ventana.focus();
    ventana.print();
    ventana.close();
}
</script>