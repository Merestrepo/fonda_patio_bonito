
var idVenta = 0;

function abrirVentanaEmergente(idVenta) {

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("contenedorModal").style.display = "flex";

            // alert(this.responseText);
            let info = this.responseText;
            let array = info.split(';')

            let contenedorProductos = document.getElementById("contenedorProductos");
            contenedorProductos.innerHTML = "";
            array.forEach(element => {
                if (element != "") {
                    let element2 = element.split('-');


                    let producto = document.createElement("div");
                    producto.className = "rowProducto";
                    producto.innerHTML = `<p>${element2[1]}</p> <p>${element2[2]}</p> <p>${element2[3] * element2[1]}</p> <br>`;

                    contenedorProductos.appendChild(producto);
                }
            });

        }
    };

    xhttp.open("POST", "detalle-ventas.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("id=" + idVenta);


}
function cerrarVentanaEmergente() {
    document.getElementById("contenedorModal").style.display = "none";
}