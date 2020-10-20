window.addEventListener('load', function () {
	ftnUsuarios();
	ftnMenu();
},false)
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
	if (document.querySelector('#listMenu')) {
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

}