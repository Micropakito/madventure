<?php
	Class room_base {
		
		private $description;
		private $n;
		private $s;
		private $e;
		private $o;
		private $ne;
		private $no;
		private $se;
		private $so;
		
		public function room_base( $description ){
			echo 'pasa por el constructor?' . $description . '**';
			$this->description = $description;
		}
		public function look(){
		//	$this->variable_b = 'Esta es la base de la room';
		//	echo $this->variable_b;
			echo getDescription();
		}
		public function open(){}
		
		public function setDescription( $desc ){
			$this->descripcion = $desc;
		}
		public function getDescription() {
			return $this->description;
		}
	}
?>