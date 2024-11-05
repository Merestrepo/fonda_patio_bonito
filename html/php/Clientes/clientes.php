<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
    <link rel="stylesheet" href="../../../css/estilosClientes.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-icon-top navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Bienvenido</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="../bienvenida.php">
                    <i class="fa fa-home"></i>
                    Inicio
                    <span class="sr-only">(current)</span>
                </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="../Producto/inventario.php">
                        <i class="fa fa-file-text" aria-hidden="true">
                            <span class="badge badge-danger"></span>
                        </i>
                        Inventario
                    </a>
                </li>
                
                <li class="nav-item active">
                    <a class="nav-link" href="clientes.php">
                        <i class="fa fa-users" aria-hidden="true">
                            <span class="badge badge-danger"></span>
                        </i>
                        Clientes
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Categoria/categorias.php">
                        <i class="fa fa-archive" aria-hidden="true">
                            <span class="badge badge-danger"></span>
                        </i>
                        Categorías
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../ventas/venta.php">
                        <i class="fa fa-money" aria-hidden="true">
                            <span class="badge badge-danger"></span>
                        </i>
                        Venta
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../../index.php">
                        <i class="fa fa-sign-out" aria-hidden="true">
                            <span class="badge badge-success"></span>
                        </i>
                        Salir
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="formularioAgregarclientes">
        <button id="btnDesplegarFormulario" onclick="abrirVentanaEmergente(true)">Agregar cliente</button>
        <div id="contenedorModal">
            <div id="formularioProductos">
                <form action="agregar_cliente.php" method="post">
                    <!-- Campos del formulario -->
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required>
                    <label for="telefono">Telefono</label>
                    <input type="text" id="telefono" name="telefono" required>
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" required>
                    <label for="Deuda">Deuda</label>
                    <input type="text" id="Deuda" name="Deuda" required>
                
                    <button type="button" onclick="cerrarVentanaEmergente()">Cerrar</button>
                    <button type="button" id="btnAgregarclientes" onclick="agregarclientes()">Agregar</button>
                    <button type="button" id="btnEditarclientes" onclick="editarclientes()">Editar</button>

                </form>
            </div>
        </div>
    </div>

    <div class="filtro">
        <!-- Contenido del filtro -->
    </div>

    <div class="contenedor_clientes">
        <h2>Detalle de clientes</h2>
        <div class="tabla_seccion">
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        
                        <th>Email</th>
                        <th>Debe</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    // Consulta SQL para obtener todos los clientes
                    $servername = "localhost";
                    $username = "nombre_usuario";
                    $password = "contraseña";
                    $dbname = "nombre_base_de_datos";

                    // Crear conexión
                    $conn = mysqli_connect("localhost", "root", "", "fondacrud");

                    $sql = "SELECT id_cliente,nombre, telefono, email, Deuda FROM clientes";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Mostrar los datos en la tabla
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['nombre'] . "</td>";
                            
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['Deuda'] . "</td>";

                            echo "<td>";
                            echo "<button onclick='abrirVentanaEmergente(false, " . $row['id_cliente'] . ",\"" . $row['nombre'] . "\",\"" . $row['telefono'] . "\",\"" . $row['email'] . "\"," . $row['Deuda'] . ")' ><i class='fa fa-pencil-square-o' aria-hidden='true'><span class='badge badge-danger'></span></i></button>";
                            echo "<button onclick='eliminarcliente(" . $row['id_cliente'] . ")'><i class='fa fa-trash' aria-hidden='true'><span class='badge badge-danger'></span></i></button>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "0 resultados";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="../js/scripts_clientes.js"></script>
</body>

</html>