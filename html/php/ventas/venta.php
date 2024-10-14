<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venta</title>
    <link rel="stylesheet" href="../../../css/estilosinventario.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
   
   <style>
        #contenedorCarrito {
            scrollbar-width: thin;
            scrollbar-color: #57616b #343a40;

            #contenedorCarritotitulo {
                height: 35px;
                text-align: center;
                font-weight: bold;
                background-color: #57616b;
                border-radius: 2px;
            }

            height: 200px;
            width: 90%;
            position: absolute;
            background-color: #343a40;
            right: 10px;
            bottom: 10px;
            resize: both;
            overflow: auto;
            color: white;
            border-radius: 5px;
            padding: 10px;

            .productoCarrito {
                display: flex;
                justify-content: space-between;
                align-items: center;
                border: .5px solid;
                margin: 5px;
                border-radius: 5px;
                padding: 2px;

                .productoInfo {
                    width: 40%;
                    display: flex;
                    justify-content: space-between;
                }

                button {
                    border: none;
                    background-color: white;
                    box-shadow: rgb(0 0 0 / 36%) 0px 1px 3px 0px, rgb(0 0 0 / 0%) 0px 1px 2px 0px;
                    border-radius: 3px;
                    height: 30px;
                }

                button:focus {
                    /* border: solid 1px red; */
                    outline: 0;
                    scale: 1.02;
                }
            }

            .comprarTotal {
                bottom: 5px;
                display: flex;
                width: 100%;
                height: 35px;
                text-align: center;
                font-weight: bold;
                background-color: #57616b;
                border-radius: 2px;
                justify-content: space-between;
                padding: 0 10px;
                margin-top: 10px;

                button {
                    border: none;
                    background-color: white;
                    box-shadow: rgb(0 0 0 / 36%) 0px 1px 3px 0px, rgb(0 0 0 / 0%) 0px 1px 2px 0px;
                    border-radius: 3px;
                    height: 30px;
                }

                button:focus {
                    /* border: solid 1px red; */
                    outline: 0;
                    scale: 1.02;
                }
            }
        }

        #contenedorProductos {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: flex-start;

            .producto {
                padding: 10px;
                box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px;
                margin: 5px;
                border-radius: 5px;
                width: 210px;
                display: flex;
                flex-direction: column;
                justify-content: space-between;

                .titulo {
                    width: 190px;
                    overflow: hidden;
                    white-space: nowrap;
                    text-overflow: ellipsis;

                    h2 {
                        text-overflow: ellipsis;
                        white-space: nowrap;
                        overflow: hidden;
                    }
                }

                .botones {
                    width: 100%;
                    display: flex;
                    justify-content: space-around;

                    button {
                        border: none;
                        background-color: white;
                        box-shadow: rgb(0 0 0 / 36%) 0px 1px 3px 0px, rgb(0 0 0 / 0%) 0px 1px 2px 0px;
                        border-radius: 3px;
                        height: 30px;
                    }

                    button:focus {
                        /* border: solid 1px red; */
                        outline: 0;
                        scale: 1.02;
                    }
                }
            }
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
                <li class="nav-item active">
                    <a class="nav-link" href="#">
                        <i class="fa fa-money" aria-hidden="true">
                            <span class="badge badge-danger"></span>
                        </i>
                        Venta
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../InformeVentas/informe-ventas.php">
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
    <script></script>
    <?php
    $conn = mysqli_connect("localhost", "root", "", "fondacrud");

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $sql = "SELECT ID_Producto, Nombre, Descripcion, Cantidad, Precio FROM productos";
    $result = $conn->query($sql);

    $productos = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $productos[] = $row;
        }
    }

    ?>

    <script>

        const productos = <?php echo json_encode($productos); ?>;

        window.onload = function () {
            if (productos.length > 0) {

                const contenedor = document.getElementById('contenedorProductos');

                for (let i = 0; i < productos.length; i++) {
                    const producto = productos[i];
                    const divProducto = document.createElement('div');

                    divProducto.className = 'producto';
                    divProducto.innerHTML = `
                <div class='titulo'>
                <h2>${producto.Nombre}</h2>
                </div>
                    
                    <p>${producto.Descripcion}</p>
                    <p>Cantidad disponible: ${producto.Cantidad}</p>
                    <p>Precio: $${producto.Precio}</p>
                    <div class='botones'>
                    <button onclick='RestarCantidad("${producto.ID_Producto}")'>-</button>
                    <button onclick='agregarAlCarrito("${producto.ID_Producto}","${producto.Precio}","${producto.Nombre}")'>Agregar al carrito</button>
                    <button onclick='SumarCantidad("${producto.ID_Producto}","${producto.Precio}","${producto.Nombre}")'>+</button>
                    </div>
                    
                `;

                    contenedor.appendChild(divProducto);
                }

                mostrarProductoEnCarritoCompra();
            } else {
                alert('Parece que no existen productos para agregar al carrito');
            }
        };
    </script>
    <div id="contenedorProductos"></div>
    <div style="display: none" id="contenedorCarrito">
        <div id="contenedorCarritotitulo">
            Carrito de compras
        </div>
        <div id="productosCarrito">
        </div>
        <div class="comprarTotal">
            <button onclick="abrirVentanaEmergente(true)">Comprar</button>
            <p id="total"></p>
        </div>
    </div>

    <div class="formularioAgregarVenta">
        <div id="contenedorModal">
            <div id="formularioVenta">
                <form action="realizarCompra.php" method="post">
                    <!-- Campos del formulario -->
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

                    $sql = "SELECT id_cliente, nombre FROM clientes";
                    $result = $conn->query($sql);

                    // Verificar si hay resultados
                    if ($result->num_rows > 0) {
                        // Crear el select
                        echo '<select id="cliente" name="cliente" required>';
                        while ($row = $result->fetch_assoc()) {
                            // Imprimir cada opción
                            echo '<option value="' . $row["id_cliente"] . '">' . $row["nombre"] . '</option>';
                        }
                        echo '</select>';
                    } else {
                        echo '<select id="cliente" name="cliente">';
                        echo '</select>';
                    }


                    $sql = "SELECT ID_TIPO_VENTA, TIPO_VENTA FROM tipo_ventas WHERE ESTADO = 1";
                    $result = $conn->query($sql);

                    // Verificar si hay resultados
                    if ($result->num_rows > 0) {
                        // Crear el select
                        echo '<select id="tipo_venta" name="tipo_venta" required>';
                        while ($row = $result->fetch_assoc()) {
                            // Imprimir cada opción
                            echo '<option value="' . $row["ID_TIPO_VENTA"] . '">' . $row["TIPO_VENTA"] . '</option>';
                        }
                        echo '</select>';
                    } else {
                        echo '<select id="tipo_venta" name="tipo_venta">';
                        echo '</select>';
                    }
                    ?>
                    
                    <button type="button" onclick="cerrarVentanaEmergente()">Cerrar</button>
                    <button type="button" id="btnAgregarVenta" onclick="realizarVenta()">Vender</button>

                </form>
            </div>
        </div>
    </div>
</body>
<script src="../js/venta.js"></script>

</html>