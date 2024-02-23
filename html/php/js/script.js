   


//barra de busqueda
function realizarBusqueda() {
  var campoBusqueda = document.getElementById("campoBusqueda").value;
  alert("Búsqueda realizada: " + campoBusqueda);
}


//ventana de formulario de agregar productos
  function abrirVentanaEmergente() {
    var modal = document.getElementById("contenedorModal");
    modal.style.display = "flex";
}
cerrarVentanaEmergente();

function cerrarVentanaEmergente() {
    var modal = document.getElementById("contenedorModal");
    modal.style.display = "none";
}

//formulario de filtro
function toggleFormularioBusqueda() {
  var formulario = document.getElementById("formularioBusqueda");
  formulario.style.display = (formulario.style.display === "none" || formulario.style.display === "") ? "block" : "none";
}

function realizarBusqueda() {
  var campoBusqueda = document.getElementById("campoBusqueda").value;
  var filtroCategoria = document.getElementById("filtroCategoria").value;

 
  alert("Búsqueda realizada: " + campoBusqueda + ", Categoría: " + filtroCategoria);
}
