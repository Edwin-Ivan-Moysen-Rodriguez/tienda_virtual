<?php 
	/**
	  * Archivo Permisos.php
	  * Controlador Permisos
  	*/
  	class Permisos extends Controllers
	{
		//Constructor
		public function __construct()
		{
			parent::__construct();
		}
		//Metodo para obtener permisos
		public function getPermisosRol(int $idrol)
		{
			$rolid = intval($idrol);
			// Validamos el id del rol
			if($rolid > 0){
				$arrModulos = $this->model->selectModulos();
				$arrPermisosRol = $this->model->selectPermisosRol($rolid);
				dep($arrModulos);
				dep($arrPermisosRol);
			}
		}
	}
 ?>