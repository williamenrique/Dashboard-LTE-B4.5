<?php
class Menu extends Controllers{

	public function __construct(){
		session_start();
		if (empty($_SESSION['login'])) {
			header("Location:".base_url().'login');
		}
		parent::__construct();
	}
	public function menu(){
		$data['page_id'] = 3;
		$data['page_tag'] = "Menu Usuario";
		$data['page_title'] = "Dashboard - Menu Usuario";
		$data['page_name'] = "menu_usuarios";
		$data['page_menu'] = "menu";
		$data['page_link'] = "menus";
		$data['page_menu_open'] = "menu";
		$data['page_link_acitvo'] = "link-menu";
		$data['page_functions'] = "function.menu.js";
		$this->views->getViews($this, "menu", $data);
	}
	// obtener roles
	public function getRoles(){
		$htmlOptions = "";
		$arrData = $this->model->selectRoles();
		if(count($arrData) > 0){
			$htmlOptions .= '<option value="noselected">Seleccione</option>';
			for ($i=0; $i < count($arrData); $i++) { 
				$htmlOptions .= '<option value="'.encryption($arrData[$i]['rol_id']).'">'.$arrData[$i]['rol_name'].'</option>';
			}
		}
		echo $htmlOptions;
		die();
	}
	//obtener los menu
	public function getMenu(){
		$htmlOptions = "";
		$arrData = $this->model->selectMenu();
		if(count($arrData) > 0){
			$htmlOptions .= '<option value="noselected">Seleccione</option>';
			for ($i=0; $i < count($arrData); $i++) { 
				$htmlOptions .= '<option value="'.$arrData[$i]['id_menu'].'">'.$arrData[$i]['nombre_menu'].'</option>';
			}
		}
		echo $htmlOptions;
		die();
	}
	// obtener los submenu parte 1
	public function getSubMenu(){
		$htmlOptions = "";
		$arrData = $this->model->selectSubMenu();
		if(count($arrData) > 0){
			for ($i=0; $i < count($arrData); $i++) { 
				$htmlOptions .= '<div class="custom-control custom-checkbox">
												  <input class="custom-control-input" type="checkbox" id="'.$arrData[$i]['nombre_sub_menu'].'" name="subMenu[]" value="'.$arrData[$i]['id_sub_menu'].'">
												  <label for="'.$arrData[$i]['nombre_sub_menu'].'" class="custom-control-label">'.$arrData[$i]['nombre_sub_menu'].'</label>
											   </div>';
			}
		}
		echo $htmlOptions;
		die();
	}
	// obtener los submenu extraidos de los menu
	public function getSubs($intIdMenu){
		$htmlOptions = "";
		if($intIdMenu != 'noselected'){
			$arrData = $this->model->getSubMenu($intIdMenu);
			if(count($arrData) > 0){
				$htmlOptions .= '	<label for="listSubmenuAsignar">Seleccione Submenu</label>
															<div class="form-group">';
				for ($i=0; $i < count($arrData); $i++) { 
					$htmlOptions .= '<div class="custom-control custom-checkbox">
														<input class="custom-control-input" type="checkbox" id="asig_'.$arrData[$i]['nombre_sub_menu'].'" name="subMenu[]" value="'.$arrData[$i]['id_sub_menu'].'">
														<label for="asig_'.$arrData[$i]['nombre_sub_menu'].'" class="custom-control-label">'.$arrData[$i]['nombre_sub_menu'].'</label>
													 </div>';
				}
				$htmlOptions .= '</div>';
			}
		}
		echo $htmlOptions;
		die();
	}
	/**********
	 * funciones para asociar los menu a los submenu
	 * y los roles
	 */
	// asociar menu con submenu
	public function setMenuSub(){
		if($_POST['listMenu'] == "noselected"){
			$arrResponse = array("status" => false, "msg" => "Debe seleccionar un menu");
		}else{
				if(!isset($_POST['subMenu'])){
					$arrResponse = array("status" => false, "msg" => "Debe seleccionar al menos un submenu");
			}else{
				$intIdMenu = $_POST['listMenu'];
				$intIdSubMenu = $_POST['subMenu'];
				$request = $this->model->insertMenuSub($intIdMenu,$intIdSubMenu);
				if($request > 0){
					$arrResponse = array("status" => true, "msg" => "Menu y submenu agregados correctamente");
				}else{
					$arrResponse = array("status" => false, "msg" => "Error en la asignacion de menu");
				}
			}
		}
		echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		die();
	}
	// envio de datos asociar rol y submenu
	public function setRolSub(){
		if($_POST['listrol'] == 'noselected'){
			$arrResponse = array("status" => false, "msg" => "Debe seleccionar un rol");
		}else{
			if($_POST['listMenuAsignar'] == 'noselected'){
				$arrResponse = array("status" => false, "msg" => "Debe seleccionar un menu");
			}else{
				if(!isset($_POST['subMenu'])){
					$arrResponse = array("status" => false, "msg" => "Debe seleccionar al menos un submenu");
				}else{
					$intIdSubMenu = $_POST['subMenu'];
					$intIdRol = decryption($_POST['listrol']);
					$request = $this->model->insertRolSub($intIdRol,$intIdSubMenu);
					if($request > 0){
						$arrResponse = array("status" => true, "msg" => "Asignacion de rol y submenu exitoso");
					}else{
						$arrResponse = array("status" => false, "msg" => "Error en la asignacion");
					}
				}
			}
		}
		echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		die();
	}

	/***********
	 * funcion para vista de usuarios menu
	 */
	public function lista(){
		$data['page_id'] = 3;
		$data['page_tag'] = "Menu Lista";
		$data['page_title'] = "Dashboard - Menu Lista";
		$data['page_name'] = "menu_usuarios";
		$data['page_menu'] = "menu";//menu
		$data['page_link'] = "menus";//menu
		$data['page_menu_open'] = "menu";//menu
		$data['page_link_acitvo'] = "link-lista";//para submenu
		$data['page_functions'] = "function.lista.js";
		$this->views->getViews($this, "lista", $data);
	}

	public function listMenu(){
		$htmlOptions = "";
		$id_menu = "";
		$selectuser = $this->model->listaUser();
		foreach ($selectuser as $key ) {
			$request = $this->model->listaMenu($key['user_nick']);
			$htmlOptions .= '<div class="col-md-4">
												<div class="card">
													<div class="card-header">
														<h3 class="card-title text-center">
															'.$key['user_nombres'].'<strong class="ml-2">('.$key['rol_name'].')</strong>
														</h3>
													</div>
													<!-- /.card-header -->
													<div class="card-body">
													';
			foreach ($request as $dat) {
				if ($id_menu <> $dat["id_menu"]){
					if ($id_menu <> ""){
						$htmlOptions.= "</ul></li>";
					}
					$htmlOptions.= "<li class='sub-menu '>";
                    $htmlOptions.= "<a href='javascript:;' >";
                    $htmlOptions.= '<span>'.$dat["nombre_menu"].'</span></a><ul class="sub">';
					$id_menu = $dat["id_menu"];
				}
				$htmlOptions.= '<li><a href="http://localhost/menu/">'.$dat["nombre_sub_menu"].'</a></li>';
			}
				$htmlOptions .='</div>
											</div>
										</div>';
		}
		echo $htmlOptions;
		die();
	}
}