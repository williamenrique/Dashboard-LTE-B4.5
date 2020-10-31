<?php

class Producto extends Controllers{
	public function __construct(){
		session_start();
		session_unset();
		session_destroy();
		//invocar para que se ejecute el metodo de la herencia
		parent::__construct();
	}
	public function producto(){
		//invocar la vista con views y usamos getView y pasamos parametros esta clase y la vista
		//incluimos un arreglo que contendra toda la informacion que se enviara al home
		$data['page_tag'] = "Producto - Tienda Virtual";
		$data['page_title'] = "Pagina Principal";
		$data['page_name'] = "producto";
		$data['page_functions'] = "function.producto.js";
		$this->views->getViews($this, "item", $data);
	}

	public function item($item){
		if($_GET){
			$html = "";
			$html .='
								<section class="w3l-inner-banner-main">
								<div class="about-inner inner2">
									<div class="wrapper seen-w3">
										<ul class="breadcrumbs-custom-path">
											<li><a href="<?= base_url()?>home">Home</a>
</li>
<li><span class="fa fa-angle-right" aria-hidden="true"></span></li>
<li class="active">Single Ad</li>
</ul>
</div>
</div>
</section>
<section class="w3l-products-page w3l-blog-single w3l-products-4">
	<div class="single blog">
		<div class="wrapper">
			<h3 class="title-main">Producto </h3>
		</div>
	</div>
</section>';
}
echo $html;
die();
}

}