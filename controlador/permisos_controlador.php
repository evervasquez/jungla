<?php

class permisos_controlador extends controller{
//    private $_permisos;
    public function __construct() {
        parent::__construct();
//        $this->_permisos = $this->carga_modelo('permisos');
    }
    public function index(){
//        $this->_permisos->idpermisos = 0;
//        $datos =$this->_permisos->selecciona();
//        $this->_vista->datos = $datos;
        $this->_vista->renderizar('index','permisos');
    }
    
    public function nuevo(){
        $this->_vista->renderizar('form','permisos');
    }
}

?>
