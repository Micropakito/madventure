<?php

	Class parser {
		
		public function procesa( $entrada ){
			
			
			$taca = user::get_session();
			echo $taca->get_nick();
			echo "=====<br>";
			
			
			//$salida = explode (' ', trim($entrada) );
			//$salida = array_map('trim',explode(" ",$entrada));
			$n_verbos = 0;
			$n_objetos = 0;
			$n_noiden = 0;
			
			$salida = Utilidades::explode_trim($entrada);
			
			// identifico cada cosa qué es lo que es:
			echo '<br>';
			
			foreach ($salida as $ele) {
				echo $ele . '++<br>' ;
				try {
					//aquí sólo voy a organizar lo que parseo (separo verbos de objetos)
					$verbo = '';
					if ( Utilidades::es_verbo( $ele, $verbo ) ){
						$leido[] = array ( "tipo"  => 'verbo', 
										   "valor" => $verbo );
						$n_verbos ++;
						
					} else {
						$objeto = '';
						if (Utilidades:: es_objeto($ele, $objeto)) {
							//echo "<br>---" . $objeto . "----<br>";
							$leido[] = array ( "tipo"  => 'objeto', 
										       "valor" => $objeto );
							$n_objetos ++;
						}else {
							//aquí iría la búsqueda de lo que queda, articulos, prepo, adverbios...
							$n_noiden ++;
						}
					}
				} catch (Exception $e) {
					echo $ele . ' No es nada, es humo<br>';					
				}
			}
			
			echo 'verbos: ' . $n_verbos . "<br>";
			echo 'objetos: ' . $n_objetos . "<br>";
			echo 'No identificados: ' . $n_noiden . "<br>";
			
			//sólo puede haber un verbo
			if ( $n_verbos == 1 ) {
				//Si no hay objetos, llamo al verbo de la clase.
				//¿Qué clase? Pues será la habitación en la que se encuenre el 
				//usuario en ese momento
				if ( $n_objetos == 0 && $n_noiden == 0 ) {
					
					$taca = user::get_session();
					//echo $taca->get_nick();
					//echo "/////<br>";
					$object = $taca->get_room();
					//echo "····" . get_class($object) . "····<br>";
					$metodo = $leido[0]["valor"]; 
					//echo "++++" . $metodo . "++++";+
					try {
						$object->$metodo();
					} catch (Exception $e) {
						// no encuentra el método, por lo tanto tengo una habitación
						// pero no tengo una acción que ejecutar
					}
					
				}
				//depende lo flexible que quieras ser... mirar si hay no identificados...
				if ($n_objetos == 1 ) { 
					//hay que instanciar el objeto si no existe... y esto, ¿donde se hace?
					//El usuario debería te
					$metodo = $leido[0]["valor"];
					$objetillo = new $leido[1]["valor"];
					$objetillo->$metodo();
				} 
				if ( $n_objetos == 2 ) {
					//¿Con dos objetos?
					//tengo que ejecutar el método de un objeto, pasándole otro como parámetro
					//yo lo haría en las dos direcciones y el primero que pase, hacerlo
					
					//"abrir puerta con llave"
					//ejecuto el método abrir de la clase puerta y le paso llave como objeto
					// si no vale, ejecuto el método abrir del objeto llave pasándole la puerta.
					//esto da dos enfoques:
					// una llave abre una puerta
					// una puerta es abierta por una llave
					// por eso la acción tiene sentido que se defina en las dos direcciones.
					
					
				}
			
			}  else if ( $n_verbos > 1 ){
				// si hay más verbos... ¿se quiere ser generoso?
				echo "casa con dos verbos mala es de guardar";
			} else if ( $n_verbos < 1 ) {
				echo "No se reconoce el verbo";
			}
			
			//$salida = preg_split('/\s*/',$entrada );
			print_r ($leido);
		}
	}
?>