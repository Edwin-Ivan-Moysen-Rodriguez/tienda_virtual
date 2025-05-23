<?php 
	/**
	  * Archivo Usuarios.php
	  * Controlador Usuarios
  	*/
	class Usuarios extends Controllers
	{
		//Constructor
		public function __construct()
		{
			parent::__construct();
		}
		//Metodo: llamada a la vista usuarios
		public function usuarios($params)
		{
			//Arreglo qu contiene toda la informacion de nuestra vista
			$data['page_tag'] = "Usuarios";
			$data['page_title'] = "Usuarios <small>Tenda Viertual</small>";
			$data['page_name'] = "usuarios";
			$this->views->getViews($this, "usuarios", $data);
		}
	}
 ?>