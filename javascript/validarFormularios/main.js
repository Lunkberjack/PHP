// LucíaLM - 2 DAM
// Inputs
const nombre = document.getElementById('nombre')
const pass = document.getElementById('pass')
const email = document.getElementById('email')
const edad = document.getElementById('edad')
const telefono = document.getElementById('telefono')

// Spans de error
const errorNombre = document.getElementById('error-nombre')
const errorPass = document.getElementById('error-pass')
const errorEmail = document.getElementById('error-email')
const errorEdad = document.getElementById('error-edad')
const errorTelefono = document.getElementById('error-telefono')

// Botones
const btnReset = document.getElementById('btn-reset')
const btnEnviar = document.getElementById('btn-enviar')

// Constantes
const LONGITUD_PASS = 8 // Longitud mínima de contraseña
// No es mía, es un estándar de validación de emails encontrado en
// https://www.w3resource.com/javascript/form/email-validation.php
const REGEX_EMAIL = /(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/;
const TEL_DIGS = 9 // Dígitos en un # de teléfono

/**
 * Valida el nombre: es obligatorio.
 */
function validarNombre() {
    // Si está vacío, en el span aparece un
    // mensaje personalizado
    if (nombre.value.length == 0) {
        errorNombre.innerHTML = 'El nombre es obligatorio'
        cambiarColorBorde(nombre, 'rojo')
    } else {
        errorNombre.innerHTML = ''
        cambiarColorBorde(nombre)
    }
}

/**
 * Valida la contraseña: es obligatoria y debe tener 8+ caracteres.
 */
function validarPass() {
    // Mensajes que aparecerán en el span según
    // las condiciones que se cumplan o no
    if (pass.value.length < 8 && pass.value.length > 0) {
        errorPass.innerHTML = 'No menos de 8 caracteres'
        cambiarColorBorde(pass, 'rojo')
    } else if (pass.value.length == 0) {
        errorPass.innerHTML = 'La contraseña es obligatoria'
        cambiarColorBorde(pass, 'rojo')
    } else {
        errorPass.innerHTML = ''
        cambiarColorBorde(pass)
    }
}

/**
 * Valida el email: es obligatorio y debe cumplir un estándar
 * especificado en la expresión regular anterior
 */
function validarEmail() {
    if (email.value.length == 0) {
        errorEmail.innerHTML = 'El email es obligatorio'
        cambiarColorBorde(email, 'rojo')
    } else if (!email.value.match(REGEX_EMAIL)) {
        errorEmail.innerHTML = 'Introduce un email válido'
        cambiarColorBorde(email, 'rojo')
    } else {
        errorEmail.innerHTML = ''
        cambiarColorBorde(email)
    }
}

/**
 * Valida la edad, teniendo en cuenta que no se usen las 
 * flechas para aumentar o disminuir, sino que se escriba
 * el valor manualmente
 */
function validarEdad() {
    if (!Number.isInteger(parseInt(edad.value))) {
        errorEdad.innerHTML = 'Introduce solo números'
        cambiarColorBorde(edad, 'rojo')
    } else if (parseInt(edad.value) <= 0 || parseInt(edad.value) > 130) {
        errorEdad.innerHTML = 'Esa edad no está en el rango'
        cambiarColorBorde(edad, 'rojo')
    } else {
        errorEdad.innerHTML = ''
        cambiarColorBorde(edad)
    }
}

/**
 * Valida un teléfono de la longitud especificada (debe ser un número)
 */
function validarTelefono() {
    if (Number.isInteger(parseInt(telefono.value)) && telefono.value.length == TEL_DIGS) {
        errorTelefono.innerHTML = ''
        cambiarColorBorde(telefono)
    } else {
        errorTelefono.innerHTML = 'Introduce un teléfono válido'
        cambiarColorBorde(telefono, 'rojo')
    }
}

/**
 * Cambia el color del borde inferior de cada input que le pasemos,
 * alternando entre rojo si hay algún error y negro para dar la sensación
 * de que hemos vuelto a la situación anterior
 * @param {*} cosa 
 * @param {*} color 
 */
function cambiarColorBorde(cosa, color) {
    switch (color) {
        case 'rojo':
            cosa.setAttribute('style', 'border-bottom:1px solid #b43e69')
            break;

        default:
            cosa.setAttribute('style', 'border-bottom:1px solid black')
            break;
    }
}

/**
 * Botón de reseteo: borra la información de todos los campos.
 */
function resetear() {
    nombre.value = ''
    pass.value = ''
    email.value = ''
    edad.value = ''
    telefono.value = ''
    // También borra cualquier mensaje de error anterior
    errorNombre.innerHTML = ''
    errorPass.innerHTML = ''
    errorEmail.innerHTML = ''
    errorEdad.innerHTML = ''
    errorTelefono.innerHTML = ''
};
btnReset.addEventListener("click", resetear);

// TODO: hacer que el borde sea verde y aparezca un icono con un tick
//       cuando los datos tengan el formato correcto para enviar
//      -> añadir case: 'verde'
//      -> añadir icono font-awesome