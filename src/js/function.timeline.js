if (document.querySelector('.timeline')) {
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
	//envio de datos del formulario que se almacena enla variable
	request.send();
	//obtenemos los resultados y evaluamos

	let objData = JSON.parse(request.responseText);
	var htmlTimeline = objData;
	document.querySelector('.timeline').innerHTML = htmlTimeline;

}