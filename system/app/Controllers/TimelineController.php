<?php

class Timeline extends Controllers{
	public function __construct(){
		//invocar para que se ejecute el metodo de la herencia
		parent::__construct();
		session_start();
		if (empty($_SESSION['login'])) {
			header("Location:".base_url().'login');
		}
	}
	public function timeline(){
		//invocar la vista con views y usamos getViews y pasamos parametros esta clase y la vista
		//incluimos un arreglo que contendra toda la informacion que se enviara al home
		$data['page_title'] = "Dashboard - Timeline";
		$data['page_userImg'] = "usuario/default.png";
		$data['page_tag'] = "Timeline";
		$data['page_name'] = "timeline";
		$data['page_link'] = "timeLine";
		$data['page_menu_open'] = "timeline-menu";
		$data['page_link_acitvo'] = "link-timeline";
		$data['page_functions'] = "function.timeline.js";
		$this->views->getViews($this, "timeline", $data);
	}

	public function getTimeline(){
		$arrData = $this->model->getBitacora();
		if(count($arrData) > 0){
			$htmlOptions = "";
			for ($i=0; $i < count($arrData); $i++) {
				// $fecha = formatear_fecha($arrData[$i]['inicio']);
				$htmlOptions .= '<div class="time-label">
										<span class="bg-red">'.$arrData[$i]['inicio'].'</span>
									</div>
									<div>
										<i class="fas fa-user bg-green"></i>
										<div class="timeline-item" style="width:30%">
											<span class="time"><i class="fas fa-clock"></i> 5 mins ago</span>
											<h3 class="timeline-header no-border"><a href="#">'.$arrData[$i]['nombres'].'</a> accepted your friend request</h3>
										</div>
									</div>';
			}
			$htmlOptions .= '	<div>
									<i class="fas fa-clock bg-gray"></i>
								</div>';
		}
		echo $htmlOptions;
		die();
	}
}