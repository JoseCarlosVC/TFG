const passExp = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*])(?=.{8,32})/;
const nombreExp = /^(?=.*[A-zÀ-Ñ])(?=.{2,40})/;
const apellidosExp = /^(?=.*[A-zÀ-Ñ])(?=.{2,80})/;
const telExp = /^[0-9]{9}$/;
//Con la expresión [A-zÀ-Ñ] incluimos todas las letras, incluso aquellas con acentos

function desactivarEnvio() {
    let envio = document.getElementById("enviar");
    envio.disabled = true;
}

function activarEnvio() {
    let envio = document.getElementById("enviar");
    envio.disabled = false;
}
//Creamos los mensajes de alerta para el formulario...
let alertaNombre = document.createElement("span");
alertaNombre.innerText = "Los nombres no pueden contener caracteres especiales ni números. Deben ser entre 2 y 40 caracteres";
alertaNombre.classList.add("invalid-feedback");

let alertaApellidos = document.createElement("span");
alertaApellidos.innerText = "Los apellidos no pueden contener caracteres especiales ni números. Deben ser entre 2 y 80 caracteres";
alertaApellidos.classList.add("invalid-feedback");

let alertaPass = document.createElement("span");
alertaPass.innerText = "La contraseña debe contener una minúscula, una mayúscula, un número y un caracter especial (!@#$%^&*) y estar compuesta entre 8 y 32 caracteres";
alertaPass.classList.add("invalid-feedback");

let alertaConfirm = document.createElement("span");
alertaConfirm.innerText = "Las contraseñas no coinciden";
alertaConfirm.classList.add("invalid-feedback");

let alertaTel = document.createElement("span");
alertaTel.innerText = "El número de teléfono debe tener 9 dígitos";
alertaTel.classList.add("invalid-feedback");

//Seleccionamos el elemento que contiene al input asociado a cada mensaje...
let divNombre = document.getElementsByClassName("col-md-6")[0];
let divApellidos = document.getElementsByClassName("col-md-6")[1];
let divPass = document.getElementsByClassName("col-md-6")[6];
let divConfirm = document.getElementsByClassName("col-md-6")[7];
let divTel = document.getElementsByClassName("col-md-6")[5];

let formNombre = document.getElementById("nombreUsuario");
let formApellidos = document.getElementById("apellidos");
let formPass = document.getElementById("password");
let formConfirmar = document.getElementById("password-confirm");
let formTel = document.getElementById("telefono");
//El evento blur se activa cuando un input del formulario pierde el focus, es decir, se cambia a otro elemento. En este caso, comprobamos la expresión regular de ese campo cuando se cambie a otro campo
formNombre.addEventListener("blur", function () {
    let nombreInput = formNombre.value;

    if (nombreInput.match(nombreExp)) {
        activarEnvio();
        divNombre.removeChild(alertaNombre);
    } else {
        desactivarEnvio();
        divNombre.appendChild(alertaNombre);
    }
});

formApellidos.addEventListener("blur", function () {
    let apellidosInput = formApellidos.value;

    if (apellidosInput.match(apellidosExp)) {
        activarEnvio();
        divApellidos.removeChild(alertaApellidos);
    } else {
        desactivarEnvio();
        divApellidos.appendChild(alertaApellidos);
    }
});

formPass.addEventListener("blur", function () {
    let passInput = formPass.value;

    if (passInput.match(passExp)) {
        activarEnvio();
        divPass.removeChild(alertaPass);
    } else {
        desactivarEnvio();
        divPass.appendChild(alertaPass);
    }
});

formConfirmar.addEventListener("blur", function () {
    let passInput = formPass.value;
    let confirmInput = formConfirmar.value;

    if (passInput == confirmInput) {
        activarEnvio();
        divConfirm.removeChild(alertaConfirm);
    } else {
        desactivarEnvio();
        divConfirm.appendChild(alertaConfirm);
    }
});

formTel.addEventListener("blur", function () {
    let telInput = formTel.value;

    if (telInput.match(telExp)) {
        activarEnvio();
        divTel.removeChild(alertaTel);
    } else {
        desactivarEnvio();
        divTel.appendChild(alertaTel);
    }
});
