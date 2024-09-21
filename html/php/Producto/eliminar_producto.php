<?php
// Conexión a la base de datos (debes tener tus credenciales correctas aquí)
$conn = mysqli_connect("localhost", "root", "", "fondacrud");
// Verificar la conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Recuperar el ID del producto a eliminar
$id_producto = $_POST['ID_Producto'];

// Consulta SQL para eliminar el producto
$sql = "DELETE FROM productos WHERE ID_Producto = $id_producto";

if (mysqli_query($conn, $sql)) {
    echo "Producto eliminado correctamente";
} else {
    echo "Error al eliminar el producto: " . mysqli_error($conn);
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>