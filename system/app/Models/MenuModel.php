<?php
class MenuModel extends Mysql {
	private $intIdentificacion;
	private $intIdUser;
	private $intListStatus;
	private $intlistRolId;
	private $strNick;
	public function __construct(){
		parent::__construct();
	}

	public function menuUser(string $strNick){
		$this->strNick = $strNick;
		$sql = "SELECT id_menu, nombre_menu, icono, id_sub_menu, nombre_sub_menu, url,activo_menu, activo_sub_menu   FROM  `v_carga_menu` WHERE login = '$this->strNick' ORDER BY nombre_menu asc";
		$request = $this->select_all($sql);
		return $request;
	}
}