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
				//Opciones de cada consulta en nuestra tabla rol
				$arrData[$i]['options'] = '<div class="text-center">' .
									    '<button class="btn btn-secondary btn-sm btnPermisosRol" rl="' . $arrData[$i]['idrol'] . '" title="Permisos">' .
									    '<i class="bi bi-key"></i>' .
									    '</button>' .
									    '<button class="btn btn-primary btn-sm btnEditRol" rl="' . $arrData[$i]['idrol'] . '" onClick="fnEditRol()" title="Editar">' .
									    '<i class="bi bi-pen"></i>' .
									    '</button>' .
									    '<button class="btn btn-danger btn-sm btnDelRol" rl="' . $arrData[$i]['idrol'] . '" title="Eliminar">' .
									    '<i class="bi bi-trash"></i>' .
									    '</button>' .
									    '</div>';

			}
		    echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		    die();
		}
		//Función para obtener un rol de la base de datos
		public function getRol(int $idrol)
		{
			$intIdrol = intval(strClean($idrol));
			if($intIdrol > 0) //Comprobamos que el rol exista, de acuerdo a su id
			{
				$arrData = $this->model->selectRol($intIdrol);
				if(empty($arrData))
				{
					$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
				}
				else
				{
					$arrResponse = array('status' => true, 'data' => $arrData);
				}
				echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
			} 
			die();
		}
		//Funcion para la selección de roles
		public function setRol()
		{
		    // Variables que almacenan los datos enviados a la tabla rol
		    $intIdrol = intval($_POST['idRol']);
		    $strRol = strClean($_POST['txtNombre']);
		    $strDescripcion = strClean($_POST['txtDescripcion']);
		    $intStatus = intval($_POST['listStatus']);
		    // Validación del id del rol
		    if($intIdrol == 0)
		    {
		    	// Crear el rol
		    	$request_rol = $this->model->insertRol($strRol, $strDescripcion, $intStatus);
		    	$option = 1;
		    }
		    else
		    {
		    	// Actualizar el rol
		    	$request_rol = $this->model->updateRol($intIdrol, $strRol, $strDescripcion, $intStatus);
		    	$option = 2;
		    }
		    // Validacion del resultado obtenido en request_rol
		    if ($request_rol > 0) {
		    	// Validación de la opción
		    	if ($option == 1) {
		    		$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
		    	} else {
		    		$arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente.');
		    	}
		    } else if ($request_rol == 'exist') {
		        $arrResponse = array('status' => false, 'msg' => '¡PRECAUCIÓN! El Rol ya existe.');
		    } else {
		        $arrResponse = array('status' => false, 'msg' => 'No es posible almacenar los datos.');
		    }
		    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		    die();
		}
	}
?>