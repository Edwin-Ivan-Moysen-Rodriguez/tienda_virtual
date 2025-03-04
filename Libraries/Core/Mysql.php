<?php  
	/**
	 * 
	 */
	class Mysql extends Conexion
	{
		//Propiedades
		private $conexion;
		private $strquery;
		private $arrValues;
		//Constructor de la clase
		public function __construct()
		{
			//Instanacia de la clase Conexion
			$this->conexion = new Conexion();
			//Retornamos la propiedad de conexion con la base de datos
			$this->conexion = $this->conexion->connect();
		}
		//Metodo para insertar un registro en la base de datos
		public function insert(string $query, array $arrValues)
		{
			//Inicializamos las propiedades
			$this->strquery = $query;
			$this->arrValues = $arrValues;
			//Preparamos el query (la consulta) de la base de datos
			$insert = $this->conexion->prepare($this->strquery);
			//Realizamos la insercion de los datos en la consulta
			$resInsert = $insert->execute($this->arrValues);
			//Verificamos que insertamos un elemento
			if($resInsert) //Si es verdad
				$lasInsert = $this->conexion->lastInsertId(); //Retornamos el ID del ultimo elemento
			else //De los contrario
				$lasInsert = 0; //No contamos con ID del ultimo elemento, por lo cual tendremos al final 0
			//Retornamos el ID del ultimo metodo
			return $lasInsert;
		}
		//Metodo para buscar un registro
		public function select(string $query)
		{
			//Iniciamos la propiedad de consulta
			$this->strquery = $query;
			//Preparamos la consulta para la base de datos
			$result = $this->conexion->prepare($this->strquery);
			//Ejecutamos la consulta
			$result->execute();
			//Guardamos los resultados de la consulta	
			$data = $result->fetch(PDO::FETCH_ASSOC);
			//Retornamos los datos de la consulta, si es vacia, tendra un 0
			return $data;
		}
		//Metodo para devolver todos los registros
		public function select_all(string $query)
		{
			//Iniciamos la propiedad de consulta
			$this->strquery = $query;
			//Preparamos la consulta para la base de datos
			$result = $this->conexion->prepare($this->strquery);
			//Ejecutamos la consulta
			$result->execute();
			//Guardamos los resultados de la consulta	
			$data = $result->fetchall(PDO::FETCH_ASSOC);
			//Retornamos los datos de la consulta, si es vacia, tendra un 0
			return $data;
		}
		//Metodo para actualizar registros
		public function update(string $query, array $arrValues)
		{
			//Inicializamos las propiedas
			$this->strquery = $query;
			$this->arrValues = $arrValues;
			//Praparamos la consulta, para la actualizacion de registros
			$update = $this->conexion->prepare($this->strquery);
			//Ejecutamos la consulta
			$resExecute = $update->execute($this->arrValues);
			//Retornamos el resultado de la consulta, si hay error, retornaremos un 0
			return $resExecute;
		}
		//Metodo para eliminar un registro
		public function delete(string $query)
		{
			//Inicializamos las propiedas
			$this->strquery = $query;
			//Praparamos la consulta, para la eliminaciob de registros
			$result = $this->conexion->prepare($this->strquery);
			//Ejecutamos la consulta
			$result->execute();
			//Retornamos el resultado de la consulta, si hay error, retornaremos un 0
			return $result;
		}
	}
?>