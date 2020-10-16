<?php
class LoginModel extends Mysql {
	private $intIdentificacion;
	private $intIdUser;
	private $strTxtUser;
	private $strTxtPass;
	private $strTxtNombre;
	private $strtxtApellidos;
	private $intTxtTlf;
	private $strTxtEmail;
	private $intListStatus;
	private $intlistRolId;
	private $strToken;
	private $strNick;
	private $strFileBase;
	public function __construct(){
		parent::__construct();
	}
	public function loginUser(string $txtUser, string $txtPass){
		$this->strTxtUser = $txtUser;	
		$this->strTxtPass = $txtPass;	
	//	$sql = "SELECT user_id,user_status, user_nick, user_pass, user_email FROM table_user WHERE user_email = '$this->strTxtUser' AND  user_pass = '$this->strTxtPass' AND user_status != 0";
		$sql = "SELECT * FROM table_user WHERE (user_email = '$this->strTxtUser' OR user_nick = '$this->strTxtUser') AND  user_pass = '$this->strTxtPass' AND user_status != 0";
		$request = $this->select($sql);
		return $request;
	}

	public function sessionLogin(int $intIdUser){
		$this->intIdUser = $intIdUser;
		$sql = "SELECT  p.user_ci,p.user_nick, p.user_id,p.user_nombres,p.user_pass,p.user_apellidos,p.user_tlf,p.user_email, p.user_status,r.rol_id,r.rol_name FROM table_user p INNER JOIN table_roles r ON p.user_rol = r.rol_id WHERE p.user_id = $this->intIdUser";
		$request = $this->select($sql);
		$_SESSION['userData'] = $request; 
		return $request;
	}

	public function createUser(int $intIdentificacion, string $strTxtNombre, string $strTxtEmail, string $strTxtPass){
		$this->intIdentificacion = $intIdentificacion;
		$this->strTxtNombre = $strTxtNombre;
		$this->strTxtPass = $strTxtPass;
		$this->strTxtEmail = $strTxtEmail;
		$this->intListStatus = 2;
		$this->intlistRolId = 7;
		$this->strImg = "default.png";
		
	//consultar si existe
		$sql = "SELECT * FROM table_user WHERE  user_email = '{$this->strTxtEmail}' or  user_ci = {$this->intIdentificacion}";
		$request = $this->select_all($sql);
		//si no encontro ningun resultado insertamos el usuario
		if(empty($request)){
			$queryInsert = "INSERT INTO table_user(user_ci,user_nombres,user_email,user_status,user_img, user_rol,user_pass) VALUES(?,?,?,?,?,?,?)";
			$arrData = array($this->intIdentificacion,$this->strTxtNombre,$this->strTxtEmail,$this->intListStatus,$this->strImg,$this->intlistRolId,$this->strTxtPass);
			$requestInsert = $this->insert($queryInsert,$arrData);
			//almacenar errores
			// $pagina_error = $_SERVER['PHP_SELF']. addslashes($requestInsert);
			// $usuario = 0;

			// $sqlLog = "INSERT INTO table_log(log_idUser,log_descripcion,log_comando) VALUES(?,?,?)";
			// $arrDataLog = array($usuario,$pagina_error,$queryInsert);
			// $log = $this->insert($sqlLog,$arrDataLog);
			// dep($requestInsert);
			//die();
			$return = $requestInsert;
		}else{
			//si no viene vacia es que ya existe un registro
			$return = "exist";
		}
		return $return;
	}

	public function updateNick(int $intIdUser, int $intIdentificacion,string $strTxtEmail, string $strNick,string $strFileBase){
		$this->intIdUser = $intIdUser;
		$this->intIdentificacion = $intIdentificacion;
		$this->strTxtEmail = $strTxtEmail;
		$this->strNick = $strNick;
		$this->strFileBase = $strFileBase;
	 	$sql = "SELECT * FROM table_user WHERE user_email = '{$this->strTxtEmail}'  AND user_ci = $this->intIdentificacion ";
		$request = $this->select_all($sql);
		if(!empty($request)){
			$sql = "UPDATE table_user SET user_nick = ? , user_ruta = ? WHERE user_email = '{$this->strTxtEmail}'  AND user_ci = $this->intIdentificacion ";
			$arrData = array($this->strNick, $this->strFileBase);
			$request = $this->update($sql,$arrData);
		}else{
			$request = 'error';
		}
		return $request;
	}
}