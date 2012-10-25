<?php

class paquetes_controlador extends controller{
//    private $_paquetes;
    public function __construct() {
        parent::__construct();
//        $this->_paquetes = $this->carga_modelo('paquetes');
    }
    public function index(){
//        $this->_paquetes->idpaquetes = 0;
//        $datos =$this->_paquetes->selecciona();
//        $this->_vista->datos = $datos;
        $this->_vista->renderizar('index','paquetes');
    }
    
    public function nuevo(){
        $this->_vista->renderizar('form','paquetes');
    }
}

?>
