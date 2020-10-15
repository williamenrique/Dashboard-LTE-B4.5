<?php

class Login extends Controllers{
	public function __construct(){
		session_start();
		if (isset($_SESSION['login'])) {
			header("Location:".base_url().'dashboard');
		}
		//invocar para que se ejecute el metodo de la herencia
		parent::__construct();
	}
	public function login(){
		//invocar la vista con views y usamos getViews y pasamos parametros esta clase y la vista
		//incluimos un arreglo que contendra toda la informacion que se enviara al home
		$data['page_title'] = "Login";
		$data['page_userImg'] = "usuario/default.png";
		$data['page_userNomb'] = "William Enrique";
		$data['page_userRol'] = "Administrador";
		$data['page_name'] = "login";
		$data['page_functions'] = "functionLogin.js";
		$this->views->getViews($this, "login", $data);
	}
	public function loginUser(){
		// dep($_POST);
		// die();
		if($_POST){
			if(empty($_POST['textUser']) || empty($_POST['textPass'])){
				$arrResponse = array('status' => false, 'msg' => 'Error en datos');
			}else{
				$strUser = strtolower($_POST['textUser']);
				$strPass = encryption($_POST['textPass']);
				$requestUser = $this->model->loginUser($strUser,$strPass);
				if(empty($requestUser)){
					$arrResponse = array('status' => false, 'msg' => 'El usuario o el password es incorrecto');
				}else{
					$arrData = $requestUser;
					if ($arrData['user_status'] == 1) {
						$_SESSION['idUser'] = $arrData['user_id'];
						$_SESSION['login'] = true;
						$arrData = $this->model->sessionLogin($_SESSION['idUser']);
						//creamos la variable de sesion mediante un helper
						sessionUser($_SESSION['idUser']);
						$arrResponse = array('status' => true, 'msg' => 'ok');
					}else{
						$arrResponse = array('status' => false, 'msg' => 'El usuario inactivo');
					}
				}
				echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
			}
		}
		die();
	}
}