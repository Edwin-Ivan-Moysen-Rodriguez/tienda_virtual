<?php  
	/**
	  * Archivo Roles.php
	  * Controlador Dashboard
  	*/
	class Roles extends Controllers
	{
		//Constructor
		public function __construct()
		{
			parent::__construct();
		}
		//Metodo: llamada a la vista roles
		public function roles($params)
		{
			//Arreglo qu contiene toda la informacion de nuestra vista
			$data['page_id'] = 3;
			$data['page_tag'] = "Roles Usuario";
			$data['page_title'] = "Roles Usuario <small>Tenda Viertual</small>";
			$data['page_name'] = "rol_usuario";
			$this->views->getViews($this, "roles", $data);
		}
		//Metodo para obtener el los roles desde una base de datos
		public function getRoles()
{
    $arrData = $this->model->selectRoles();
    echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
    exit();
}

	}
?>