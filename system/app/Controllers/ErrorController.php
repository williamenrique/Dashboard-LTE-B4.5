<?php

class Errors extends Controllers{
	public function __construct(){
		//invocar para que se ejecute el metodo de la herencia
		parent::__construct();
	}
	public function notFound(){
			$data['page_name'] = "dashboard";
		$this->views->getViews($this, "error",$data);
	}
}
$notFound = new Errors();
$notFound->notFound();