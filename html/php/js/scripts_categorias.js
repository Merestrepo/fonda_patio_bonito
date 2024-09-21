var Categoriaseleccionado = 0;


//barra de busqueda
function realizarBusqueda() {
  var campoBusqueda = document.getElementById("campoBusqueda").value;
  alert("Búsqueda realizada: " + campoBusqueda);
}


//ventana de formulario de agregar Categorias

document.getElementById("btnAbrirModal").onclick = function () {
  document.getElementById("contenedorModal").style.display = "block";
}


//ventana de formulario de agregar Categorias
function abrirVentanaEmergente(crear, id_Categoria, nombre) {
  if (crear) {
    var btnAgregarCategoria = document.getElementById("btnAgregarCategoria")
    var btnEditarCategoria = document.getElementById("btnEditarCategoria")
    btnEditarCategoria.style.display = "none";
    btnAgregarCategoria.style.display = "block"

    var modal = document.getElementById("contenedorModal");
    modal.style.display = "flex";
  } else {
    Categoriaseleccionado = id_Categoria;

    var btnAgregarCategoria = document.getElementById("btnAgregarCategoria")
    var btnEditarCategoria = document.getElementById("btnEditarCategoria")
    btnEditarCategoria.style.display = "block";
    btnAgregarCategoria.style.display = "none"

    var modal = document.getElementById("contenedorModal");
    modal.style.display = "flex";

    document.getElementById('nombre').value = nombre;


  }


}

document.getElementById("btnAgregarCategoria").onclick = function () {
  agregarCategoria();
};


//agregar Categorias
function agregarCategoria() {
  // Obtener los valores del formulario
  var nombre = document.getElementById('nombre').value;

  // Crear una instancia de XMLHttpRequest para realizar la solicitud AJAX
  var xhttp = new XMLHttpRequest();

  // Definir la función de devolución de llamada que manejará la respuesta del servidor
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      // Mostrar una alerta con la respuesta del servidor
      alert(this.responseText);
    }
  };

  // Establecer los detalles de la solicitud
  xhttp.open("POST", "agregar_categoria.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  // Enviar los datos del formulario al servidor
  xhttp.send("nombre=" + nombre);

  setTimeout(() => {
    location.reload();
  }, 2000)
}

function cerrarVentanaEmergente() {
  document.getElementById("contenedorModal").style.display = "none";
}

//Eliminar Categoria


function eliminarCategoria(id_cliente) {
  var xhttp = new XMLHttpRequest();
  if (confirm("¿Quieres eliminar la Categoria?")) {

    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        // Recibir la respuesta del servidor
        console.log(this.responseText);
        // Recargar la página después de eliminar el Categoria

      };
      }

    // Establecer los detalles de la solicitud
    xhttp.open("POST", "eliminar_cliente.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhttp.send("id_cliente=" + id_cliente);
  }
  setTimeout(() => {
    location.reload();
  }, 1000)
}

//editar Categoria
function editarCategoria() {
  var nombre = document.getElementById('nombre').value;
  

  // Crear una instancia de XMLHttpRequest para realizar la solicitud AJAX
  var xhttp = new XMLHttpRequest();

  // Definir la función de devolución de llamada que manejará la respuesta del servidor
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      // Mostrar una alerta con la respuesta del servidor
      alert(this.responseText);
    }
  };

  // Establecer los detalles de la solicitud
  xhttp.open("POST", "editar_categoria.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  // Enviar los datos del formulario al servidor
  xhttp.send("nombre=" + nombre + "&id_categoria=" + Categoriaseleccionado);

  setTimeout(() => {
    location.reload();
  }, 2000)
}

