<?php

class productos_controlador extends controller {
    
    private $_productos;
    private $_servicios;
    private $_tipo_producto;
    private $_unidad_medida;
    private $_ubicaciones;
    private $_promociones;

    public function __construct() {
        parent::__construct();
        $this->_productos = $this->cargar_modelo('productos');
        $this->_servicios= $this->cargar_modelo('servicios');
        $this->_tipo_producto= $this->cargar_modelo('tipo_producto');
        $this->_unidad_medida= $this->cargar_modelo('unidad_medida');
        $this->_ubicaciones= $this->cargar_modelo('ubicaciones');
        $this->_promociones= $this->cargar_modelo('promociones');
    }

    public function index() {
        $this->_vista->datos = $this->_productos->selecciona();
        $this->_vista->setJs(array('funcion'));
        $this->_vista->setCss(array('estilos_index'));
        $this->_vista->renderizar('index');
    }
    
    public function ver(){
        $this->_productos->idproducto=$_POST['idproducto'];
        echo json_encode($this->_productos->selecciona());
    }
    
    public function buscador(){
        if($_POST['filtro']==0){
            $this->_productos->descripcion=$_POST['cadena'];
        }
        if($_POST['filtro']==1){
            $this->_productos->tipo_producto = $_POST['cadena'];
        }
        if($_POST['filtro']==2){
            $this->_productos->unidad_medida = $_POST['cadena'];
        }
        if($_POST['filtro']==3){
            $this->_productos->ubicacion = $_POST['cadena'];
        }
        echo json_encode($this->_productos->selecciona());
    }

    public function nuevo() {
        if ($_POST['guardar'] == 1) {
//            echo '<pre>';
//            print_r($_POST);
//            echo '</pre>';
//            exit;
            $this->_productos->descripcion = utf8_decode($_POST['descripcion']);
            $this->_productos->precio_unitario= $_POST['precio_unitario'];
            $this->_productos->observaciones = $_POST['observaciones'];
            $this->_productos->idservicio = $_POST['servicio'];
            $this->_productos->idtipo_producto = $_POST['tipo_producto'];
            $this->_productos->idunidad_medida = $_POST['unidad_medida'];
            $this->_productos->idubicacion = $_POST['ubicacion'];
            $this->_productos->idpromocion= $_POST['promocion'];
            $this->_productos->stock = $_POST['stock'];
            $this->_productos->estado = $_POST['estado'];
            $this->_productos->precio_compra = $_POST['precio_compra'];
            $this->_productos->inserta();
            $this->redireccionar('productos');
        }
        $this->_vista->datos_servicios= $this->_servicios->selecciona();
        $this->_vista->datos_tipo= $this->_tipo_producto->selecciona();
        $this->_vista->datos_um= $this->_unidad_medida->selecciona();
        $this->_vista->datos_ubicaciones= $this->_ubicaciones->selecciona();
        $this->_vista->datos_promociones= $this->_promociones->selecciona();
        $this->_vista->titulo = 'Registrar Producto';
        $this->_vista->action = BASE_URL . 'productos/nuevo';
        $this->_vista->setJs(array('funciones_form'));
        $this->_vista->setCss(array('estilos_form'));
        $this->_vista->renderizar('form');
    }
    
    public function inserta_um(){        
        $this->_unidad_medida->descripcion=$_POST['descripcion'];
        $this->_unidad_medida->abreviatura=$_POST['abreviatura'];
        $this->_unidad_medida->inserta();
    }
    
    public function get_um(){
        $this->_unidad_medida->idunidad_medida=$_POST['id'];
        echo json_encode($this->_unidad_medida->selecciona());
    }
    
    public function editar($id) {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('productos');
        }        
        if ($_POST['guardar'] == 1) {
//            echo '<pre>';
//            print_r($_POST);
//            echo '</pre>';
//            exit;
            $this->_productos->idproducto = $_POST['codigo'];
            $this->_productos->descripcion = utf8_decode($_POST['descripcion']);
            $this->_productos->precio_unitario= $_POST['precio_unitario'];
            $this->_productos->observaciones = $_POST['observaciones'];
            $this->_productos->idservicio = $_POST['servicio'];
            $this->_productos->idtipo_producto = $_POST['tipo_producto'];
            $this->_productos->idunidad_medida = $_POST['unidad_medida'];
            $this->_productos->idubicacion = $_POST['ubicacion'];
            $this->_productos->idpromocion= $_POST['promocion'];
            $this->_productos->stock = $_POST['stock'];
            $this->_productos->estado = $_POST['estado'];
            $this->_productos->precio_compra = $_POST['precio_compra'];
            $this->_productos->actualiza();
            $this->redireccionar('productos');
        }
        
        $this->_productos->idproducto = $this->filtrarInt($id);
        $this->_vista->datos= $this->_productos->selecciona();
        $this->_vista->datos_servicios= $this->_servicios->selecciona();
        $this->_vista->datos_tipo= $this->_tipo_producto->selecciona();
        $this->_vista->datos_um= $this->_unidad_medida->selecciona();
        $this->_vista->datos_ubicaciones= $this->_ubicaciones->selecciona();
        $this->_vista->datos_promociones= $this->_promociones->selecciona();
        $this->_vista->titulo = 'Actualizar Producto';
        $this->_vista->setJs(array('funciones_form'));
        $this->_vista->setCss(array('estilos_form'));
        $this->_vista->renderizar('form');
    }
    
    public function eliminar($id) {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('productos');
        }
        $this->_productos->idproducto = $this->filtrarInt($id);
        $this->_productos->elimina();
        $this->redireccionar('productos');
    }
    
}

?>
