<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe de ventas</title>
    <link rel="stylesheet" href="../../../css/estilosinventario.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

    <style>
        .titulo {
            text-align: center;
            margin-bottom: 10px;
            font-size: x-large;
            font-weight: 800;
        }
        .tableHead{
            display: flex;
            width: 100%;
            justify-content: space-around;
            font-weight: 900;
        }
        .rowProducto {
            display: flex;
            width: 100%;
            justify-content: space-around;
            font-weight: 600;
        }
    </style>
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
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Producto/inventario.php">
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
                <li class="nav-item">
                    <a class="nav-link" href="../ventas/venta.php">
                        <i class="fa fa-money" aria-hidden="true">
                            <span class="badge badge-danger"></span>
                        </i>
                        Venta
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">
                        <i class="fa fa-money" aria-hidden="true">
                            <span class="badge badge-danger"></span>
                        </i>
                        Informe de ventas
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

    <div class="contenedor_informe">
        <h2>Ventas</h2>
        <div class="tabla_seccion">
            <table>
                <thead>
                    <tr>
                        <!-- <th>Identificador</th> -->
                        <th>Medio de pago</th>
                        <th>Cliente</th>
                        <th>Costo</th>
                        <th>Fecha</th>
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

                    $sql = "SELECT 
ID_VENTA AS IDENTIFICADOR,
tipo_ventas.TIPO_VENTA AS MEDIO_PAGO,
clientes.nombre AS CLIENTE,
COSTO_TOTAL AS COSTO,
FECHA_VENTA AS FECHA
FROM ventas
INNER JOIN tipo_ventas ON ventas.IDX_TIPO_VENTA = tipo_ventas.ID_TIPO_VENTA
INNER JOIN clientes on ventas.IDX_CLIENTE = clientes.id_cliente";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Mostrar los datos en la tabla
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            // echo "<td>" . $row['IDENTIFICADOR'] . "</td>";
                            echo "<td>" . $row['MEDIO_PAGO'] . "</td>";
                            echo "<td>" . $row['CLIENTE'] . "</td>";
                            echo "<td>" . $row['COSTO'] . "</td>";
                            echo "<td>" . $row['FECHA'] . "</td>";

                            echo "<td>";
                            echo "<button onclick='abrirVentanaEmergente(" . $row['IDENTIFICADOR'] . ")' ><i class='fa fa-eye' aria-hidden='true'><span class='badge badge-danger'></span></i></button>";
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

    <div id="contenedorModal">
        <div id="formularioProductos">
            <form>
                <div class="titulo">
                    Productos comprados
                </div>
                <div class="tableHead">
                    <p>Cantidad</p>
                    <p>Producto</p>
                    <p>Costo</p>
                </div>
                <div id="contenedorProductos">

                </div>

                <button type="button" onclick="cerrarVentanaEmergente()">Cerrar</button>

            </form>
        </div>
    </div>
</body>
<script src="../js/scripts_informe_ventas.js"></script>

</html>