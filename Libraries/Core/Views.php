<?php 
	class Views
	{
		//Metodo getViews
		public function getViews($controller, $view, $data = "")
		{
			$controller = get_class($controller);
			//Hacemos una validacion, si nuestro controlador es Home
			if($controller == "Home")
			{
				//Ruta para encontrar la vista
				$view = "Views/" . $view . ".php";
			}
			else
			{
				//Si no se cumple, el controlador no es Home, es otro
				$view = "Views/" . $controller . "/" . $view . ".php";
			}
			//Requierimos la viista principal
			require_once($view);
		}
	}
?>