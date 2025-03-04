<?php 
	require_once("Config/confg.php");
	require_once("Helpers/Helpers.php");
	$url = !empty($_GET['url']) ? $_GET['url'] : 'home/home';
	$arrUrl = explode("/", $url);
	//Variable que almacena el valor del arreglo en el indice 0
	$controller = $arrUrl[0];
	//Varible que almacena el valor del arreglo en el indice 0
	$method = $arrUrl[0];
	$params = "";
	//Vaidemos que el arreglo cuente con metodos
	if(!empty($arrUrl[1]))
	{
		if($arrUrl[1] != "")//Validemos que contamos con un metodo
		{
			$method = $arrUrl[1];
		}
	}
	//Validemos que contemos con parametros
	if(!empty($arrUrl[2]))
	{
		//Si el indice 2, es diferente a vacio, sinifica que conatmos con parametros
		if($arrUrl[2] != "")
		{
			//Por medio del ciclo, obtenemos los parametros
			for ($i=2; $i < count($arrUrl); $i++) 
			{ 
				//Los parametros se asiganan a params, concatenandolos y seperando por una ,
				$params .= $arrUrl[$i].',';
			}
			//Eliminamos por medio de trim, la ultima , agregada a params
			$params = trim($params, ',');
		}
	}
	//Llamando al archivo Autoload.php
	require_once("Libraries/Core/Autoload.php");
	//Llamando al archivo Load.php
	require_once("Libraries/Core/Load.php");
	/*echo "<br>";
	echo "Controlador: ".$controller; 
	echo "<br>";
	echo "Metodo: ".$method;
	echo "<br>";
	echo "Parametros: ".$params*/
?>