<?php 
	/**
	 * RolesModel.php
	 * Archivo encargado de la creacion del modelo Roles
	 */
	class rolesModel extends Mysql
	{
		// Constructor de la clase
		public function __construct()
		{
			parent::__construct();
		}
		// Método encargado de consultar un rol seleccionado desde la base de datos
		public function selectRoles()
		{
			// Extraer roles
			$sql = "SELECT * FROM rol WHERE status != 0";
			$request = $this->select_all($sql);
			return $request;
		}
	}
?>
