<?php

//require_once '../modelo/empleados.php';
class webservice_controlador extends controller {

    private $_empleados;
    private $_habitaciones;
    public function __construct() {
        parent::__construct();
        $this->_empleados = $this->cargar_modelo('empleados');
        $this->_habitaciones= $this->cargar_modelo('habitaciones');
    }

    //put your code here 
    public function index() {
        $this->_vista->renderizar_webservice('servidor');
    }

    public function login_usuario($usuario, $pass) {
        $r = $this->_empleados->seleccion($usuario, $pass);
        return $r;
    }
    
    public function selecciona_habitaciones(){
        $r= $this->_habitaciones->selecciona_android();
        return $r;
    }
}

?>
