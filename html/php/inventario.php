

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
    <link rel="stylesheet" href="../../css/estilosinventario.css">

 <link
      href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
      rel="stylesheet"
      id="bootstrap-css"
    />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    

</head>
<body>

<nav class="navbar navbar-icon-top navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Bienvenido</a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item ">
            <a class="nav-link" href="bienvenida.php">
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
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="ventas.php">
              <i class="fa fa-usd" aria-hidden="true">
                <span class="badge badge-danger"></span>
              </i>
              Ventas
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="clientes.php">
              <i class="fa fa-users" aria-hidden="true">
                <span class="badge badge-danger"></span>
              </i>
              Clientes
            </a>
          </li>
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fa fa-bell">
                <span class="badge badge-info">0</span>
              </i>
              Notificaciones
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fa fa-sign-out" aria-hidden="true">
                <span class="badge badge-success"></span>
              </i>
              Salir
            </a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input
            class="form-control mr-sm-2"
            type="text"
            placeholder="Buscar"
            aria-label="Buscar"
          />
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
            Buscar
          </button>
        </form>
      </div>
    </nav>

<div class="cabecera">

<div class="contenedor_titulo">
    <div class="titulo">
        <h3>Inventario</h3>
        <input type="text" id="campoBusqueda" placeholder="Buscar productos...">
    </div>
</div>

<!--filtro -->
<div class="filtro">


<button id="filtroIcono" onclick="toggleFormularioBusqueda()">
              <i class="fa fa-filter" aria-hidden="true">
                <span class="badge badge-danger"></span>
              </i>  
</button>

<div id="formularioBusqueda">
        <label for="campoBusqueda">Buscar:</label>
        <label for="filtroCategoria">Filtrar por Categoría:</label>
        <select id="filtroCategoria">
            <option value="Lacteos">Lacteos</option>
            <option value="carnes">carnes</option>
            <option value="Aseo">Aseo</option>
            <option value="Granos">Granos</option>
            <option value="Mecato">Mecato</option>
            <option value="Licor">Licor</option>
            <!-- Agrega más opciones según tus necesidades -->
        </select>

        <button type="button" onclick="realizarBusqueda()">Buscar</button>
 </div>
        


<!-- Formulario de agregar  -->
<button id="btnDesplegarFormulario" onclick="abrirVentanaEmergente()">Agregar Producto</button>

<div id="contenedorModal">
    <div id="formularioProductos">
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
        <select id="categoria" name="categoria" required>
            <option value="Lacteos">Lacteos</option>
            <option value="carnes">carnes</option>
            <option value="Aseo">Aseo</option>
            <option value="Granos">Granos</option>
            <option value="Mecato">Mecato</option>
            <option value="Licor">Licor</option>
            <!-- Agrega más opciones según tus necesidades -->
        </select>

        <button type="button" onclick="cerrarVentanaEmergente()">Cerrar</button>
    </div>
</div>

</div>
</div>

<!-- contenedor de productos  -->
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
            <th>stock</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Producto 1</td>
            <td>Descripción del Producto 1.</td>
            <td>Cantidad</td>
            <td class="precio">$20.00</td>
            <td>Categoria</td>
            <td>Stock</td>
            <td>
                <button>
                    <i class="fa fa-pencil-square-o" aria-hidden="true">
                        <span class="badge badge-danger"></span>
                    </i>  
                </button>
                 <button>
                    <i class="fa fa-trash" aria-hidden="true">
                        <span class="badge badge-danger"></span>
                    </i>  
              </button>
            </td>

        </tr>
        <tr>
            <td>Producto 1</td>
            <td>Descripción del Producto 1.</td>
            <td>Cantidad</td>
            <td class="precio">$20.00</td>
            <td>Categoria</td>
            <td>Stock</td>
            <td>
                <button>
                    <i class="fa fa-pencil-square-o" aria-hidden="true">
                        <span class="badge badge-danger"></span>
                    </i>  
                </button>
                 <button>
                    <i class="fa fa-trash" aria-hidden="true">
                        <span class="badge badge-danger"></span>
                    </i>  
              </button>
            </td>

        </tr>
        <tr>
            <td>Producto 1</td>
            <td>Descripción del Producto 1.</td>
            <td>Cantidad</td>
            <td class="precio">$20.00</td>
            <td>Categoria</td>
            <td>Stock</td>
            <td>
                <button>
                    <i class="fa fa-pencil-square-o" aria-hidden="true">
                        <span class="badge badge-danger"></span>
                    </i>  
                </button>
                 <button>
                    <i class="fa fa-trash" aria-hidden="true">
                        <span class="badge badge-danger"></span>
                    </i>  
              </button>
            </td>

        </tr>
        <tr>
            <td>Producto 1</td>
            <td>Descripción del Producto 1.</td>
            <td>Cantidad</td>
            <td class="precio">$20.00</td>
            <td>Categoria</td>
            <td>Stock</td>
            <td>
                <button>
                    <i class="fa fa-pencil-square-o" aria-hidden="true">
                        <span class="badge badge-danger"></span>
                    </i>  
                </button>
                 <button>
                    <i class="fa fa-trash" aria-hidden="true">
                        <span class="badge badge-danger"></span>
                    </i>  
              </button>
            </td>

        </tr>
        <tr>
            <td>Producto 1</td>
            <td>Descripción del Producto 1.</td>
            <td>Cantidad</td>
            <td class="precio">$20.00</td>
            <td>Categoria</td>
            <td>Stock</td>
            <td>
                <button>
                    <i class="fa fa-pencil-square-o" aria-hidden="true">
                        <span class="badge badge-danger"></span>
                    </i>  
                </button>
                 <button>
                    <i class="fa fa-trash" aria-hidden="true">
                        <span class="badge badge-danger"></span>
                    </i>  
              </button>
            </td>

        </tr>
        <tr>
            <td>Producto 1</td>
            <td>Descripción del Producto 1.</td>
            <td>Cantidad</td>
            <td class="precio">$20.00</td>
            <td>Categoria</td>
            <td>Stock</td>
            <td>
                <button>
                    <i class="fa fa-pencil-square-o" aria-hidden="true">
                        <span class="badge badge-danger"></span>
                    </i>  
                </button>
                 <button>
                    <i class="fa fa-trash" aria-hidden="true">
                        <span class="badge badge-danger"></span>
                    </i>  
              </button>
            </td>

        </tr>
    
    </tbody>
</table>
</div>
</div>

 <div class="paginacion">
    <div><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></div>
    <div><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></div>
    <div>1</div>
    <div>2</div>
    <div><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></div>
    <div><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></div>
 </div>




</body>

<script src="js/script.js"></script>

</html>

