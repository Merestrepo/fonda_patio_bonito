<?php
// Conexión a la base de datos (debes tener tus credenciales correctas aquí)
$conn = mysqli_connect("localhost", "root", "", "fondacrud");
// Verificar la conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Recuperar el ID del producto a eliminar
$id_cliente = $_POST['id_cliente'];

// Consulta SQL para eliminar el producto
$sql = "DELETE FROM clientes WHERE id_cliente = $id_cliente";

if (mysqli_query($conn, $sql)) {
    echo "Cliente eliminado correctamente";
} else {
    echo "Error al eliminar el cliente: " . mysqli_error($conn);
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>