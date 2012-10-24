<?php

class detalle_estadia_controlador extends controller{
//    private $_detalle_estadia;
    public function __construct() {
        parent::__construct();
//        $this->_detalle_estadia = $this->carga_modelo('detalle_estadia');
    }
    public function index(){
//        $this->_detalle_estadia->iddetalle_estadia = 0;
//        $datos =$this->_detalle_estadia->selecciona();
//        $this->_vista->datos = $datos;
        $this->_vista->renderiza('index','detalle_estadia');
    }
    
    public function nuevo(){
        $this->_vista->renderiza('form','detalle_estadia');
    }
}

?>
