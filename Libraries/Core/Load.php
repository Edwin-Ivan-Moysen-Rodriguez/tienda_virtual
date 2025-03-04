<?php 
	/*Archivo que configura toda la carga de los archivos*/
	$controller = ucwords($controller);//Convertimos la primer variable en mayuscula
	$controllerfile = "Controllers/".$controller.".php";
	//Validamos que exista el archivo
	if (file_exists($controllerfile)) 
	{
		require_once($controllerfile);
		//Hacemos una instancia
		$controller = new $controller();
		//Validamos si el metodo existe
		if(method_exists($controller, $method))
		{
			//Si existe, utilizaremos el archivo
			$controller->{$method}($params);
		}
		else
			require_once("Controllers/Error.php");
	}
	else
	{
		require_once("Controllers/Error.php");
	}
?>