<?php
// Conexión a la base de datos (debes tener tus credenciales correctas aquí)
$conn = mysqli_connect("localhost", "root", "", "fondacrud");
// Verificar la conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Recuperar el ID del producto a eliminar
$id_categoria = $_POST['ID_Categoria'];

// Consulta SQL para eliminar el producto
$sql = "DELETE FROM categorias WHERE ID_Categoria = $id_categoria";

if (mysqli_query($conn, $sql)) {
    echo "Categoria eliminada correctamente";
} else {
    echo "Error al eliminar la categoria: " . mysqli_error($conn);
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>