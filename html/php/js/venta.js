function agregarAlCarrito(id, precio, Producto) {
  let productosEnElCarrito = JSON.parse(
    localStorage.getItem("productosEnCarrito")
  );

  if (
    productosEnElCarrito != null &&
    productosEnElCarrito != undefined &&
    productosEnElCarrito != ""
  ) {
    let posicion = productosEnElCarrito.findIndex((x) => x.ID_Producto == id);
    if (posicion != -1) {
      let cantidad = productosEnElCarrito[posicion].cantidad;
      productosEnElCarrito[posicion].cantidad += 1;

      localStorage.removeItem("productosEnCarrito");
      localStorage.setItem(
        "productosEnCarrito",
        JSON.stringify(productosEnElCarrito)
      );
    } else {
      productosEnElCarrito.push({
        ID_Producto: id,
        cantidad: 1,
        Nombre: Producto,
        precio: precio,
      });
      localStorage.removeItem("productosEnCarrito");
      localStorage.setItem(
        "productosEnCarrito",
        JSON.stringify(productosEnElCarrito)
      );
    }
  } else {
    productosEnElCarrito = [];

    productosEnElCarrito.push({
      ID_Producto: id,
      cantidad: 1,
      Nombre: Producto,
      precio: precio,
    });
    localStorage.removeItem("productosEnCarrito");
    localStorage.setItem(
      "productosEnCarrito",
      JSON.stringify(productosEnElCarrito)
    );
  }
  mostrarProductoEnCarritoCompra();
}
function quitarDelCarrito(id) {
  let productosEnElCarrito = JSON.parse(
    localStorage.getItem("productosEnCarrito")
  );
  if (
    productosEnElCarrito != null &&
    productosEnElCarrito != undefined &&
    productosEnElCarrito != ""
  ) {
    let posicion = productosEnElCarrito.findIndex((x) => x.ID_Producto == id);
    if (posicion != -1) {
      productosEnElCarrito.splice(posicion, 1);
      localStorage.removeItem("productosEnCarrito");
      localStorage.setItem(
        "productosEnCarrito",
        JSON.stringify(productosEnElCarrito)
      );
    }
  }
  if (productosEnElCarrito.length == 0) {
    document.getElementById("contenedorCarrito").style.display = "none";
  } else {
    mostrarProductoEnCarritoCompra();
  }
}
function SumarCantidad(id, precio, nombre) {
  let productosEnElCarrito = JSON.parse(
    localStorage.getItem("productosEnCarrito")
  );

  if (
    productosEnElCarrito != null &&
    productosEnElCarrito != undefined &&
    productosEnElCarrito != ""
  ) {
    let posicion = productosEnElCarrito.findIndex((x) => x.ID_Producto == id);
    if (posicion != -1) {
      productosEnElCarrito[posicion].cantidad += 1;
      localStorage.removeItem("productosEnCarrito");
      localStorage.setItem(
        "productosEnCarrito",
        JSON.stringify(productosEnElCarrito)
      );
    } else {
      agregarAlCarrito(id, precio, nombre);
    }
  }
  mostrarProductoEnCarritoCompra();
}
function RestarCantidad(id) {
  let productosEnElCarrito = JSON.parse(
    localStorage.getItem("productosEnCarrito")
  );

  if (
    productosEnElCarrito != null &&
    productosEnElCarrito != undefined &&
    productosEnElCarrito != ""
  ) {
    let posicion = productosEnElCarrito.findIndex((x) => x.ID_Producto == id);
    if (posicion != -1) {
      let cantidad = productosEnElCarrito[posicion].cantidad;
      if (cantidad > 1) {
        productosEnElCarrito[posicion].cantidad -= 1;
        localStorage.removeItem("productosEnCarrito");
        localStorage.setItem(
          "productosEnCarrito",
          JSON.stringify(productosEnElCarrito)
        );
      } else {
        quitarDelCarrito(id);
      }
    }
  }
  mostrarProductoEnCarritoCompra();
}

function mostrarProductoEnCarritoCompra() {
  let contenedorProductos = document.getElementById("productosCarrito");

  contenedorProductos.innerHTML = "";

  let productosEnElCarrito = JSON.parse(
    localStorage.getItem("productosEnCarrito")
  );

  if (
    productosEnElCarrito != null &&
    productosEnElCarrito != undefined &&
    productosEnElCarrito != ""
  ) {
    document.getElementById("contenedorCarrito").style.display = "block";
    let precioMostrar = 0;
    for (let i = 0; i < productosEnElCarrito.length; i++) {
      const divProducto = document.createElement("div");
      divProducto.className = "productoCarrito";
      let PrecioTotal =
        productosEnElCarrito[i].precio * productosEnElCarrito[i].cantidad;

      precioMostrar += PrecioTotal;

      divProducto.innerHTML = `

                            <div class='productoInfo'>
                            <h2>${productosEnElCarrito[i].Nombre}</h2>
                            <p>x ${productosEnElCarrito[i].cantidad}</p>
                            <p>Valor: ${PrecioTotal}</p>
                            </div>
                            

                            <div class='botonesCarrito'>
                            <button onclick='RestarCantidad("${productosEnElCarrito[i].ID_Producto}")'>-</button>
                            <button onclick='quitarDelCarrito("${productosEnElCarrito[i].ID_Producto}")'>Eliminar</button>
                            <button onclick='SumarCantidad("${productosEnElCarrito[i].ID_Producto}","${productosEnElCarrito[i].Precio}")'>+</button>
                            </div>
                        `;

      contenedorProductos.appendChild(divProducto);
    }

    let etiquetaPrecio = document.getElementById("total");
    etiquetaPrecio.innerText = "$" + precioMostrar;
  }
}

dragElement(document.getElementById("contenedorCarrito"));

function dragElement(elmnt) {
  var pos1 = 0,
    pos2 = 0,
    pos3 = 0,
    pos4 = 0;
  if (document.getElementById(elmnt.id + "titulo")) {
    document.getElementById(elmnt.id + "titulo").onmousedown = dragMouseDown;
  } else {
    elmnt.onmousedown = dragMouseDown;
  }

  function dragMouseDown(e) {
    e = e || window.event;
    e.preventDefault();
    pos3 = e.clientX;
    pos4 = e.clientY;
    document.onmouseup = closeDragElement;
    document.onmousemove = elementDrag;
  }

  function elementDrag(e) {
    e = e || window.event;
    e.preventDefault();
    pos1 = pos3 - e.clientX;
    pos2 = pos4 - e.clientY;
    pos3 = e.clientX;
    pos4 = e.clientY;
    elmnt.style.top = elmnt.offsetTop - pos2 + "px";
    elmnt.style.left = elmnt.offsetLeft - pos1 + "px";
  }

  function closeDragElement() {
    document.onmouseup = null;
    document.onmousemove = null;
  }
}

function realizarVenta() {
  var cliente = document.getElementById("cliente").value;
  var tipo_venta = document.getElementById("tipo_venta").value;

  let productosEnElCarrito = JSON.parse(
    localStorage.getItem("productosEnCarrito")
  );

  if (
    productosEnElCarrito != null &&
    productosEnElCarrito != undefined &&
    productosEnElCarrito != ""
  ) {
let total = 0;
    for (let i = 0; i < productosEnElCarrito.length; i++) {
      let totalParcial =  productosEnElCarrito[i].precio * productosEnElCarrito[i].cantidad;

      total += totalParcial;
    }
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        alert(this.responseText);
      }
    };

    xhttp.open("POST", "realizarCompra.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(
      "cliente=" +
        cliente +
        "&total=" +
        total +
        "&tipo_venta=" +
        tipo_venta +
        "&carrito=" +
        JSON.stringify(productosEnElCarrito) 
    );

    setTimeout(() => {
      location.reload();
      localStorage.removeItem("productosEnCarrito");
    }, 2000);
  } else {
    window.alert("No hay productos en el carrito.");
  }
}

document.getElementById("btnAbrirModal").onclick = function () {
  document.getElementById("contenedorModal").style.display = "block";
};

//ventana de formulario de agregar Categorias
function abrirVentanaEmergente() {

  var modal = document.getElementById("contenedorModal");
  modal.style.display = "flex";
}
function cerrarVentanaEmergente() {
  document.getElementById("contenedorModal").style.display = "none";
}