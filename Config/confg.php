<?php 
	/**
	  * Archivo config.php
	  * Archivo el cual contiene variglaes globales
  	*/ 
	//define(BASE_URL, "http://localhost/tienda_virtual/");
	const BASE_URL = "http://localhost/tienda_virtual/";
	//Definimos la zona horaria
	date_default_timezone_set('America/Mexico_City');
	//Variables globales, para la conexion con la base de datos:
	const BD_HOST = "localhost"; //Direccion IP de la base de datos
	const BD_NAME = "tienda"; //Nombre de la base de datos
	const BD_USER = "root"; //Usuario de la base de datos
	const BD_PASSWORD = "12345"; //Contraseña del usuario
	const BD_CHARSET = "charset=utf8"; //Codificacion de los datos UTF-8
	//Definidores, decimal y millar
	const SPD = ".";
	const SPM = ",";
	//Simbolo de moneda
	const SMONEY = "$";
?>