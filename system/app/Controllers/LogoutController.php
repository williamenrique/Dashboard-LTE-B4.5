<?php
class Logout{
	public function __construct(){
		session_start();
		$strHoraFin = date("Y/m/d h:i:s");
		updateBitacora($_SESSION['strCodigo'],$strHoraFin);
		session_unset();
		session_destroy();
		header("Location:".base_url().'login');
	}
}