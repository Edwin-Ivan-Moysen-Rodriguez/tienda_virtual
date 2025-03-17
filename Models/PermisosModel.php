<?php 
	/**
	 * PermisosModel.php
	 * Archivo encargado de la creacion del modelo Home
	 */
	class permisosModel extends Mysql
	{
		// Atributos
		public $intPermiso;
		public $intRolid;
		public $intModuloid;
		public $r; // Leer
		public $w; // Escribir
		public $u; // Actualizar
		public $d; // Eliminar
		// Constructor de la clase
		public function __construct()
		{
			parent::__construct();
		}
		// Método para seleccionar los modulos
		public function selectModulos()
		{
			$sql = "SELECT * FROM modulo WHERE status != 0";
			$request = $this->select_all($sql);
			return $request;
		}
		// Método para obtener los permisos de un rol
		public function selectPermisosRol(int $idrol)
		{
			$this->intRolid = $idrol;
			$sql = "SELECT * FROM permisos WHERE rolid = $this->intRolid";
			$request = $this->select_all($sql);
			return $sql;
		}
	}
?>