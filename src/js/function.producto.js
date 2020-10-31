window.addEventListener('load', function () {
	ftnProduct();
}, false)

/*************************
 * funcion para obtener los roles
 ************************/
function ftnProduct(id) {
	alert(id);
	let ajaxUrl = base_url + "Producto/getItem"+id;
	//creamos el objeto para os navegadores
	var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	//abrimos la conexion y enviamos los parametros para la peticion
	request.open("GET", ajaxUrl, true);
	request.send();
	request.onreadystatechange = function () {
		if (request.readyState == 4 && request.status == 200) {
			//valores obtenidos del controlador

			// document.querySelector('.listRol').innerHTML = request.responseText;
		}
	}
}

if (document.querySelector(".box_item")) {
	let ajaxUrl = base_url + "Producto/getItem"+id;
	//creamos el objeto para os navegadores
	var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	//abrimos la conexion y enviamos los parametros para la peticion
	request.open("GET", ajaxUrl, true);
	request.send();
	request.onreadystatechange = function () {
		if (request.readyState == 4 && request.status == 200) {
			//valores obtenidos del controlador

			document.querySelector(".box_item").innerHTML = request.responseText;
		}
	}
}