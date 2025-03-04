<?php 
	class Errors extends Controllers
	{
		//Constructor
		public function __construct()
		{
			parent::__construct();
		}
		//Metodo notFound: llama a la vista error
		public function notFound()
		{
			$this->views->getViews($this, "error");
		}
	}
	//Instancia de la clase
	$notFound = new Errors();
	$notFound->notFound();
?>