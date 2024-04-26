


//barra de busqueda
function realizarBusqueda() {
  var campoBusqueda = document.getElementById("campoBusqueda").value;
  alert("Búsqueda realizada: " + campoBusqueda);
}


//ventana de formulario de agregar productos

document.getElementById("btnAbrirModal").onclick = function () {
  document.getElementById("contenedorModal").style.display = "block";
}


//ventana de formulario de agregar productos
function abrirVentanaEmergente() {
  var modal = document.getElementById("contenedorModal");
  modal.style.display = "flex";
}

document.getElementById("btnAgregarProducto").onclick = function () {
  agregarProducto();
};


//agregar productos
function agregarProducto() {
  // Obtener los valores del formulario
  var nombre = document.getElementById('nombre').value;
  var descripcion = document.getElementById('descripcion').value;
  var cantidad = document.getElementById('cantidad').value;
  var precio = document.getElementById('precio').value;
  var categoria = document.getElementById('categoria').value;

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
  xhttp.open("POST", "agregar_producto.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  // Enviar los datos del formulario al servidor
  xhttp.send("nombre=" + nombre + "&descripcion=" + descripcion + "&cantidad=" + cantidad + "&precio=" + precio + "&categoria=" + categoria);

  setTimeout(() => {
    location.reload();
  }, 2000)
}

function cerrarVentanaEmergente() {
  document.getElementById("contenedorModal").style.display = "none";
}

function eliminarProducto(id_producto){

if (confirm("¿Quieres eliminar el producto?") == true) {
  console.log(id_producto)

  // Establecer los detalles de la solicitud
  xhttp.open("POST", "eliminar_producto.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  // Enviar los datos del formulario al servidor
  xhttp.send("id_producto=" + id_producto);

  setTimeout(() => {
    location.reload();
  }, 2000)

} else {
  console.log("Cancelado");
}
}