<?php

class movimiento_producto_controlador extends controller{
//    private $_movimiento_producto;
    public function __construct() {
        parent::__construct();
//        $this->_movimiento_producto = $this->carga_modelo('movimiento_producto');
    }
    public function index(){
//        $this->_movimiento_producto->idmovimiento_producto = 0;
//        $datos =$this->_movimiento_producto->selecciona();
//        $this->_vista->datos = $datos;
        $this->_vista->renderiza('index','movimiento_producto');
    }
    
    public function nuevo(){
        $this->_vista->renderiza('form','movimiento_producto');
    }
}

?>
