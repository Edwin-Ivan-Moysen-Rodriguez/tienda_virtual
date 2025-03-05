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
		    // Recuperar datos del modelo
		    $arrData = $this->model->selectRoles();
		    //Cada consulta se hace por un arreglo de datos, usamos un for para movernos por las posiciones del arreglo
			for ($i=0; $i < count($arrData); $i++) { 
				//Validamos que nuestro arreglo se encuentre en la posición del status
				if ($arrData[$i]['status'] == 1) {
					$arrData[$i]['status'] = '<span class="me-1 badge bg-success">Activo</span>';
				}
				else
				{
					$arrData[$i]['status'] = '<span class="me-1 badge bg-danger">Inactivo</span>';
				}
			}
		    echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		    exit();
		}
	}
?>