<?php
// cosas globales..
// que no deja de ser un singleton
Class contexto {
	
// Contenedor Instancia de la Clase
    private static $instance;
 	private $foco;
    // A private constructor; previene creaci�n de objetos v�a new
    private function __construct()
    {
//         echo 'Soy el constructor';
        $foco = new room_coche();
    }
 
    // EL m�todo singleton 
    public static function singleton()
    {
        if (!isset(self::$instance)) {
            $c = __CLASS__;
            self::$instance = new $c;
        }
 
        return self::$instance;
    }
 
    // Clone no permitido
    public function __clone()
    {
        trigger_error('Clone no se permite.', E_USER_ERROR);
    }
    public function getFoco (){
    	return $this->foco;
    	
    }
 
}
?>