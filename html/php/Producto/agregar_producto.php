<?php
// Conexión a la base de datos (debes tener tus credenciales correctas aquí)
$conn = mysqli_connect("localhost", "root", "", "fondacrud");
// Verificar la conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Recuperar los datos del formulario
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$cantidad = $_POST['cantidad'];
$precio = $_POST['precio'];
$categoria = $_POST['categoria'];

// Consulta SQL para insertar el producto
$sql = "INSERT INTO productos (Nombre, Descripcion, Cantidad, Precio, ID_Categoria)
        VALUES ('$nombre', '$descripcion', '$cantidad', '$precio', '$categoria')";

if (mysqli_query($conn, $sql)) {
    echo "Producto agregado correctamente";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>
