//creacion de las variables
const formregister = document.querySelector(".form-register");
const inputUser = document.querySelector(".form-register input[type='text']");
const inputEmail = document.querySelector(".form-register input[type='email']");
const inputpass = document.querySelector(".form-register input[type='password']");


// validacion de campos expresion regular
const userNameRegex = /^[a-zA-Z0-9_\-]{4,16}$/; // admite texto entre 4  y 16 caracteres
const emailRegex = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/; //"el correo solo puede tener letras y numeros, debe tener un @obligatoriamente"
const passwordRegex = /^.{4,12}$/; //la contraseña tiene que tener entre 4 y 12 digitos"

inputUser.addEventListener("input", () =>{
    validarCampo(userNameRegex, inputUser, "El usuario debe tener entre 4 y 16 caracteres alfanumericos");
});

inputEmail.addEventListener("input", () =>{
    validarCampo(emailRegex, inputEmail, "El correo solo puede contener letras, numeros, puntos y guíon bajo.");
});
inputpass.addEventListener("input", () =>{
    validarCampo(passwordRegex, inputpass, "La contraseña debe contener entre 4 y 12 digitos");
});

//utilizar un evento para evitar que java no encuente el formulario
document.addEventListener("DOMcontentLoaded", () => {
    //funcion prevenir enviar el formulario vacio
    formregister.addEventListener("submit", e => {
        e.preventDefault();
        enviarFormulario();
    });  

    //llamar a la variable - dispara el evento de acuerdo a las expresiones regulares 
    /* inputUser.addEventListener("input", () =>{
        validarCampo(userNameRegex, inputUser, "El usuario debe tener entre 4 y 16 caracteres alfanumericos");
    });
    inputEmail.addEventListener("input", () =>{
        validarCampo(emailRegex, inputEmail, "El correo solo puede contener letras, numeros, puntos y guíon bajo.");
    });
    inputpass.addEventListener("input", () =>{
        validarCampo(passwordRegex, inputpass, "La contraseña debe contener entre 4 y 12 digitos");
    }); */
})

// Validacion de Campo creo la variable. 
//como todas las variables se llaman iugales valido los campos de manera dinamica
//con expresiones regulres
function validarCampo(regularExpresion,campo,mensaje) {
    const validarCampo = regularExpresion.test(campo.value);
    if (validarCampo) {
        elminiarAlerta(campo.parentElement.parentElement);
        estadoValidacionCampo[campo.name] = true;
        campo.parentElement.classList.remove("error");
        return;//sale de la funcion
    }
    else
    {
        //estadoValidacionCampo[campo.name] = false;
        mostrarAlerta(campo.parentElement.parentElement,mensaje);
        //campo.parentElement.classList.add("error"); 
        //alert("error");
    }
    
}

function mostrarAlerta(referencia,mensaje) {
    elminiarAlerta(referencia)
    const alertaDiv = document.createElement("div");
    alertaDiv.classList.add("alerta");
    alertaDiv.textContent = mensaje;
    referencia.appendChild(alertaDiv); //se crea el elemento dentro de otro
}

//trae la alerta previa comprobacion en el div
function elminiarAlerta(referencia) {
    const alerta = referencia.querySelector(".alerta");
    
    if (alerta) {
        alerta.remove();
    }
}

// validacion del envio del formulario
function enviarFormulario() {
    if (estadoValidacionCampo.userName && estadoValidacionCampo.userEmail && estadoValidacionCampo)
        alertaExito.classList.add(alertaExito);
        alertaError.classList.remove(alertaError);
        formregister.reset();
        setTimeout(() =>{
            alertaExito.classList.remove(alertaExito);
        }, 3000);
}

alertaExito.classList.remove("alertaExito");
alertaError.classList.add("alertaError");