<?php
class MenuModel extends Mysql {
	private $intIdentificacion;
	private $intIdUser;
	private $intListStatus;
	private $intlistRolId;
	private $intIdMenu;
	private $intIdSubMenu;
	private $strNick;
	public function __construct(){
		parent::__construct();
	}

	public function menuUser(string $strNick){
		$this->strNick = $strNick;
		$sql = "SELECT id_menu, nombre_menu, icono, id_sub_menu, nombre_sub_menu, url,page_menu_open,page_link, page_link_activo   FROM  `v_carga_menu` WHERE login = '$this->strNick' ORDER BY nombre_menu asc";
		$request = $this->select_all($sql);
		return $request;
	}

	public function selectRoles(){
		// $sql = "SELECT * FROM table_user a JOIN table_roles b where a.user_rol = b.rol_id AND a.user_status != 0";
		$sql = "SELECT * FROM table_roles WHERE rol_status != 0";
		$request = $this->select_all($sql);
		return $request;
	}

	public function selectMenu(){
		$sql = "SELECT * FROM table_menu WHERE status != 0";
		$request = $this->select_all($sql);
		return $request;
	}

	public function selectSubMenu(){
		$sql = "SELECT * FROM table_sub_menu";
		$request = $this->select_all($sql);
		return $request;
	}
	public function getSubMenu(int $intIdMenu){
		$this->intIdMenu = $intIdMenu;
		$sql = "SELECT id_sub_menu, nombre_sub_menu FROM v_submenu WHERE id_menu = $this->intIdMenu";
		// $sql = "SELECT * FROM table_menu_sub_menu WHERE id_menu = $this->intIdMenu";
		$request = $this->select_all($sql);
		return $request;
	}
	public function insertMenuSub(int $intIdMenu, array $intIdSubMenu){
		$this->intIdMenu = $intIdMenu;
	  $this->intIdSubMenu = $intIdSubMenu;
		$sql = "";
		foreach ($intIdSubMenu as $key) {
			$sql = "INSERT INTO table_menu_sub_menu(id_menu,id_sub_menu) VALUES (?,?)";
			$arrData = array($this->intIdMenu,$key);
			$request = $this->insert($sql,$arrData);
		}
		return $request;
	}
	public function insertRolSub(int $intlistRolId, array $intIdSubMenu){
		$this->intlistRolId = $intlistRolId;
	  $this->intIdSubMenu = $intIdSubMenu;
		$sql = "";
		foreach ($intIdSubMenu as $key) {
			$sql = "INSERT INTO table_roles_sub_menu(id_rol,id_sub_menu) VALUES (?,?)";
			$arrData = array($this->intlistRolId,$key);
			$request = $this->insert($sql,$arrData);
		}
		return $request;
	}
}