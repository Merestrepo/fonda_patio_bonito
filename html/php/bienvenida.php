<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bienvenida</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../../css/estilosbienvenida.css" />

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
        <li class="nav-item active">
          <a class="nav-link" href="#">
            <i class="fa fa-home"></i>
            Inicio
           
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Producto/inventario.php">
            <i class="fa fa-file-text" aria-hidden="true">
              <span class="badge badge-danger"></span>
            </i>
            Inventario
          </a>
        </li>
        

        <li class="nav-item">
          <a class="nav-link" href="Clientes/clientes.php">
            <i class="fa fa-users" aria-hidden="true">
              <span class="badge badge-danger"></span>
            </i>
            Clientes
          </a>
        </li>
        <li class="nav-item">
                    <a class="nav-link" href="Categoria/categorias.php">
                        <i class="fa fa-archive" aria-hidden="true">
                            <span class="badge badge-danger"></span>
                        </i>
                        Categorías
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ventas/venta.php">
                        <i class="fa fa-money" aria-hidden="true">
                            <span class="badge badge-danger"></span>
                        </i>
                        Venta
                    </a>
                </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="../index.php">
            <i class="fa fa-sign-out" aria-hidden="true">
              <span class="badge badge-success"></span>
            </i>
            Salir
          </a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="dashboard">
        <div class="sidebar">
            <h4>Ventas</h4>
            <div class="card-info">
                <h2>$2,200</h2>
                <i class="fas fa-credit-card fa-2x"></i>
            </div>
            <div class="card-info">
                <h2>$12,029</h2>
                <i class="fas fa-wallet fa-2x"></i>
            </div>
            <div class="actions">
                <button>Decargar</button>
            
            </div>
        </div>

        <div class="main-content">
            <h3>Dashboard</h3>
            <div class="circle-chart">
                <div class="circle" style="background-color:#ff6f91;">
                    $1,392 <br> Ventas
                </div>
                <div class="circle" style="background-color:#6a82fb;">
                     <br> Servicios
                </div>
                <div class="circle" style="background-color:#ff9f43;">
                    49<br> Clientes
                </div>
            </div>


    
</body>
<script src="js/script.js"></script>

</html>