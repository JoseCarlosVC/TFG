const passExp = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*])(?=.{8,32})/;
const nombreExp = /^(?=.*[A-zÀ-ú])(?=.{2,40})/;
const apellidosExp = /^(?=.*[A-zÀ-ú])(?=.{2,80})/;

function desactivarEnvio() {
    let envio = document.getElementById("enviar");
    envio.disabled = true;
}

function activarEnvio() {
    let envio = document.getElementById("enviar");
    envio.disabled = false;
}


//Con la expresión [A-zÀ-ú] incluimos todas las letras, incluso aquellas con acentos
let formNombre = document.getElementById("nombreUsuario");
let formApellidos = document.getElementById("apellidos");
let formPass = document.getElementById("password");
let formConfirmar = document.getElementById("password-confirm");
//El evento blur se activa cuando un input del formulario pierde el focus, es decir, se cambia a otro elemento. En este caso, comprobamos la expresión regular de ese campo cuando se cambie a otro campo
formNombre.addEventListener("blur", function () {
    let nombreInput = formNombre.value;

    if (nombreInput.match(nombreExp)) {
        activarEnvio();
    } else {
        desactivarEnvio();
    }
});

formApellidos.addEventListener("blur", function () {
    let apellidosInput = formApellidos.value;

    if (apellidosInput.match(apellidosExp)) {
        activarEnvio();
    } else {
        desactivarEnvio();
    }
});

formPass.addEventListener("blur", function () {
    let passInput = formPass.value;

    if (passInput.match(passExp)) {
        activarEnvio();
    } else {
        desactivarEnvio();
    }
});

formConfirmar.addEventListener("blur", function () {
    let passInput = formPass.value;
    let confirmInput = formConfirmar.value;

    if (passInput == confirmInput) {
        activarEnvio();
    } else {
        desactivarEnvio();
    }
});
