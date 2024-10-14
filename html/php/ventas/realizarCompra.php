<?php
$conexion = mysqli_connect("localhost", "root", "", "fondacrud");
// Verificar la conexión
if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Recuperar los datos del formulario
$cliente = $_POST['cliente'];
$tipo_venta = $_POST['tipo_venta'];
$total = $_POST['total'];
$productos = json_decode($_POST['carrito']);
$fecha = date('d-m-Y h:i:s');

$sql = "INSERT INTO ventas (IDX_TIPO_VENTA, IDX_CLIENTE, COSTO_TOTAL) VALUES ('$tipo_venta', '$cliente', '$total')";
if ($conexion->query($sql) === TRUE) {
    $ultimo_id = $conexion->insert_id;

    foreach ($productos as $producto) { // Usa foreach para recorrer objetos
        // Accede a las propiedades del objeto
        $id_producto = $producto->ID_Producto;
        $cantidad = $producto->cantidad;

        // Ahora construye tu consulta SQL
        $sql_detalle = "INSERT INTO detalle_ventas (IDX_PRODUCTO, IDX_VENTA, CANTIDAD) VALUES ('$id_producto', '$ultimo_id', '$cantidad')";
        
        // Ejecuta la consulta del detalle (asegúrate de manejar errores)
        if ($conexion->query($sql_detalle) === FALSE) {
            echo "Error: " . $conexion->error;
        }
    }
    echo "Venta realizada correctamente";

}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);

?>