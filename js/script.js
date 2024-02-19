document.addEventListener('click', function (event) {
    if (event.target.matches('.btn__registrarse')) {
        // Tu código aquí
        registro();
    }
});

document.addEventListener('click', function (event) {
    if (event.target.matches('.btn__iniciar-sesion')) {
        // Tu código aquí
        iniciarSesion();
    }
});

window.addEventListener("resize", anchoPagina);

//prueba

//Declaración de variables
var contenedor_login_registro = document.querySelector(".contenedor__login-registro");
var formulario_login = document.querySelector(".formulario__login");
var formulario_registro = document.querySelector(".formulario__registro");
var caja_trasera_login = document.querySelector(".caja__trasera-login");
var caja_trasera_registro = document.querySelector(".caja__trasera-registro");

function anchoPagina() {
    if (window.innerWidth > 850) {
        caja_trasera_login.style.display = "block";
        caja_trasera_registro.style.display = "block";
    } else {
        caja_trasera_registro.style.display = "block";
        caja_trasera_registro.style.opacity = "1";
        caja_trasera_login.style.display = "none";
        formulario_login.style.display = "block";
        formulario_registro.style.display = "none";
        contenedor_login_registro.style.left = "0";
    }
}

anchoPagina();


function iniciarSesion() {

    if (window.innerWidth > 850) {
        formulario_registro.style.display = "none";
        contenedor_login_registro.style.left = "10px";
        formulario_login.style.display = "block";
        caja_trasera_registro.style.opacity = "1";
        caja_trasera_login.style.opacity = "0";
    } else {
        formulario_registro.style.display = "none";
        contenedor_login_registro.style.left = "0px";
        formulario_login.style.display = "block";
        caja_trasera_registro.style.display = "block";
        caja_trasera_login.style.display = "none";
    }
}


function registro() {

    if (window.innerWidth > 850) {

        formulario_registro.style.display = "block";
        contenedor_login_registro.style.left = "410px";
        formulario_login.style.display = "none";
        caja_trasera_registro.style.opacity = "0";
        caja_trasera_login.style.opacity = "1";
    } else {
        formulario_registro.style.display = "block";
        contenedor_login_registro.style.left = "0px";
        formulario_login.style.display = "none";
        caja_trasera_registro.style.display = "none";
        caja_trasera_login.style.display = "block";
        caja_trasera_login, style.opacity = "1";


    }
}

// document.addEventListener("DOMContentLoaded", function () {
//     var ultimasBusquedas = [];

//     function actualizarListaBusquedas() {
//         var listaBusquedas = document.getElementById("listaBusquedas");
//         listaBusquedas.innerHTML = ""; // Limpiar la lista

//         for (var i = 0; i < ultimasBusquedas.length; i++) {
//             var listItem = document.createElement("li");
//             listItem.textContent = ultimasBusquedas[i];
//             listaBusquedas.appendChild(listItem);
//         }
//     }

//     function agregarBusqueda(busqueda) {
//         if (ultimasBusquedas.length >= 3) {
//             ultimasBusquedas.shift(); // Eliminar la primera búsqueda
//         }

//         ultimasBusquedas.push(busqueda);
//         actualizarListaBusquedas();
//     }

//     // Ejemplo de uso: agregar una búsqueda
//     agregarBusqueda("Búsqueda 1");
//     agregarBusqueda("Búsqueda 2");
//     agregarBusqueda("Búsqueda 3");

//     // Puedes llamar a agregarBusqueda() cuando el usuario realiza una nueva búsqueda
// });

