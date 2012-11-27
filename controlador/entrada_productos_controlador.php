<?php

class entrada_productos_controlador extends controller{
    
    private $_movimiento_producto;
    private $_compras;
    private $_detalle_compra;
    private $_productos;
    private $_alertas;
    
    public function __construct() {
        parent::__construct();
        $this->_movimiento_producto = $this->cargar_modelo('movimiento_producto');
        $this->_compras= $this->cargar_modelo('compras');
        $this->_detalle_compra = $this->cargar_modelo('detalle_compra');
        $this->_productos = $this->cargar_modelo('productos');
        $this->_alertas = $this->cargar_modelo('alertas');
    }
    
    public function index(){
        $this->_compras->confirmacion=0;
        $this->_vista->datos_compras = $this->_compras->selecciona();
        $this->_vista->datos = $this->_movimiento_producto->selecciona();
        $this->_vista->setJs(array('funcion'));
        $this->_vista->setCss(array('estilos_index'));
        $this->_vista->renderizar('index');
    }
    
//    public function entradas_pendientes(){
//        $this->_compras->confirmacion=0;
//        $this->_vista->datos = $this->_compras->selecciona();   
//        $this->_vista->renderizar('entradas_pendientes');
//    }
    
    public function confirmacion($id){
        $this->_detalle_compra->idcompra = $id;
        $this->_vista->datos = $this->_detalle_compra->selecciona();   
        $this->_vista->id=$id;
        $this->_vista->setJs(array('funciones_confirmacion'));
        $this->_vista->renderizar('confirmacion');
    }
//    
//    public function elimina_alerta(){
//    }
    
    public function inserta(){
//        echo '<pre>';
//        print_r($_POST);exit;
        //actualiza stock de productos
        for($i=0;$i<count($_POST['idproducto']);$i++){
            $this->_productos->idproducto=$_POST['idproducto'][$i];
            $this->_productos->stock=$_POST['cantidad'][$i];
            $this->_productos->aumenta=1;
            $this->_productos->actualiza();
        }
        
        //inserta movimiento_producto
        $this->_movimiento_producto->idcompra=$_POST['idcompra'];
        $this->_movimiento_producto->idtipo_movimiento=1;
        $this->_movimiento_producto->idempleado=session::get('idempleado');
        $this->_movimiento_producto->fecha=date("d-m-Y");
        $this->_movimiento_producto->inserta();
        $this->_alertas->desactiva_alerta();
        $this->redireccionar('entrada_productos');
    }
    
}

?>
