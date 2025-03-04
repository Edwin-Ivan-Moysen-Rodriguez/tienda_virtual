<?php  
	/**
	 * 
	*/ 
	//Funcion para retornar la URL del proyecto
	function base_url()
	{
		return BASE_URL;
	}
	//Funcion para retornar los archivos en Assets
	function media()
	{
		//echo BASE_URL . "Assets";
		return BASE_URL	. "/Assets";
	}
	//Funciones para vincular los archivos
	function headerAdmi($data = "")
	{
	    $view_header = "Views/Template/header_admi.php";
	    if (file_exists($view_header)) {
	        require_once($view_header);
	    } else {
	        echo "Error: El archivo $view_header no existe.";
	    }
	}

	function footerAdmi($data = "")
	{
	    $view_footer = "Views/Template/footer_admi.php";
	    if (file_exists($view_footer)) {
	        require_once($view_footer);
	    } else {
	        echo "Error: El archivo $view_footer no existe.";
	    }
	}
	//Funcion para mostrar informacion formateada
	function dep($data)
	{
		$format = print_r('<pre>');
		$format .= print_r($data);
		$format .= print_r('</pre>');
		return $format;
	}
	//Elimina exceso de especios entre palabras
	function strclean($strcadena)
	{
	    // Normaliza espacios en blanco
	    $string = preg_replace(['/\s+/', '/^\s|\s$/'], [' ', ""], $strcadena);
	    // Elimina espacios en blanco al inicio y al final
	    $string = trim($string);
	    // Elimina las barras invertidas
	    $string = stripslashes($string);
	    // Elimina etiquetas <script> y fragmentos de SQL peligrosos
	    $string = str_ireplace("<script>", "", $string);
	    $string = str_ireplace("</script>", "", $string);
	    $string = str_ireplace("<script src>", "", $string);
	    $string = str_ireplace("<script type=>", "", $string);
	    $string = str_ireplace("SELECT * FROM", "", $string);
	    $string = str_ireplace("DELETE FROM", "", $string);
	    $string = str_ireplace("INSERT INTO", "", $string);
	    $string = str_ireplace("SELECT COUNT(*) FROM", "", $string);
	    $string = str_ireplace("DROP TABLE", "", $string); // Corregido: "CROP TABLE" -> "DROP TABLE"
	    $string = str_ireplace("OR '1'='1'", "", $string);
	    $string = str_ireplace('OR "1"="1"', "", $string);
	    $string = str_ireplace("OR ´1´=´1´", "", $string);
	    $string = str_ireplace("is NULL; --", "", $string);
	    $string = str_ireplace("LIKE '", "", $string);
	    $string = str_ireplace('LIKE "', "", $string);
	    $string = str_ireplace("LIKE ´", "", $string);
	    $string = str_ireplace("OR 'a'='a'", "", $string);
	    $string = str_ireplace('OR "a"="a"', "", $string);
	    $string = str_ireplace("OR ´a´=´a", "", $string);
	    $string = str_ireplace("--", "", $string);
	    $string = str_ireplace("^", "", $string);
	    $string = str_ireplace("[", "", $string);
	    $string = str_ireplace("]", "", $string);
	    $string = str_ireplace("==", "", $string);
	    // Devuelve la cadena limpia
	    return $string;
	}
	//Genera una contraseña aleatoria de una longitud específica (por defecto, 10 caracteres)
	function passGenerator($length = 10)
	{
	    $pass = "";
	    $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"; // Agregados caracteres especiales, se pueden agregar: !@#$%^&*"
	    $longitudCadena = strlen($cadena);
	    for ($i = 0; $i < $length; $i++) { // Comienza en 0 y usa < en lugar de <=
	        $pos = random_int(0, $longitudCadena - 1); // Usa random_int() en lugar de rand()
	        $pass .= substr($cadena, $pos, 1);
	    }
	    return $pass;
	}
	//Genera un token aleatorio compuesto por cuatro partes hexadecimales separadas por guiones
	function token()
	{
	    $r1 = bin2hex(random_bytes(10)); // 20 caracteres hexadecimales
	    $r2 = bin2hex(random_bytes(10)); // 20 caracteres hexadecimales
	    $r3 = bin2hex(random_bytes(10)); // 20 caracteres hexadecimales
	    $r4 = bin2hex(random_bytes(10)); // 20 caracteres hexadecimales
	   $token = $r1 . '-' . $r2 . '-' . $r3 . '-' . $r4;
	    return $token;
	}
	//Formato para valores monetarios
	function formatMoney($cantidad)
	{
	    // Formatea la cantidad con 2 decimales y los separadores especificados
	    $cantidad = number_format($cantidad, 2, SPD, SPM);
	    return $cantidad; // Corregido: Se agregó el símbolo $ y el punto y coma
	}
?>