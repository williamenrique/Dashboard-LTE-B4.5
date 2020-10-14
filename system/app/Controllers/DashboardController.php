<?php

class Dashboard extends Controllers{
	public function __construct(){
		//invocar para que se ejecute el metodo de la herencia
		parent::__construct();
		session_start();
		if (empty($_SESSION['login'])) {
			header("Location:".base_url().'login');
		}
	}
	public function dashboard(){
		//invocar la vista con views y usamos getViews y pasamos parametros esta clase y la vista
		//incluimos un arreglo que contendra toda la informacion que se enviara al home
		$data['page_title'] = "Dashboard - Home";
		$data['page_userImg'] = "usuario/default.png";
		$data['page_tag'] = "Dashboard";
		$data['page_userNomb'] = "William Enrique";
		$data['page_userRol'] = "Administrador";
		$data['page_name'] = "dashboard";

		$data['page_link'] = "dashboard";
		$data['page_menu_open'] = "dashboard-menu";
		$data['page_link_acitvo'] = "link-dashboard";
		$this->views->getViews($this, "dashboard", $data);
	}
}