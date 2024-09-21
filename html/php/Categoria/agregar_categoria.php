<?php
// Conexión a la base de datos (debes tener tus credenciales correctas aquí)
$conn = mysqli_connect("localhost", "root", "", "fondacrud");
// Verificar la conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Recuperar los datos del formulario
$nombre = $_POST['nombre'];

// Consulta SQL para insertar el producto
$sql = "INSERT INTO categorias (Nombre)
        VALUES ('$nombre')";

if (mysqli_query($conn, $sql)) {
    echo "Categoria agregado correctamente";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>
