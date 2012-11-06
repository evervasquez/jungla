<?php

//require_once '../modelo/empleados.php';
class webservice_controlador extends controller {

    private $_empleados;

    public function __construct() {
        parent::__construct();
        $this->_empleados = $this->cargar_modelo('empleados');
    }

    //put your code here 
    public function index() {
        $this->_vista->renderizar_webservice('index');
    }

    public function login_usuario($usuario, $pass) {
        $r = $this->_empleados->seleccionar($usuario, $pass);
        return $r;
    }

}

?>
