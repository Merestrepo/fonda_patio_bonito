<?php 
$infoProductos = null;
$id = $_POST['id'];

$conn = mysqli_connect("localhost", "root", "", "fondacrud");
// Verificar la conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

$sql = "SELECT 
IDX_VENTA,
detalle_ventas.CANTIDAD,
productos.Nombre,
productos.Precio

FROM detalle_ventas
INNER JOIN productos ON detalle_ventas.IDX_PRODUCTO = productos.ID_Producto
WHERE IDX_VENTA = $id;";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    
    echo $row['IDX_VENTA'];
    echo '-';
    echo $row['CANTIDAD'];
    echo '-';
    echo $row['Nombre'];
    echo '-';
    echo $row['Precio'];
    echo ';';

    
}

?>