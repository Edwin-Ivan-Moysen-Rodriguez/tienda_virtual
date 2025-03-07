<?php 
	/**
	 * RolesModel.php
	 * Archivo encargado de la creacion del modelo Roles
	 */
	class rolesModel extends Mysql
	{
		// Propiedades de un rol:
		public $intRol;
		public $strRol;
		public $strDescripcion;
		public $intStatus
		// Constructor de la clase
		public function __construct()
		{
			parent::__construct();
		}
		// Método encargado de consultar un rol seleccionado desde la base de datos
		public function selectRoles()
		{
			// Extraer roles
			$sql = "SELECT * FROM rol";
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
				$return = "exists";
			}
			return $return;
		}
	}
?>
