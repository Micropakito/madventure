<?php

Class room_coche extends room_base {

	private $variable;
	
	public function room_coche (){
		//parent::__construct('holita');
		
	}
	
	public function pintaVariable(){
		//$this->variable = 'Hola caracola';
		//echo $this->variable . '<br>';
		echo 'pasa por la room_base';
		//$room = new room_base();
		echo '++' . $this->getDescription() . '++';		
		
	}
	public function cantar( ) {
		
		echo "<br>llamando al metodo de cantar<br>";
		
	}
	public function arrancar() {
		
		echo "<br><br>Estás arrancando el coche<br><br>";
		
	}
}
?>