<?php
// Conexión a la base de datos (debes tener tus credenciales correctas aquí)
$conn = mysqli_connect("localhost", "root", "", "fondacrud");
// Verificar la conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Recuperar el ID del producto a editar
$id_categoria = $_POST['id_categoria'];
$nombre = $_POST['nombre'];


// Consulta SQL para editar el producto
$sql = "UPDATE categorias SET Nombre = '$nombre' WHERE ID_Categoria = $id_categoria";

if (mysqli_query($conn, $sql)) {
    echo "Categoria actualizada correctamente";
} else {
    echo "Error al actualizar la categoria: " . mysqli_error($conn);
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>