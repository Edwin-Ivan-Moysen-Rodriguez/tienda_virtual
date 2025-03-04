<?php  
	/**
	  * Archivo Home.php
	  * Invoca a los controladores
  	*/
	class Home extends Controllers
	{
		//Constructor
		public function __construct()
		{
			parent::__construct();
		}
		//Metodo: llamada a la vista home
		public function home($params)
		{
			//Arreglo qu contiene toda la informacion de nuestra vista
			$data['page_id'] = 1;
			$data['page_tag'] = "Home";
			$data['page_title'] = "Pagina principal";
			$data['page_name'] = "home";
			$data['page_content'] = "Esta es un pagina del proyecto de Ing Web, para la UPIITA_IPN";
			$this->views->getViews($this, "home", $data);
		}
	}
?>