<?php
//retorna la ruta del proyecto
function base_url(){
	return BASE_URL;	
}

function header_admin($data = ""){
	$view_header = VIEWS."ModulesAdmin/header.php";
	require_once  $view_header;
}

function footer_admin($data = ""){
	$view_footer = VIEWS."ModulesAdmin/footer.php";
	require_once  $view_footer;
}

function getModal(string $nameModal, $data){
	$view_modal = VIEWS."ModulesAdmin/Modals/{$nameModal}.php";
	require_once $view_modal;
}


//funciones para la pgina inicial del cliente
function header_main($data = ""){
	$view_header = VIEWS."ModulesMain/header.php";
	require_once  $view_header;
}

function footer_main($data = ""){
	$view_footer = VIEWS."ModulesMain/footer.php";
	require_once  $view_footer;
}
//muestra informacion formateada
function dep($data){
	$format = print_r('<pre>');
	$format = print_r($data);
	$format = print_r('</pre>');
	return $format;
}
function encryption($string){
	$output=FALSE;
	$key=hash('sha256', SECRET_KEY);
	$iv=substr(hash('sha256', SECRET_IV), 0, 16);
	$output=openssl_encrypt($string, METHOD, $key, 0, $iv);
	$output=base64_encode($output);
	return $output;
}
function decryption($string){
	$key=hash('sha256', SECRET_KEY);
	$iv=substr(hash('sha256', SECRET_IV), 0, 16);
	$output=openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);
	return $output;
}
function formatear_timestamp($fecha){
	$dia = date('w', $fecha);
	$dias = ["Lun", "Mar", "Mie", "Jue", "Vie", "Sab", "Dom"];
	$mes = date("m", strtotime($fecha));
	$meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
	$salida = $dias[$dia-1].', '.date("d", strtotime($fecha)).' de '.$meses[$mes-1].' a las '.date("G:i a", strtotime($fecha));
	return $salida;
}

function formatear_fecha($fecha){
	$dia = date('w', strtotime($fecha));
	$dias = ["Lun", "Mar", "Mie", "Jue", "Vie", "Sab", "Dom"];
	$mes = date("m", strtotime($fecha));
	$ano = date("Y", strtotime($fecha));
	$meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
	$salida = $dias[$dia-1].', '.date("d", strtotime($fecha)).' de '.$meses[$mes-1].' · '.$ano;
	return $salida;
}
function sessionUser(int $idUser){
	require_once ("system/app/Models/LoginModel.php");
	$objLogin = new LoginModel();
	$request = $objLogin->sessionLogin($idUser);
	return $request;
}
function strClean($srtCadena){
	$string = preg_replace(['/\s+/','/^\s|\s$/'],[' ',''],$srtCadena);
	$string = trim($srtCadena);
	$string = stripslashes($srtCadena);
	$string = str_ireplace("<script>","",$string);
	$string = str_ireplace("</script>","",$string);
	$string = str_ireplace("<script src>","",$string);
	$string = str_ireplace("<script type=>","",$string);
	$string = str_ireplace("SELECT * FROM ","",$string);
	$string = str_ireplace("DELETE * FROM ","",$string);
	$string = str_ireplace("INSERT INTO ","",$string);
	$string = str_ireplace("SELECT COUNT(*) FROM ","",$string);
	$string = str_ireplace("DELETE TABLE ","",$string);
	$string = str_ireplace("DROP TABLE ","",$string);
	$string = str_ireplace("OR '1'='1' ","",$string);
	$string = str_ireplace('OR "1"="1" ',"",$string);
	$string = str_ireplace("IS NULL; --","",$string);
	$string = str_ireplace('LIKE "',"",$string);
	$string = str_ireplace("LIKE '","",$string);
	$string = str_ireplace("--","",$string);
	$string = str_ireplace("^","",$string);
	$string = str_ireplace("[","",$string);
	$string = str_ireplace("]","",$string);
	$string = str_ireplace("==","",$string);

	return $string;
}

function passGenerator($length = 10){
	$pass = "";
	$longitud = $length;
	$cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
	$longitudcadena = strlen($cadena);
	for ($i=1; $i <= $longitud; $i++) { 
		$pas = rand(0, $longitudcadena -1);
		$pass .= substr($cadena,$pas,1);
	}
	return $pass;
}

function token(){
	$sr1 = bin2hex(random_bytes(10));
	$sr2 = bin2hex(random_bytes(10));
	$sr3 = bin2hex(random_bytes(10));
	$sr4 = bin2hex(random_bytes(10));
	$token = $sr1 .'-'.$sr2.'-'.$sr3.'-'.$sr4;
	return $token;
}
function formatMoney($cant){
	$cant = number_format($cant,2,SPD,SPM);
	return $cant;
}