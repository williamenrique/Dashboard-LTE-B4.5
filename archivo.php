// die();
// if($_POST['listrol'] == 'noselected'){
// $arrResponse = array("status" => false, "msg" => "Debe seleccionar un rol");
// }else{
// if($_POST['listMenuAsignar'] == 'noselected'){
// $arrResponse = array("status" => false, "msg" => "Debe seleccionar un menu");
// }else{
// if(!isset($_POST['subMenu'])){
// $arrResponse = array("status" => false, "msg" => "Debe seleccionar al menos un submenu");
// }else{
// $intIdSubMenu = $_POST['subMenu'];
// $intIdRol = decryption($_POST['listrol']);
// $request = $this->model->insertRolSub($intIdRol,$intIdSubMenu);
// if($request > 0){
// $arrResponse = array("status" => true, "msg" => "Asignacion de rol y submenu exitoso");
// }else{
// $arrResponse = array("status" => false, "msg" => "Error en la asignacion");
// }
// }
// }
// }


// public function setRolSub(){
// if($_POST['listrol'] == 'noselected'){
// $arrResponse = array("status" => false, "msg" => "Debe seleccionar un rol");
// }else{
// if($_POST['listMenuAsignar'] == 'noselected'){
// $arrResponse = array("status" => false, "msg" => "Debe seleccionar un menu");
// }else{
// if(!isset($_POST['subMenu'])){
// $arrResponse = array("status" => false, "msg" => "Debe seleccionar al menos un submenu");
// }else{
// $intIdSubMenu = $_POST['subMenu'];
// $intIdRol = decryption($_POST['listrol']);
// $request = $this->model->insertRolSub($intIdRol,$intIdSubMenu);
// if($request > 0){
// $arrResponse = array("status" => true, "msg" => "Asignacion de rol y submenu exitoso");
// }else{
// $arrResponse = array("status" => false, "msg" => "Error en la asignacion");
// }
// }
// }
// }
// echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
// die();
// }


// if($_POST['listMenu'] == "noselected"){
// }else{
// if(!isset($_POST['subMenu'])){
// $arrResponse = array("status" => false, "msg" => "Debe seleccionar al menos un submenu");
// }else{
// $intIdMenu = $_POST['listMenu'];
// $intIdSubMenu = $_POST['subMenu'];
// $request = $this->model->insertMenuSub($intIdMenu,$intIdSubMenu);
// if($request > 0){
// $arrResponse = array("status" => true, "msg" => "Menu y submenu agregados correctamente");
// }else{
// $arrResponse = array("status" => false, "msg" => "Error en la asignacion de menu");
// }
// }
// }


// public function setMenuSub(){
// if($_POST['listMenu'] == "noselected"){
// $arrResponse = array("status" => false, "msg" => "Debe seleccionar un menu");
// }else{
// if(!isset($_POST['subMenu'])){
// $arrResponse = array("status" => false, "msg" => "Debe seleccionar al menos un submenu");
// }else{
// $intIdMenu = $_POST['listMenu'];
// $intIdSubMenu = $_POST['subMenu'];
// $request = $this->model->insertMenuSub($intIdMenu,$intIdSubMenu);
// if($request > 0){
// $arrResponse = array("status" => true, "msg" => "Menu y submenu agregados correctamente");
// }else{
// $arrResponse = array("status" => false, "msg" => "Error en la asignacion de menu");
// }
// }
// }
// echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
// die();
// }


// public function getSubs($intIdMenu){
// $htmlOptions = "";
// if($intIdMenu != 'noselected'){
// $arrData = $this->model->getSubMenu($intIdMenu);
// if(count($arrData) > 0){
// $htmlOptions .= ' <label for="listSubmenuAsignar">Seleccione Submenu</label>
// <div class="form-group">';
	// for ($i=0; $i < count($arrData); $i++) { // $htmlOptions .='<div class="custom-control custom-checkbox">
	// 													<input class="custom-control-input" type="checkbox" id="asig_' .$arrData[$i]['nombre_sub_menu'].'"
		name="subMenu[]" value="'.$arrData[$i]['id_sub_menu'].'">
		// <label for="asig_'.$arrData[$i]['nombre_sub_menu'].'"
			class="custom-control-label">'.$arrData[$i]['nombre_sub_menu'].'</label>
		// </div>';
// }
// $htmlOptions .= '</div>';
// }
// }
// echo $htmlOptions;
// die();
// }


// public function getMenu(){
// $htmlOptions = "";
// $arrData = $this->model->selectMenu();
// if(count($arrData) > 0){
// $htmlOptions .= '<option value="noselected">Seleccione</option>';
// for ($i=0; $i < count($arrData); $i++) { // $htmlOptions .='<option value="' .$arrData[$i]['id_menu'].'">
	'.$arrData[$i]['nombre_menu'].'</option>';
	// }
	// }
	// echo $htmlOptions;
	// die();
	// }

	// public function getRoles(){
	// $htmlOptions = "";
	// $arrData = $this->model->selectRoles();
	// if(count($arrData) > 0){
	// $htmlOptions .= '<option value="noselected">Seleccione</option>';
	// for ($i=0; $i < count($arrData); $i++) { // $htmlOptions .='<option value="'
		.encryption($arrData[$i]['rol_id']).'">'.$arrData[$i]['rol_name'].'</option>';
		// }
		// }
		// echo $htmlOptions;
		// die();
		// }

		/ var menu = document.querySelector('#listMenuAsignar');
// menu.addEventListener('change',function(){
// 	var selectedOption = this.options[menu.selectedIndex];
// 	let ajaxUrl = base_url + "Menu/getSubs/" + selectedOption.value;
// 	//creamos el objeto para os navegadores
// 	var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
// 	//abrimos la conexion y enviamos los parametros para la peticion
// 	request.open("GET", ajaxUrl, true);
// 	request.send();
// 	request.onreadystatechange = function () {
// 		if (request.readyState == 4 && request.status == 200) {
// 			//option obtenidos del controlador
// 			document.querySelector('.listSubmenuAsignar').innerHTML = request.responseText;
// 		}
// 	}
// });