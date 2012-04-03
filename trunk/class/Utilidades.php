<?php

Class Utilidades{
	
	public static function explode_trim( $str, $delimiter = ' ') {
		if ( is_string($delimiter) ) {
			$str = trim(preg_replace('|\\s*(?:' . preg_quote($delimiter) . ')\\s*|', $delimiter, $str));
			return explode($delimiter, $str);
		}
		return $str;
	}
	public static function parsea_base ($class){
		
		$salida = explode("_", $class->getParentClass()->getName() );
		return $salida[1];
		
	}
	public static function es_verbo ( $verbo, &$id = '' ) {
		
		//lógica donde buscar los verbos 
		
		//se me ocurre en un lisgtado de verbos. Para eso tiene que tener
		//un verbo y todos los válidos [paticipio, imperativo...]
		if ($verbo == 'arrancar'){
			$id = 'arrancar';
			return true;
		}
		
		return false;
	}
	public static function es_objeto ( $objeto, &$id = '' ){
		
		try {
			echo "pregutna si es un objeto..." . $objeto;
			$class = new ReflectionClass("object_" . $objeto);
// 			echo '*' . Utilidades::parsea_base( $class ) . '*<br>';
			//$id =  Utilidades::parsea_base( $class ) ;
			$id = "object_" . $objeto ;
			// 			echo " <br>si que lo es: $id <br>";
			return true;
		}
		catch (Exception $ex) {
			echo "erroracooo";
			return false;
			
		}
		//devuelve el objeto si lo encuentra, si no null
		//return T_Objeto 
		
	} 
	
}
?>