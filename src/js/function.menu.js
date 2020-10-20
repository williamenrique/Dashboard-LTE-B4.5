window.addEventListener('load', function () {
	ftnUsuarios();
	ftnMenu();
	ftnMenu1();
	ftnSubMenu();
}, false)

/************
 * envio de formulario de menu
 */
if (document.querySelector(".formMenu")) {
	var formMenu = document.querySelector('.formMenu');
		//agregar el evento al boton del formulario
	formMenu.onsubmit = function (e) {
		e.preventDefault();
		var intIdUser = document.querySelector('#listUser').value;
		var intListMenu = document.querySelector('#listMenu').value;
		// var intlistRolId = document.querySelector('#subMenu').value;

		let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		let ajaxUrl = base_url + 'Menu/setMenuUser';
		//creamos un objeto del formulario con los datos haciendo referencia a formData
		let formData = new FormData(formMenu );
		//prepara los datos por ajax preparando el dom
		request.open('POST', ajaxUrl, true);
		//envio de datos del formulario que se almacena enla variable
		request.send(formData);
					//obtenemos los resultados
		request.onreadystatechange = function () {
			if (request.readyState == 4 && request.status == 200) {
				//obtenemos los datos y convertimos en JSON
				let objData = JSON.parse(request.responseText);
				//leemos el ststus de la respuesta
				if (objData.status) {
					Swal.fire('Asignacion correcto', objData.msg, 'success');
					tableUser.ajax.reload();
				} else {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: objData.msg
					})
				}
			}
		}
	}
}


/*
		$(document).on('click', menu, function (event) {
		var intListMenu = document.querySelector('#listMenu').value;
		let ajaxUrl = base_url + "Menu/getSubMenus";
		//creamos el objeto para os navegadores
		var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		//abrimos la conexion y enviamos los parametros para la peticion
		request.open("GET", ajaxUrl, true);
		request.send();
		request.onreadystatechange = function () {
			if (request.readyState == 4 && request.status == 200) {
				//option obtenidos del controlador
				document.querySelector('.listSubmenu').innerHTML = request.responseText;
			}
		}
	})
*/

/*************************
 * funcion para obtener los roles de usuarios
 ************************/
function ftnUsuarios() {
	if (document.querySelector('#listUser')) {
		let ajaxUrl = base_url + "Menu/getUsers";
		//creamos el objeto para os navegadores
		var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		//abrimos la conexion y enviamos los parametros para la peticion
		request.open("GET", ajaxUrl, true);
		request.send();
		request.onreadystatechange = function () {
			if (request.readyState == 4 && request.status == 200) {
				//option obtenidos del controlador
				document.querySelector('#listUser').innerHTML = request.responseText;
				//seleccionando el primer option
				document.querySelector('#listUser').value = 1;
				$("#listUser").selectpicker('render');
			}
		}
		
	}

}

function ftnMenu() {
		let ajaxUrl = base_url + "Menu/getMenu";
		//creamos el objeto para os navegadores
		var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		//abrimos la conexion y enviamos los parametros para la peticion
		request.open("GET", ajaxUrl, true);
		request.send();
		request.onreadystatechange = function () {
			if (request.readyState == 4 && request.status == 200) {
				//option obtenidos del controlador
				document.querySelector('#listMenu').innerHTML = request.responseText;
				//seleccionando el primer option
				document.querySelector('#listMenu').value = 1;
				$("#listMenu").selectpicker('render');
			}
		}
}
function ftnMenu1() {
	if (document.querySelector('#listMenuAsignar')) {
		let ajaxUrl = base_url + "Menu/getMenu";
		//creamos el objeto para os navegadores
		var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		//abrimos la conexion y enviamos los parametros para la peticion
		request.open("GET", ajaxUrl, true);
		request.send();
		request.onreadystatechange = function () {
			if (request.readyState == 4 && request.status == 200) {
				//option obtenidos del controlador
				document.querySelector('#listMenuAsignar').innerHTML = request.responseText;
				//seleccionando el primer option
				document.querySelector('#listMenuAsignar').value = 1;
				$("#listMenuAsignar").selectpicker('render');
			}
		}
		
	}
}

function ftnSubMenu() {
	if (document.querySelector('.listSubmenu')) {
		let ajaxUrl = base_url + "Menu/getSubMenu";
		//creamos el objeto para os navegadores
		var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		//abrimos la conexion y enviamos los parametros para la peticion
		request.open("GET", ajaxUrl, true);
		request.send();
		request.onreadystatechange = function () {
			if (request.readyState == 4 && request.status == 200) {
				//option obtenidos del controlador
				document.querySelector('.listSubmenu').innerHTML = request.responseText;
			}
		}
		
	}
}

/********
 * llamar al submenu dependiendo el menu
 */
var menu = document.querySelector('#listMenuAsignar');
menu.addEventListener('change',function(){
	var selectedOption = this.options[menu.selectedIndex];
	// console.log(selectedOption.value + ': ' + selectedOption.text);
	let ajaxUrl = base_url + "Menu/getSubs/" + selectedOption.value;
	//creamos el objeto para os navegadores
	var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	//abrimos la conexion y enviamos los parametros para la peticion
	request.open("GET", ajaxUrl, true);
	request.send();
	request.onreadystatechange = function () {
	if (request.readyState == 4 && request.status == 200) {
		//option obtenidos del controlador
		document.querySelector('.listSubmenuAsignar').innerHTML = request.responseText;
		}
	}
	// console.log(selectedOption.value + ': ' + selectedOption.text);
});


if (document.querySelector(".formMenuAsignar")) {
	var formMenuAsignar = document.querySelector('.formMenuAsignar');
		//agregar el evento al boton del formulario
	formMenuAsignar.onsubmit = function (e) {
		e.preventDefault();
		var menu = document.querySelector('#listMenuAsignar');
		menu.addEventListener('change', function(){
			var selectedOption = this.options[menu.selectedIndex];
			// console.log(selectedOption.value + ': ' + selectedOption.text);
			let ajaxUrl = base_url + "Menu/getSubs" + selectedOption.value;
			//creamos el objeto para os navegadores
			var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
			//abrimos la conexion y enviamos los parametros para la peticion
			request.open("GET", ajaxUrl, true);
			request.send();
			request.onreadystatechange = function () {
				if (request.readyState == 4 && request.status == 200) {
					//option obtenidos del controlador
				}
			}
		})
	}
}