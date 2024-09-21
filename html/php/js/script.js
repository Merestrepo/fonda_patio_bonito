var productoSeleccionado = 0;


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
function abrirVentanaEmergente(crear, id_producto, nombre, descripcion, cantidad, precio, categoria) {
  if (crear) {
    var btnAgregarProducto = document.getElementById("btnAgregarProducto")
    var btnEditarProducto = document.getElementById("btnEditarProducto")
    btnEditarProducto.style.display = "none";
    btnAgregarProducto.style.display = "block"

    var modal = document.getElementById("contenedorModal");
    modal.style.display = "flex";
  } else {
    productoSeleccionado = id_producto;

    var btnAgregarProducto = document.getElementById("btnAgregarProducto")
    var btnEditarProducto = document.getElementById("btnEditarProducto")
    btnEditarProducto.style.display = "block";
    btnAgregarProducto.style.display = "none"

    var modal = document.getElementById("contenedorModal");
    modal.style.display = "flex";

    document.getElementById('nombre').value = nombre;
    document.getElementById('descripcion').value = descripcion;
    document.getElementById('cantidad').value = cantidad;
    document.getElementById('precio').value = precio;
    document.getElementById('categoria').value = categoria;


  }


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

//Eliminar producto


function eliminarProducto(id_producto) {
  var xhttp = new XMLHttpRequest();


  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      // Mostrar una alerta con la respuesta del servidor
      alert(this.responseText);


    }
  };
  if (confirm("¿Quieres eliminar el producto?")) {


    // Establecer los detalles de la solicitud
    xhttp.open("POST", "eliminar_producto.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // Enviar los datos del formulario al servidor
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        // Recibir la respuesta del servidor
        console.log(this.responseText);
        // Recargar la página después de eliminar el producto


      }
    };

    // Enviar el ID del producto al servidor
    xhttp.send("ID_Producto=" + id_producto);
  }
  setTimeout(() => {
    location.reload();
  }, 1000)
}

//editar producto
function editarProducto() {
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
  xhttp.open("POST", "editar_producto.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  // Enviar los datos del formulario al servidor
  xhttp.send("nombre=" + nombre + "&descripcion=" + descripcion + "&cantidad=" + cantidad + "&precio=" + precio + "&categoria=" + categoria + "&id_producto=" + productoSeleccionado);

  setTimeout(() => {
    location.reload();
  }, 2000)
}

