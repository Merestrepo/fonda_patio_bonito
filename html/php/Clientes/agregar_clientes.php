<?php
// Conexión a la base de datos (debes tener tus credenciales correctas aquí)
$conn = mysqli_connect("localhost", "root", "", "fondacrud");
// Verificar la conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Recuperar los datos del formulario
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$Deuda = $_POST['Deuda'];


// Consulta SQL para insertar el cliente
$sql = "INSERT INTO clientes (nombre, telefono, email, Deuda)
        VALUES ('$nombre', '$telefono', '$email', '$Deuda')";

if (mysqli_query($conn, $sql)) {
    echo "Cliente agregado correctamente";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>
