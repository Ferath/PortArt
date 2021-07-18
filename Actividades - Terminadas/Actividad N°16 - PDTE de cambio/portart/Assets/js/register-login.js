const validarFormulario = () => {
    elemento = document.forms["form"]["termsCond"].checked;
    if (elemento == true){
        return false;
    } else {
        document.getElementById("info").innerHTML = "¡Debe aceptar los terminos y condiciones de contrato!";
        return false;
    }
}


