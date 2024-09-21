var clienteseleccionado = 0;


//barra de busqueda
function realizarBusqueda() {
  var campoBusqueda = document.getElementById("campoBusqueda").value;
  alert("Búsqueda realizada: " + campoBusqueda);
}


//ventana de formulario de agregar clientes

document.getElementById("btnAbrirModal").onclick = function () {
  document.getElementById("contenedorModal").style.display = "block";
}


//ventana de formulario de agregar clientes
function abrirVentanaEmergente(crear, id_cliente, nombre, telefono, email, Deuda,) {
  if (crear) {
    var btnAgregarclientes = document.getElementById("btnAgregarclientes")
    var btnEditarclientes = document.getElementById("btnEditarclientes")
    btnEditarclientes.style.display = "none";
    btnAgregarclientes.style.display = "block"

    var modal = document.getElementById("contenedorModal");
    modal.style.display = "flex";
  } else {
    clienteseleccionado = id_cliente;

    var btnAgregarcliente = document.getElementById("btnAgregarclientes")
    var btnEditarcliente = document.getElementById("btnEditarclientes")
    btnEditarcliente.style.display = "block";
    btnAgregarcliente.style.display = "none"

    var modal = document.getElementById("contenedorModal");
    modal.style.display = "flex";

    document.getElementById('nombre').value = nombre;
    document.getElementById('telefono').value = telefono;
    document.getElementById('email').value = email;
    document.getElementById('Deuda').value = Deuda;
    

  }


}

document.getElementById("btnAgregarclientes").onclick = function () {
  agregarclientes();
};


//agregar clientes
function agregarclientes() {
  // Obtener los valores del formulario
  var nombre = document.getElementById('nombre').value;
  var telefono = document.getElementById('telefono').value;
  var email = document.getElementById('email').value;
  var Deuda = document.getElementById('Deuda').value;
  

  // Crear una instancia de XMLHttpRequest para realizar la solicitud AJAX
  var xhttp = new XMLHttpRequest();

  // Definir la función de devolución de llamada que manejará la respuesta del servidor
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      // Mostrar una alerta con la respuesta del servidor
      alert(this.responseText);
    }
  };

  var nombre = document.getElementById('nombre').value;
    var telefono = document.getElementById('telefono').value;
    var email = document.getElementById('email').value;
    var Deuda = document.getElementById('Deuda').value;
    

  // Establecer los detalles de la solicitud
  xhttp.open("POST", "agregar_clientes.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  // Enviar los datos del formulario al servidor
  xhttp.send("nombre=" + nombre + "&telefono=" + telefono + "&email=" + email + "&Deuda=" + Deuda );

  setTimeout(() => {
    location.reload();
  }, 2000)
}

function cerrarVentanaEmergente() {
  document.getElementById("contenedorModal").style.display = "none";
}

//Eliminar cliente


function eliminarcliente(id_cliente) {
  var xhttp = new XMLHttpRequest();
  if (confirm("¿Quieres eliminar la cliente?")) {

    
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        // Recibir la respuesta del servidor
        console.log(this.responseText);
        // Recargar la página después de eliminar el cliente

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

//editar cliente
function editarclientes() {
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

  
  var nombre = document.getElementById('nombre').value;
    var telefono = document.getElementById('telefono').value;
    var email = document.getElementById('email').value;
    var Deuda = document.getElementById('Deuda').value;

  // Establecer los detalles de la solicitud
  xhttp.open("POST", "editar_clientes.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  // Enviar los datos del formulario al servidor
  xhttp.send("nombre=" + nombre + "&telefono=" + telefono + "&email=" + email + "&Deuda=" + Deuda + "&id_cliente=" +clienteseleccionado);

  setTimeout(() => {
    location.reload();
  }, 2000)
}

