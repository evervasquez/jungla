<?php

class movimiento_caja_controlador extends controller{
    
    private $_movimiento_caja;
    private $_ventas;
    private $_caja;

    public function __construct() {
        parent::__construct();
        $this->_movimiento_caja=  $this->cargar_modelo('movimiento_caja');
        $this->_ventas=  $this->cargar_modelo('ventas');
        $this->_caja=  $this->cargar_modelo('caja');
    }

    public function index() {
        $this->_vista->datos_ventas=$this->_ventas->selecciona();
//        echo '<pre>';
//                print_r($this->_vista->datos_ventas);exit;
        $this->_vista->renderizar('index');
    }
    
}

?>
