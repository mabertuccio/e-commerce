const btnSignIn = document.getElementById("sign-in"), //bajar formulario
      btnSignUp = document.getElementById("sign-up"), //subir form
      containerFormRegister = document.querySelector(".register"), //registracion
      containerFormLogin = document.querySelector(".login"); //parte del login

btnSignIn.addEventListener("click", e => { //ejecutar "click"
    containerFormRegister.classList.add("hide"); // se hace el cambio de  formulario
    containerFormLogin.classList.remove("hide") // se cambia el formulario paradarle paso al otro
})


btnSignUp.addEventListener("click", e => {
    containerFormLogin.classList.add("hide");
    containerFormRegister.classList.remove("hide")
})