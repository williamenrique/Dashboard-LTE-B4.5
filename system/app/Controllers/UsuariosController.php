<?php
class Usuarios extends Controllers{

	public function __construct(){
		session_start();
		if (empty($_SESSION['login'])) {
			header("Location:".base_url().'login');
		}
		parent::__construct();
	}
	public function usuarios(){
		$data['page_id'] = 4;
		$data['page_tag'] = "Usuarios";
		$data['page_title'] = "Dashboard - Usuarios";
		$data['page_name'] = "usuarios";
		$data['page_menu'] = "usuarios";
		$data['page_link'] = "usuarios";
		$data['page_menu_open'] = "usuario";
		$data['page_link_acitvo'] = "link-user";
		$data['page_functions'] = "function.user.js";
		$this->views->getViews($this, "usuarios", $data);
	}

	public function setUser(){
		if($_POST){
			$idUser = intval($_POST['idUsuario']);
			$intIdentificacion = intval(strClean($_POST['txtIdentificacion']));
			$strTxtNombre = ucwords(strClean($_POST['txtNombres']));//convierte las primeras letras en mayusculas
			$strtxtApellidos = ucwords(strClean($_POST['txtApellidos']));//convierte las primeras letras en mayusculas
			$intTxtTlf = intval(strClean($_POST['txtTlf']));
			$strTxtEmail = strtolower($_POST['txtEmail']);//convierte todas las letras en minusculas
			$intListStatus = intval($_POST['listStatus']);
			$intlistRolId = intval($_POST['listRolId']);
			if(empty($_POST['txtIdentificacion']) || empty($_POST['txtNombres'] )|| empty($_POST['txtApellidos'] ) ||
				empty($_POST['txtTlf']) || empty($_POST['txtEmail']) || empty($_POST['listStatus']) || empty($_POST['listRolId'])) {
				$arrResponse = array("status" => false, "msg" => "Debe llenar los campos");
			}else{
				if($idUser == 0){
					/*********************
					 crear una variable password si esta vacio se genera un password
					encriptada para que no sea vista
					*/
					$option = 1;
					$strTxtPass = encryption(passGenerator());
					//al generar el pass se envia al modelo
					$requestUser = $this->model->insertUser($intIdentificacion, $strTxtNombre, $strtxtApellidos, $intTxtTlf, $strTxtEmail,
					$intListStatus, $intlistRolId, $strTxtPass);
					
				}else{
					$option = 2;
					$requestUser = $this->model->updateRolUser($idUser,$intIdentificacion,$strTxtEmail,$intlistRolId);
				}
				//evaluamos el request
				if($requestUser > 0){
					if($option == 1){
						$arrResponse = array("status" => true, "msg" => "Se a creado el usuario");
						//opcion para actualizar el nick al crearse el usuario
						$userNIck = substr($strTxtNombre,0,1).substr($strtxtApellidos,0,1).'-0'.$requestUser;
						$fileBase = "system/app/Views/Docs/". $userNIck . "/";
						//$fileHash = substr(md5($fileBase . uniqid(microtime() . mt_rand())), 0, 8);
						// creo carpeta en servidor si no existe
						if (!file_exists($fileBase))
						mkdir($fileBase, 0777, true);
						$createNick= $this->model->createNick($requestUser, $intIdentificacion,$strTxtEmail, $userNIck,$intlistRolId,$fileBase);
					}else{
						$arrResponse = array("status" => true, "msg" => "Cambio de rol exitoso");
					}
				}else if($requestUser == 'exist'){
					$arrResponse = array("status" => false, "msg" => "Atencion! email o identificacion ya existe ingrese otro");
				}else{
					$arrResponse = array("status" => false, "msg" => "Atencion! imposible almacenar datos");
				}
			}
		 echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}
	/**************************
	 * funcion para llamar a los usuarios
	 *************************/
	public function getUsers(){
		$arrData = $this->model->selectUsers();
		for ($i=0; $i < count($arrData) ; $i++) {
			$arrData[$i]['rol_name'] = '<a style="font-size: 15px; cursor:pointer" onclick="fntEditUser('.$arrData[$i]['user_id'].')">'.$arrData[$i]['rol_name'].'</a>';
			if ($arrData[$i]['user_status'] == 1) {
				$arrData[$i]['user_status'] = '<a style="font-size: 15px; cursor:pointer" class="badge badge-info" onClick="fntStatus(2,'.$arrData[$i]['user_id'].')">Activo</a>';
			}else{
				$arrData[$i]['user_status'] = '<a style="font-size: 15px; cursor:pointer" class="badge badge-warning" onClick="fntStatus(1,'.$arrData[$i]['user_id'].')">Inactivo</a>';
			}
			$arrData[$i]['opciones'] ='<div class="">
																	<button type="button" class="btn btn-secondary btn-sm btnViewUser" onClick="fntViewUser('.$arrData[$i]['user_id'].')" title="Ver"><i class="far fa-eye" aria-hidden="true"></i></button>
																	<button type="button" class="btn btn-danger btn-sm btnDelUser" onClick="fntDelUser('.$arrData[$i]['user_id'].')" title="Eliminar"><i class="fa fa-trash" aria-hidden="true"></i></button>
																</div>';
		}
		//convertir el arreglo de datos en un formato json
		echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
		die();
	}
	//obtener datos de un usuario
	public function getUser(int $idUserI){
		$idUser = intval($idUserI);
		if($idUser > 0){
			$arrData = $this->model->selectUser($idUser);
			if(empty($arrData)){
				$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados');
			}else{
				$fecha = array('fecha_reg'=> formatear_fecha($arrData['fechaRegistro']));
				$data = $arrData + $fecha;
				$arrResponse = array('status' => true, 'data' => $data);
			}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}
		die();
	}
	//eliminar usuario
	public function delUser(){
		if($_POST){
			$idUser = intval($_POST['idUser']);
			$requestDel = $this->model->deleteUser($idUser);
			if($requestDel){
				$arrResponse = array('status' => true, 'msg' => 'Usuario eliminado');
			}else{
				$arrResponse = array('status' => false, 'msg' => 'Error al eliminar');
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}
		die();
	}
	//deshabilitar usuario
	public function statusUser(){
		if($_POST){
			$statusUser = intval($_POST['status']);
			$idUser = intval($_POST['idUser']);
			$requestStatus = $this->model->statusUser($idUser,$statusUser);
			if($requestStatus){
				if($requestStatus == 1){
				$arrResponse = array('status' => true, 'msg' => 'Usuario Habilitado', 'estado' => 1);
			}else if($requestStatus == 2){
				$arrResponse = array('status' => true, 'msg' => 'Usuario Deshabilitado','estado' => 2);
			}
			}else{
				$arrResponse = array('status' => false, 'msg' => 'Error al cambiar status');
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}
		die();
	}
	/************
	 * para cargar los datos del usuario en el perfil
	 */
	public function perfil(){
		$data['page_tag'] = "Perfil";
		$data['page_title'] = "Dashboard - Perfil Usuarios";
		$data['page_name'] = "perfil";
		$data['page_menu'] = "";
		$data['page_link'] = "usuario";
		$data['page_menu_open'] = "";
		$data['page_link_acitvo'] = "";
		$data['page_functions'] = "function.user.js";
		$this->views->getViews($this, "perfil", $data);
	}
	/**********
	 * actualizar perfil del usuario
	 */
	public function UpdatePerfil(){
		if($_POST){
			//validamos si no existe algun valor
			if($_POST['opcion'] == 1){
				if(empty($_POST['textNombres']) || empty($_POST['textApellidos'] ) || empty($_POST['textTlf'])) {
					$arrResponse = array("status" => false, "msg" => "Datos Incorrectos");
				}else{
					$idUser = intval($_POST['textId']);
					$strTxtNombre = ucwords($_POST['textNombres']);//convierte las primeras letras en mayusculas
					$strtxtApellidos = ucwords($_POST['textApellidos']);//convierte las primeras letras en mayusculas
					$intTxtTlf = intval($_POST['textTlf']);
					$strTxtEmail = strtolower($_POST['textEmail']);//convierte todas las letras en minusculas
					$strTxCi = $_POST['textCi'];
					$strTxtNick = "a";
					$intOption = 1;
					$strTxtPass = "a";
					$filebase = "a";
					$requestUser = $this->model->updatePerfil($idUser, $strTxtNombre, $strtxtApellidos, $intTxtTlf,$strTxCi,$strTxtEmail, $strTxtPass, $strTxtNick ,$intOption,$filebase);
					//comprovamos la existencia del usuario si no se actualiza correctamente
					if($requestUser > 0){
						$arrResponse = array("status" => true, "msg" => "Datos actualizados correctamente"); 
						sessionUser($_SESSION['idUser']);
					}else{
						$arrResponse = array("status" => false, "msg" => "No es posible almacenar ls datos");
					}
				}
			}else	if($_POST['opcion'] == 2){
				if(empty($_POST['textNick'])) {
					$arrResponse = array("status" => false, "msg" => "Campo nick debe llenarlo");
				}else{
					$idUser = intval($_POST['textId']);
					$strTxtNombre = ucwords('a');//convierte las primeras letras en mayusculas
					$strtxtApellidos = ucwords('a');//convierte las primeras letras en mayusculas
					$intTxtTlf = intval(1);
					$strTxtEmail = strtolower($_POST['textEmail']);//convierte todas las letras en minusculas
					$strTxCi = $_POST['textCi'];
					$strTxtNick = $_POST['textNick'];
					$intOption = 2;
					$strTxtPass = "a";
					$filebase = "a";
					$requestUser = $this->model->updatePerfil($idUser, $strTxtNombre, $strtxtApellidos, $intTxtTlf,$strTxCi,$strTxtEmail, $strTxtPass, $strTxtNick, $intOption,$filebase);
					//comprovamos la existencia del usuario si no se actualiza correctamente
					if($requestUser > 0){
						$arrResponse = array("status" => true, "msg" => "Cambio de usuario correcto"); 
						sessionUser($_SESSION['idUser']);
					}else if($requestUser == "exist"){
						$arrResponse = array("status" => false, "msg" => "Usuario seleccionado ya esta en uso");
					}else{
						$arrResponse = array("status" => false, "msg" => "No es posible almacenar los datos");
					}
				}
			}else	if($_POST['opcion'] == 3){
				if(empty($_POST['textPassConfirm'])) {
					$arrResponse = array("status" => false, "msg" => "Clave no puede estar vacia");
				}else if($_POST['textPass'] == $_POST['textPassConfirm']){
					$idUser = intval($_POST['textId']);
					$strTxtNombre = "a";//convierte las primeras letras en mayusculas
					$strtxtApellidos = "a";//convierte las primeras letras en mayusculas
					$intTxtTlf = 1;
					$strTxtEmail = strtolower($_POST['textEmail']);//convierte todas las letras en minusculas
					$strTxCi = $_POST['textCi'];
					$strTxtNick = "a";
					$intOption = 3;
					$fileBase= "a";
					$strTxtPass = encryption($_POST['textPassConfirm']) ;
					$requestUser = $this->model->updatePerfil($idUser, $strTxtNombre, $strtxtApellidos, $intTxtTlf,$strTxCi,$strTxtEmail, $strTxtPass, $strTxtNick, $intOption,$fileBase);
					//comprovamos la existencia del usuario si no se actualiza correctamente
					if($requestUser > 0){
						$arrResponse = array("status" => true, "msg" => "Cambio de password correctamente"); 
					}else{
						$arrResponse = array("status" => false, "msg" => "No es posible almacenar los datos");
					}
				}else{
					$arrResponse = array("status" => false, "msg" => "Claves no coinciden");
				}
			}
			// sessionUser($_SESSION['idUser']);
			//convertir los datos en una array JSON para poder leerlos en javascript
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

		/************
	 * para cargar los usuarios de alta
	 */
	public function alta(){
		$data['page_title'] = "Dashboard - Usuarios de alta";
		$data['page_tag'] = "Usuarios de alta";
		$data['page_name'] = "alta";
		// $data['page_menu'] = "alta";
		$data['page_menu_open'] = "usuario";//abrir el menu
		$data['page_link'] = "usuarios";//activar el menu
		$data['page_link_acitvo'] = "link-alta";//link activo submenu
		$data['page_functions'] = "function.user.js";
		$this->views->getViews($this, "alta", $data);
	}

	// cargar usuarios
	public function getUserHigh(){
		$arrData = $this->model->selectUsersHigh();
		for ($i=0; $i < count($arrData) ; $i++) {
			$arrData[$i]['rol_name'] = '<a style="font-size: 15px; cursor:pointer" onclick="fntEditUser('.$arrData[$i]['user_id'].')">'.$arrData[$i]['rol_name'].'</a>';
			if ($arrData[$i]['user_status'] == 0) {
				$arrData[$i]['user_status'] = '<a style="font-size: 15px; cursor:pointer" class="badge badge-secondary" onClick="fntStatus(1,'.$arrData[$i]['user_id'].')">Dado de baja</a>';
			}
		}
		echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
		die();
	}

			/************
	 * para cargar los usuarios de alta
	 */
	public function pendiente(){
		$data['page_title'] = "Dashboard - Usuarios pendientes";
		$data['page_tag'] = "Usuarios pendientes";
		$data['page_name'] = "pendiente";
		$data['page_menu_open'] = "usuario";//abrir el menu
		$data['page_link'] = "usuarios";//activar el menu
		$data['page_link_acitvo'] = "link-pendiente";//link activo submenu
		$data['page_functions'] = "function.user.js";
		$this->views->getViews($this, "pendiente", $data);
	}

	public function getUserPend(){
		$arrData = $this->model->selectUsersPend();
		$htmlOptions = "";
		$getRoles = $this->model->getRoles();
		$roles ="";
		foreach ($getRoles as $value){
			$roles .= '
									<div class="custom-control custom-radio">
										<input class="custom-control-input" name="radioRol" type="radio" id="'.$value["rol_name"].'" value="'.$value["rol_id"].'">
										<label for="'.$value["rol_name"].'" class="custom-control-label">'.$value["rol_name"].'</label>
									</div>';
		}
		foreach ($arrData as $key) {
			$htmlOptions .= '
											<div class="col-lg-3 col-6">
												<div class="small-box bg-info">
													<div class="inner">
														<h6>'.$key['user_nombres'].' <strong>'.$key['user_nick'].'</strong></h6>
														<ul>
															<li>Estado <span class="badge badge-warning">Pendiente</span></li>
															<li>Cargo <span class="badge badge-danger">No posee</span></li>
														</ul>
														<span>Seleccione cargo</span>
														<div class="form-group">
															'.$roles.'
														</div>
													</div>
													<span class="ml-2" style="font-size: 10px">'.formatear_fecha($key['user_registro']).'</span>
													<div class="icon">
														<i class="ion ion-bag"></i>
													</div>
													<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
												</div>
											</div>';
		}
		echo $htmlOptions;
		die();
	}
}


/*
$arrData[$i]['rol_name'] = '<a style="font-size: 15px; cursor:pointer" onclick="fntEditUser('.$arrData[$i]['user_id'].')">No posee rol</a>';
			if ($arrData[$i]['user_status'] == 1) {
				$arrData[$i]['user_status'] = '<a style="font-size: 15px; cursor:pointer" class="badge badge-info" onClick="fntStatus(2,'.$arrData[$i]['user_id'].')">Activo</a>';
			}else{
				$arrData[$i]['user_status'] = '<a style="font-size: 15px; cursor:pointer" class="badge badge-warning" onClick="fntStatus(1,'.$arrData[$i]['user_id'].')">Inactivo</a>';
			}



for ($i=0; $i < count($arrData) ; $i++) {
			$htmlOptions .= '
											<div class="col-lg-3 col-6">
												<div class="small-box bg-info">
													<div class="inner">
														<h6>'.$arrData[$i]['user_nombres'].' <strong>'.$arrData[$i]['user_nick'].'</strong></h6>
														<ul>
															<li>Estado <span class="badge badge-warning">Pendiente</span></li>
															<li>Cargo <span class="badge badge-danger">No posee</span></li>
															<span>Seleccione cargo</span>
															<ul>';
														for ($j=0; $j < count($getRoles); $j++) { 
															$htmlOptions .=	$getRoles[$j]['rol_name'];
														}
															'</ul>
														</ul>
													</div>
													<span class="ml-2" style="font-size: 10px">'.formatear_fecha($arrData[$i]['user_registro']).'</span>
													<div class="icon">
														<i class="ion ion-bag"></i>
													</div>
													<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
												</div>
											</div>';
			}




			*/