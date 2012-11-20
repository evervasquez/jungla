<?php

class entrada_productos_controlador extends controller{
    
    private $_movimiento_producto;
    private $_compras;
    private $_detalle_compra;
    
    public function __construct() {
        parent::__construct();
        $this->_movimiento_producto = $this->cargar_modelo('movimiento_producto');
        $this->_compras= $this->cargar_modelo('compras');
        $this->_detalle_compra = $this->cargar_modelo('detalle_compra');
    }
    
    public function index(){
        $this->_vista->datos = $this->_compras->selecciona();
        $this->_vista->renderizar('index');
    }
    
    public function confirmacion(){
        $this->_vista->datos = $this->_compras->selecciona();
        $this->_vista->setJs(array('funciones_confirmacion'));
        $this->_vista->renderizar('confirmacion');
    }
    
    public function get_detalle_compra(){
        $this->_detalle_compra->idcompra = $_POST['idcompra'];
        json_encode($this->_detalle_compra->selecciona());
    }
    
}

?>
