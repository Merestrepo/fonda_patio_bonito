<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida </title>
    <link rel="stylesheet" href="../../css/estilosbienvenida.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<nav class="navbar navbar-icon-top navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Bienvenido</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">
          <i class="fa fa-home"></i>
          Inicio
          <span class="sr-only">(current)</span>
          </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="inventario.php">
        <i class="fa fa-file-text" aria-hidden="true">
            <span class="badge badge-danger"></span>
          </i>
          Inventario
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
    <ul class="navbar-nav ">
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
      <input class="form-control mr-sm-2" type="text" placeholder="Buscar" aria-label="Buscar">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    </form>
  </div>
</nav>
 <div class = "contenedor_principal"></div>       





</body>
</html>
