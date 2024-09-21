<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
    <link rel="stylesheet" href="../../../css/estilosinventario.css">
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
                <a class="nav-link" href="../bienvenida.php">
                    <i class="fa fa-home"></i>
                    Inicio
                </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="inventario.php">
                        <i class="fa fa-file-text" aria-hidden="true">
                            <span class="badge badge-danger"></span>
                        </i>
                        Inventario
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="../Clientes/clientes.php">
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

    <div class="formularioAgregarProductos">
        <button id="btnDesplegarFormulario" onclick="abrirVentanaEmergente(true)">Agregar Producto</button>
        <div id="contenedorModal">
            <div id="formularioProductos">
                <form action="agregar_producto.php" method="post">
                    <!-- Campos del formulario -->
                    <label for="nombre">Nombre del Producto:</label>
                    <input type="text" id="nombre" name="nombre" required>
                    <label for="descripcion">Descripción</label>
                    <input type="text" id="descripcion" name="descripcion" required>
                    <label for="cantidad">Cantidad</label>
                    <input type="text" id="cantidad" name="cantidad" required>
                    <label for="precio">Precio:</label>
                    <input type="number" id="precio" name="precio" step="0.01" required>
                    <label for="categoria">Categoría:</label>

                    <?php
                    $servername = "localhost";
                    $username = "nombre_usuario";
                    $password = "contraseña";
                    $dbname = "nombre_base_de_datos";

                    // Crear conexión
                    $conn = mysqli_connect("localhost", "root", "", "fondacrud");

                    // Verificar conexión
                    if ($conn->connect_error) {
                        die("Conexión fallida: " . $conn->connect_error);
                    }

                    $sql = "SELECT ID_Categoria, Nombre FROM categorias";
                    $result = $conn->query($sql);

                    // Verificar si hay resultados
                    if ($result->num_rows > 0) {
                        // Crear el select
                        echo '<select id="categoria" name="categoria" required>';
                        while ($row = $result->fetch_assoc()) {
                            // Imprimir cada opción
                            echo '<option value="' . $row["ID_Categoria"] . '">' . $row["Nombre"] . '</option>';
                        }
                        echo '</select>';
                    } else {
                        echo '<select id="categoria" name="categoria">';
                        echo '</select>';
                    }
                    ?>
                    <button type="button" onclick="cerrarVentanaEmergente()">Cerrar</button>
                    <button type="button" id="btnAgregarProducto" onclick="agregarProducto()">Agregar</button>
                    <button type="button" id="btnEditarProducto" onclick="editarProducto()">Editar</button>

                </form>
            </div>
        </div>
    </div>

    <div class="filtro">
        <!-- Contenido del filtro -->
    </div>

    <div class="contenedor_productos">
        <h2>Detalle de productos</h2>
        <div class="tabla_seccion">
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Categoria</th>

                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    // Consulta SQL para obtener todos los productos
                    
                    $sql = "SELECT ID_Producto,productos.Nombre as Nombre, Descripcion, Cantidad, Precio,categorias.Nombre as Categoria,categorias.ID_Categoria FROM productos
                    INNER JOIN categorias ON productos.ID_Categoria = categorias.ID_Categoria";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Mostrar los datos en la tabla
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['Nombre'] . "</td>";
                            echo "<td>" . $row['Descripcion'] . "</td>";
                            echo "<td>" . $row['Cantidad'] . "</td>";
                            echo "<td>" . $row['Precio'] . "</td>";
                            echo "<td>" . $row['Categoria'] . "</td>";

                            echo "<td>";
                            echo "<button onclick='abrirVentanaEmergente(false, " . $row['ID_Producto'] . ",\"" . $row['Nombre'] . "\",\"" . $row['Descripcion'] . "\"," . $row['Cantidad'] . "," . $row['Precio'] . ",\"" . $row['ID_Categoria'] . "\")' ><i class='fa fa-pencil-square-o' aria-hidden='true'><span class='badge badge-danger'></span></i></button>";
                            echo "<button onclick='eliminarProducto(" . $row['ID_Producto'] . ")'><i class='fa fa-trash' aria-hidden='true'><span class='badge badge-danger'></span></i></button>";
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

    <script src="../js/script.js"></script>
</body>

</html>