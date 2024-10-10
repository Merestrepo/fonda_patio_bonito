<?php

include 'conexion_be.php';


$nombre_completo = $_POST['nombre_completo'];
$correo = $_POST['correo'];
$usario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

//Encriptar contraseña
// $contrasena = hash('sha512', $contrasena);

$query = "INSERT INTO usuarios(nombre_completo, correo, usuario, contrasena) 
          VALUES('$nombre_completo', '$correo', '$usario', '$contrasena')";

//verfificación que el correo no se repita en BD
$verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo'");

if(mysqli_num_rows($verificar_correo) > 0 ){
    echo '
    <script>
    alert("Este correo ya se encuentra registrado");
    window.location = "../index.php";
</script>
    ';
    exit();
}

//verfificación que el usuario no se repita en BD
$verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario='$usario'");

if(mysqli_num_rows($verificar_usuario) > 0 ){
    echo '
    <script>
    alert("Este usuario ya se encuentra registrado");
    window.location = "../index.php";
</script>
    ';
    exit();
}


$ejecutar = mysqli_query($conexion, $query);

if($ejecutar){
    echo '
    <script>
            alert("Usuario creado exitosamente");
            window.location = "../index.php";
    </script>
    
    ';
}else{
    echo '
    <script>
            alert("Intentalo de nuevo, usuario incorrecto");
            window.location = "../index.php";
    </script>
    
    ';

}

mysqli_close($conexion);

?>