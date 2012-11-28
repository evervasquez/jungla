<?php

class salida_productos_controlador extends controller{
    
    private $_movimiento_producto;
    private $_productos;
    
    public function __construct() {
        parent::__construct();
        $this->_movimiento_producto = $this->cargar_modelo('movimiento_producto');
        $this->_productos = $this->cargar_modelo('productos');
    }

    public function index() {
        $this->_vista->datos = $this->_movimiento_producto->selecciona();
        $this->_vista->setJs(array('funcion'));
        $this->_vista->renderizar('index');
    }
    
    public function buscador(){
        if($_POST['filtro']==0){
            $this->_movimiento_producto->producto=$_POST['cadena'];
        }
        if($_POST['filtro']==1){
            $this->_movimiento_producto->empleado = $_POST['cadena'];
        }
        echo json_encode($this->_proveedores->selecciona());
    }
    
    public function registrar_salida(){
        $this->_vista->action = BASE_URL.'salida_productos/inserta';
        $this->_vista->titulo = 'Registrar Salida';
        $this->_vista->setCss(array('estilos_form'));
        $this->_vista->setJs(array('funciones_form'));
        $this->_vista->renderizar('registrar_salida');
    }
    
    public function inserta(){
//        echo '<pre>';
//        print_r($_POST);exit;
        for($i=0;$i<count($_POST['idproducto']);$i++){
            //actualiza stock de productos
            $this->_productos->idproducto=$_POST['idproducto'][$i];
            $this->_productos->stock=$_POST['cantidad'][$i];
            $this->_productos->actualiza();
            
            //inserta movimiento_producto
            $this->_movimiento_producto->idproducto=$_POST['idproducto'][$i];
            $this->_movimiento_producto->idtipo_movimiento=$_POST['idtipo_movimiento'][$i];;
            $this->_movimiento_producto->cantidad=$_POST['cantidad'][$i];
            $this->_movimiento_producto->idempleado=session::get('idempleado');
            $this->_movimiento_producto->fecha=date("d-m-Y");
            $this->_movimiento_producto->inserta();
        }
        $this->redireccionar('salida_productos');
    }
}

?>
