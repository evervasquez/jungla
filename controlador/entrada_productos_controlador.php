<?php

class entrada_productos_controlador extends controller{
    
    private $_movimiento_producto;
    private $_compras;
    private $_detalle_compra;
    private $_productos;
    
    public function __construct() {
        parent::__construct();
        $this->_movimiento_producto = $this->cargar_modelo('movimiento_producto');
        $this->_compras= $this->cargar_modelo('compras');
        $this->_detalle_compra = $this->cargar_modelo('detalle_compra');
        $this->_productos = $this->cargar_modelo('productos');
    }
    
    public function index(){
        $this->_compras->confirmacion=1;
        $this->_vista->datos = $this->_compras->selecciona();
        $this->_vista->renderizar('index');
    }
    
    public function entradas_pendientes(){
        $this->_compras->confirmacion=0;
        $this->_vista->datos = $this->_compras->selecciona();   
        $this->_vista->renderizar('entradas_pendientes');
    }
    
    public function confirmacion($id){
        $this->_detalle_compra->idcompra = $id;
        $this->_vista->datos = $this->_detalle_compra->selecciona();   
        $this->_vista->id=$id;
        $this->_vista->setJs(array('funciones_confirmacion'));
        $this->_vista->renderizar('confirmacion');
    }
    
    public function inserta(){
        //actualiza stock de productos
        
        
        //inserta movimiento_producto
//        echo '<pre>';
//        print_r($_POST);exit;
        $_POST['idcompra'];
        $this->_vista->renderizar('entradas_pendientes');
    }
    
}

?>
