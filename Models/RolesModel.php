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

		}
	}
?>
