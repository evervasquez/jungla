<?php

//require_once '../modelo/empleados.php';
class webservice_controlador extends controller {

    private static $_empleados;

    public function __construct() {
        parent::__construct();
        self::$_empleados = $this->cargar_modelo('empleados');
    }

    //put your code here 
    public function index() {
        $this->_vista->renderizar_webservice('index');
    }

    public static function login_usuario($usuario, $pass) {
        $r = self::$_empleados->seleccionar($usuario, $pass);
        return $r;
    }

}

?>
