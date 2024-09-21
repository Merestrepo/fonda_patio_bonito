<?php
// Conexión a la base de datos (debes tener tus credenciales correctas aquí)
$conn = mysqli_connect("localhost", "root", "", "fondacrud");
// Verificar la conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Recuperar el ID del cliente a editar
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$Deuda = $_POST['Deuda'];
$id_cliente = $_POST['id_cliente'];


// Consulta SQL para editar el cliente
$sql = "UPDATE clientes SET nombre ='$nombre',telefono ='$telefono',email ='$email',Deuda ='$Deuda' WHERE id_cliente = $id_cliente";


if (mysqli_query($conn, $sql)) {
    echo "Cliente actualizado correctamente";
} else {
    echo "Error al actualizar el cliente: " . mysqli_error($conn);
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>