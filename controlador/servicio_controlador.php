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
        $this->_empleados=$this->cargar_modelo('empleados');
    }
    //put your code here 
    public function index() {
        $this->_vista->renderizar_webservice('index');
    }
    
    public function login_webservice() {
        $this->_empleados->valida_usuario();
    }

}

?>
