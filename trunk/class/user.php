<?php
Class user {
	
	private $room ; //habitación en la que está el user.
	private $nick;
	
	
	
	public function user(){
		$this->nick = 'micropakito';	
	}
	public static function set_session( $usuario ){
		$_SESSION["user"] = serialize($usuario);
	}
	public static function get_session (){
		return unserialize($_SESSION["user"]);
	}
	public function get_room(){return $this->room ;}
	public function set_room($room){$this->room = $room;}
	public function get_nick(){return $this->nick;}
	public function set_nick($nick){$this->nick=$nick;}
	
}