const form1 = documento.getElementById('form1');
const inputs = documento.querySelectorAll('#form1 input');

const expresiones = {
	documento: /^[a-zA-Z0-9\_\-]{4,10}$/, // Letras, numeros, guion y guion_bajo
	// nombres: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	contraseña: /^.{4,12}$/, // 4 a 12 digitos.
	//correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	//telefono: /^\d{7,14}$/ // 7 a 14 numeros.
}



form1. addEventListener('submit',(e)=>{
	e.prevenDefault();
});

const campos = {
	documento: false,
	//nombre: false,
	contraseña: false
	//correo: false,
	//telefono: false
}

const validarFormulario = (e) => {
	switch (e.target.name) {
		case "documento":
			validarCampo(expresiones.usuario, e.target, 'documento');
		break;
		//case "nombre":
			//validarCampo(expresiones.nombre, e.target, 'nombre');
		//break;
		case "contraseña":
			validarCampo(expresiones.password, e.target, 'contraseña');
			validarPassword2();
		//break;
		//case "password2":
		//	validarPassword2();
		//break;
		case "correo":
			validarCampo(expresiones.correo, e.target, 'correo');
		break;
		//case "telefono":
			//validarCampo(expresiones.telefono, e.target, 'telefono');
		//break;
	}
}

const validarCampo = (expresion, input, campo) => {
	if(expresion.test(input.value)){
		documento.getElementById(`grupo__${campo}`).classList.remove('formulario__documento-incorrecto');
		documento.getElementById(`grupo__${campo}`).classList.add('formulario__docuemnto-correcto');
		documento.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
		documento.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
		documento.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos[campo] = true;
	} else {
		documento.getElementById(`grupo__${campo}`).classList.add('formulario__documento-incorrecto');
		documento.getElementById(`grupo__${campo}`).classList.remove('formulario__documento-correcto');
		documento.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
		documento.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
		documento.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos[campo] = false;
	}
}

const validarPassword2 = () => {
	const inputPassword1 = document.getElementById('password');
	const inputPassword2 = document.getElementById('password2');

	if(inputPassword1.value !== inputPassword2.value){
		document.getElementById(`grupo__password2`).classList.add('formulario__grupo-incorrecto');
		documento.getElementById(`grupo__password2`).classList.remove('formulario__grupo-correcto');
		documento.querySelector(`#grupo__password2 i`).classList.add('fa-times-circle');
		documento.querySelector(`#grupo__password2 i`).classList.remove('fa-check-circle');
		documento.querySelector(`#grupo__password2 .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos['password'] = false;
	} else {
		document.getElementById(`grupo__password2`).classList.remove('formulario__grupo-incorrecto');
		documento.getElementById(`grupo__password2`).classList.add('formulario__grupo-correcto');
		documento.querySelector(`#grupo__password2 i`).classList.remove('fa-times-circle');
		documento.querySelector(`#grupo__password2 i`).classList.add('fa-check-circle');
		documento.querySelector(`#grupo__password2 .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos['password'] = true;
	}
}

inputs.forEach((input) => {
	input.addEventListener('keyup', validarFormulario);
	input.addEventListener('blur', validarFormulario);
});

form1.addEventListener('submit', (e) => {
	e.preventDefault();

	const terminos = documento.getElementById('terminos');
	if(campos.usuario && campos.nombre && campos.password && campos.correo && campos.telefono && terminos.checked ){
		form1.reset();

		documento.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo');
		setTimeout(() => {
			documento.getElementById('formulario__mensaje-exito').classList.remove('formulario__mensaje-exito-activo');
		}, 5000);

		documento.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
			icono.classList.remove('formulario__grupo-correcto');
		});
	} else {
		documento.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
	}
});