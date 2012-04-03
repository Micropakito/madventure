<?php
	foreach (glob("class/*.php") as $filename){
		include $filename;
	}
	foreach (glob("objects/*.php") as $filename){  
	    include $filename; 
	} 
	foreach (glob("lib/*.php") as $filename){
		include $filename;
	}
		
	//echo 'hello world<br>';
	//$taca = new room_coche( 'ciruelo' );
	//$taca->pintaVariable();
	
// 	$contexto = new contexto();
	
	$usuario = new user();
	$elcoche = new room_coche();
	
	$usuario->set_room( $elcoche );
	
	user::set_session( $usuario );
	
	$par = new parser();
// 	$par->procesa('cantar room_coche    con llave');
	$par->procesa('arrancar'); // esto tiene que arrancar el coche
	$par->procesa('arrancar motosierra');
?>