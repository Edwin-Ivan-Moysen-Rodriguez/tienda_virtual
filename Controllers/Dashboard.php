<?php  
	/**
	  * Archivo Dashboard.php
	  * Controlador Dashboard
  	*/
	class Dashboard extends Controllers
	{
		//Constructor
		public function __construct()
		{
			parent::__construct();
		}
		//Metodo: llamada a la vista dashboard
		public function dashboard($params)
		{
			//Arreglo qu contiene toda la informacion de nuestra vista
			$data['page_id'] = 1;
			$data['page_tag'] = "Dashboard - Tienda Virtual";
			$data['page_title'] = "Dashboard - Tienda Virtual";
			$data['page_name'] = "dashboard";
			$this->views->getViews($this, "dashboard", $data);
		}
	}
?>