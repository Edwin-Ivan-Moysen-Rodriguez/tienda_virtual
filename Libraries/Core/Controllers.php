<?php  
	class Controllers
	{
		protected $model;
		protected $views;
		//Constructor de la clase
		public function __construct()
		{
			//Instanciamos lavista
			$this->views = new Views();
			$this->loadModel();
		}
		//Metodo para cargar los modelos
		public function loadModel()
		{
			//Obtenemos el modelo de la clase
			$model = get_class($this) . "Model";
			//Obtenemos la ruta
			//echo $model;
			$routClass = "Models/" . $model . ".php";
			//echo $routClass;
			//Verificamos que exista el archivo
			if(file_exists($routClass))
			{
				require_once($routClass);
				//Istanciamos la clase 
				$this->model = new $model();
			}//else {echo "No exist el modelo";}
		}
	}
?>