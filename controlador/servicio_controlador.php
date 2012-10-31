<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of servicio_controlador
 *
 * @author eveR
 */
class servicio_controlador extends controller {

    private $_empleados;

    public function __construct() {
        parent::__construct();
        $this->_empleados = $this->cargar_modelo('empleados');
    }

    //put your code here 
    public function index() {
        $this->_vista->renderizar_webservice('index');
    }

    public function login_usuario($usuario, $clave) {
        $_datos = $this->_empleados->selecciona($usuario, $clave);
        $_ndatos[0] = $_datos[0]['nombres'];
        $_ndatos[1] = $_datos[0]['apellidos'];
        $this->_vista->_datos=$_ndatos;
    }

}

?>
