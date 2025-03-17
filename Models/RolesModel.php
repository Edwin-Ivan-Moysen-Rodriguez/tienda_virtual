<?php 
	/**
	 * RolesModel.php
	 * Archivo encargado de la creacion del modelo Roles
	 */
	class rolesModel extends Mysql
	{
		// Propiedades de un rol:
		public $intIdrol;
		public $intRol;
		public $strRol;
		public $strDescripcion;
		public $intStatus;
		// Constructor de la clase
		public function __construct()
		{
			parent::__construct();
		}
		// Método encargado de consultar los roles seleccionados desde la base de datos
		public function selectRoles()
		{
			// Extraer roles
			$sql = "SELECT * FROM rol WHERE status != 2";
			$request = $this->select_all($sql);
			return $request;
		}
		// Método encaargado de consultar un rol seleccionado desde la base de datos
		public function selectRol(int $idrol)
		{
			//Buscar un rol
			$this->intIdrol = $idrol;
			$sql = "SELECT * FROM rol WHERE idrol = $this->intIdrol";
			$request = $this->select_all($sql);
			return $request;
		}
		//Método encargado de realizar la inserción en la rabla de rol, ingresado por el formulario de nuevo rol
		public function insertRol(string $rol, string $descripcion, int $status)
		{
			// Insertar roles
			$return = "";
			$this->strRol = $rol;
			$this->strDescripcion = $descripcion;
			$this->intStatus = $status;
			// Consulta para verificar si ya existe el rol a insertar
			$sql = "SELECT * FROM rol WHERE nombreRol = '{$this->strRol}'";
			$request = $this->select_all($sql);
			// Validacion de la existencia del rol en la tabla rol
			if (empty($request)) {
				$query_insert = "INSERT INTO rol(nombrerol,descripcion,status) VALUES(?,?,?)";
				$arrData = array($this->strRol,$this->strDescripcion,$this->intStatus);
				$request_insert = $this->insert($query_insert,$arrData);
				$return = $request_insert;
			} else {
				$return = "exist";
			}
			return $return;
		}
		// Método para actualizar un rol
		public function updateRol($idrol, string $rol, string $descripcion,  int $status)
		{
			$this->intIdrol = $idrol;
			$this->strRol = $rol;
			$this->strDescripcion = $descripcion;
			$this->intStatus = $status;
			// Consulta sql
			$sql = "SELECT * FROM rol WHERE  nombrerol = '$this->strRol' AND idrol != $this->intIdrol";
			$request = $this->select_all($sql);
			// Validación de los datos obtenidos en la consulta
			if (empty($request)) {
				$sql = "UPDATE rol SET nombrerol = ?, descripcion = ?, status = ? WHERE idrol = $this->intIdrol";
				$arrData = array($this->strRol, $this->strDescripcion, $this->intStatus);
				$request = $this->update($sql, $arrData);
			} else {
				$request = "exist";
			}
			return $request;
		}
		// Método para eliminar un rol
		public function deleteRol(int $idrol)
		{
			$this->intIdrol = $idrol;
			$sql = "SELECT * FROM persona WHERE rolid = $this->intIdrol";
			$request = $this->select_all($sql);
			if(empty($request)){
				$sql = "UPDATE rol SET status = ? WHERE idrol = $this->intIdrol";
				$arrData = array(2);
				$request = $this->update($sql, $arrData);
				// Validación de la consulta
				if ($request) {
					$request = 'ok';
				} else {
					$request = 'error';
				}
			} else{
				$request = 'exist';
			}
			return $request;
		}
	}
?>
