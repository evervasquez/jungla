<?php

Class movimiento_producto_controlador extends controller{
    private $_movimiento_producto;
    
    public function __construct() {
        parent::__construct();
        $this->_movimiento_producto = $this->cargar_modelo('movimiento_producto');
    }
    public function index(){
        $this->_vista->datos = $this->_movimiento_producto->selecciona();
        $this->_vista->renderizar('index');
    }
    
    public function nuevo(){
        $this->_vista->renderiza('form');
    }
}

?>
