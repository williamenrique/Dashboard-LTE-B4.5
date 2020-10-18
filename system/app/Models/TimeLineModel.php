<?php
class TimeLineModel extends Mysql {
	private $intIdUser;
	private $strCodigo;
	
	private $intIdentificacion;
	private $strTxtNombre;
	private $strtxtApellidos;
	private $intTxtTlf;
	private $strTxtEmail;
	private $intListStatus;
	private $intlistRolId;
	private $strTxtPass;
	private $strToken;
	private $strNick;
	private $strTxtNick;
	private $intOption;
	private $intStatus;
	private $fileBase;
	public function __construct(){
		parent::__construct();
	}

	/**************
	 * funcion para la bitacora
	 */
	// public function setBitacora(int $intIdUser, string $strCodigo, string $strHoraInicio, string $strHoraFin, string $strTipo){
	public function setBitacora(int $intIdUser, string $strCodigo){
		$this->intIdUser = $intIdUser;
		$this->strCodigo = $strCodigo;
		// $this->strHoraInicio = $strHoraInicio;
		// $this->strHoraFin = $strHoraFin;
		$sql = "INSERT INTO table_bitacora (b_idUser, b_codigo) VALUES(?,?)";
		$arrData = array($this->intIdUser,$this->strCodigo); 
		$request = $this->insert($sql,$arrData);
		return $request;
	}
	public function updateBitacora(string $strCodigo,string $strHoraFin){
		$this->strCodigo = $strCodigo;
		$this->strHoraFin = $strHoraFin;
		$sql = "SELECT * FROM table_bitacora WHERE b_codigo = '$this->strCodigo'";
		$request = $this->select($sql);
		if(!empty($request)){
			$sql = "UPDATE table_bitacora SET b_horaFinal = ? WHERE b_codigo = '$this->strCodigo'";
			$arrData = array($this->strHoraFin);
			$request = $this->update($sql,$arrData);
		}
		return $request;
	}

	/******
	 * funcion timeline
	 */
	public function getBitacora(){
		$sql = "SELECT a.user_nick AS login, a.user_nombres AS nombres, a.user_apellidos AS apellidos, b.rol_name AS rol, c.b_id AS id, c.b_codigo AS codigo, c.b_horaInicio AS inicio, c.b_horaFinal AS fin FROM((table_user a JOIN table_roles b) JOIN table_bitacora c) WHERE ((a.user_rol  = b.rol_id) AND (a.user_id = c.b_idUser) )order by c.b_id desc";
		$request = $this->select_all($sql);
		return $request;
	}
}