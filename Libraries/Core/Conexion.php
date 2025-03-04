<?php
	/**
	*Archivo Conexion.php
	* Se encarga de realizar la conexion con la base de datos
	*/  
	class Conexion{
		//Propiedad empleada pa la conexion
		private $conect;
		//Contructor:
		public function __construct(){
			$connectionString = "mysql:host=".BD_HOST.";dbname=".BD_NAME.";".BD_CHARSET;
			try {
				//Indicamos al ususario al cual nos conectaremos
				$this->conect = new PDO($connectionString, BD_USER, BD_PASSWORD);
				//Detectamos un error:
				$this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				//Indicamos la conexion:
				//echo "Conexion Exitosa";
			} catch (Exception $e) {
				$this->conect = 'Error de conexión';
				echo "ERROR: ". $e->getMessage();
			}
		}
		public function connect()
		{
			return $this->conect;
		}
	}
	//Prueba de conexion
	//$conexion = new Conexion();
	//var_dump($conexion->connect());
?>