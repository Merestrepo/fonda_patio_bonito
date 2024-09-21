<?php
// Conexión a la base de datos (debes tener tus credenciales correctas aquí)
$conn = mysqli_connect("localhost", "root", "", "fondacrud");
// Verificar la conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Recuperar el ID del producto a editar
$id_producto = $_POST['id_producto'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$cantidad = $_POST['cantidad'];
$precio = $_POST['precio'];
$categoria = $_POST['categoria'];

// Consulta SQL para editar el producto
$sql = "UPDATE productos SET Nombre ='$nombre',Descripcion='$descripcion',Cantidad ='$cantidad',Precio='$precio',ID_Categoria='$categoria' WHERE ID_Producto = $id_producto";

if (mysqli_query($conn, $sql)) {
    echo "Producto actualizado correctamente";
} else {
    echo "Error al actualizar el producto: " . mysqli_error($conn);
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>