const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones = {
    nombre: /^[a-zA-ZÁÿ\s]{2,40}$/,
    correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9_.]+$/,
    estado: /^[a-zA-ZÁÿ\s]{1,30}$/,
    empresa: /^[a-zA-ZÁÿ\s]{1,50}$/,
    comentario: /^[a-zA-ZÁÿ\s]{1,100}$/,
    telefono: /^\d{10}$/
}

const validarFormulario = (e) => {
    switch (e.target.name) {
        case "nombre":
            if(expresiones.nombre.test(e.target.value)){
                document.getElementById('grupo__nombre').classList.remove('formulario__grupo-incorrecto');
                document.getElementById('grupo__nombre').classList.add('formulario__grupo-correcto');
            } else {
                document.getElementById('grupo__nombre').classList.add('formulario__grupo-incorrecto');
            }
        break; 
        case "correo":

        break;
        case "estado":

        break;
        case "empresa":

        break;
        case "comentario":

        break;
        case "telefono":

        break;
    }
}

inputs.forEach((input) => {
    input.addEventListener('keyup', validarFormulario);
    input.addEventListener('blur', validarFormulario);

})

formulario.addEventListener('submit', (e) => {
    e.preventDefault();
});