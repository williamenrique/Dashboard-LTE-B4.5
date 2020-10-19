document.addEventListener('DOMContentLoaded', function () {
	/************************************************* 
	 * creamos el objeto de envio para tipo de navegador
	 * hacer una validacion para diferentes navegadores y crear el formato de lectura
	 * y hacemos la peticion mediante ajax
	 * usando un if reducido creamos un objeto del contenido en(request)
	 *****************************************************/
	let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	let ajaxUrl = base_url + 'TimeLine/getTimeline';
	//prepara los datos por ajax preparando el dom
	request.open('GET', ajaxUrl, true);
	//hacemos el envio al servidor
	request.send();
	//obtenemos los resultados y evaluamos
	var timeline = document.querySelector('.timeline');

	request.onreadystatechange = function () { 
		if (request.readyState == 4 && request.status == 200) {
			document.querySelector('.timeline').innerHTML = request.responseText;
		}
	}
},false)