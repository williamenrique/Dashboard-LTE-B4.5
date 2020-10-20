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

	public function getUsers(){
		$htmlOptions = "";
		$arrData = $this->model->selectUser();
		if(count($arrData) > 0){
			for ($i=0; $i < count($arrData); $i++) { 
				$htmlOptions .= '<option value="'.$arrData[$i]['user_id'].'">'.$arrData[$i]['user_nombres'].' ('.$arrData[$i]['rol_name'].')</option>';
			}
		}
		echo $htmlOptions;
		die();
	}

	public function getMenu(){
		$htmlOptions = "";
		$arrData = $this->model->selectMenu();
		if(count($arrData) > 0){
			for ($i=0; $i < count($arrData); $i++) { 
				$htmlOptions .= '<option value="'.$arrData[$i]['id_menu'].'">'.$arrData[$i]['nombre_menu'].'</option>';
			}
		}
		echo $htmlOptions;
		die();
	}
	public function getSubMenu(){
		$htmlOptions = "";
		$arrData = $this->model->selectSubMenu();
		if(count($arrData) > 0){
			for ($i=0; $i < count($arrData); $i++) { 
				$htmlOptions .= '<div class="custom-control custom-checkbox">
												  <input class="custom-control-input" type="checkbox" id="'.$arrData[$i]['nombre_sub_menu'].'" name="subMenu[]" value="'.$arrData[$i]['id_sub_menu'].'">
												  <label for="'.$arrData[$i]['nombre_sub_menu'].'" class="custom-control-label">'.$arrData[$i]['nombre_sub_menu'].'</label>
											   </div>';
				//$htmlOptions .= '<option value="'.$arrData[$i]['id_menu'].'">'.$arrData[$i]['nombre_menu'].'</option>';
			}
		}
		echo $htmlOptions;
		die();
	}
	public function getSubs($intIdMenu){
		$htmlOptions = "";
		$arrData = $this->model->getSubMenu($intIdMenu);
		if(count($arrData) > 0){
			for ($i=0; $i < count($arrData); $i++) { 
				$htmlOptions .= '<div class="custom-control custom-checkbox">
												  <input class="custom-control-input" type="checkbox" id="'.$arrData[$i]['nombre_sub_menu'].'" name="subMenu[]" value="'.$arrData[$i]['id_sub_menu'].'">
												  <label for="'.$arrData[$i]['nombre_sub_menu'].'" class="custom-control-label">'.$arrData[$i]['nombre_sub_menu'].'</label>
											   </div>';
				//$htmlOptions .= '<option value="'.$arrData[$i]['id_menu'].'">'.$arrData[$i]['nombre_menu'].'</option>';
			}
		}
		echo $htmlOptions;
		die();
	}
	public function setMenuUser(){
		// $intIdUser = $_POST['listUser'];
		$intIdMenu = $_POST['listMenu'];
		$intIdSubMenu = $_POST['subMenu'];
		$request = $this->model->insertMenuSub($intIdMenu,$intIdSubMenu);
		if($request > 0){
			$arrResponse = array("status" => true, "msg" => "Datos guardados correctamente");
		}else{
			$arrResponse = array("status" => false, "msg" => "Error al asignar menu");
		}
		echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		die();
	}
}