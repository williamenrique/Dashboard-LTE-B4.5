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
		$data['page_link'] = "menu";
		$data['page_menu_open'] = "user-menu";
		$data['page_link_acitvo'] = "link-menu";
		$data['page_functions'] = "function.menu.js";
		$this->views->getViews($this, "menu", $data);
	}

	public function getUsers(){
		$htmlOptions = "";
		$arrData = $this->model->selectUser();
		if(count($arrData) > 0){
			for ($i=0; $i < count($arrData); $i++) { 
				$htmlOptions .= '<option value="'.$arrData[$i]['user_id'].'">'.$arrData[$i]['user_nombres'].'</option>';
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
}