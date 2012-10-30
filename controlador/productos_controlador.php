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
        $this->_productos->idproducto = 0;
        $this->_vista->datos = $this->_productos->selecciona();
        $this->_vista->renderizar('index');
    }

    public function nuevo() {
        if ($_POST['guardar'] == 1) {
//            echo '<pre>';
//            print_r($_POST);
//            echo '</pre>';
//            exit;
            $this->_productos->idproducto= 0;
            $this->_productos->descripcion = $_POST['descripcion'];
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
        $this->_servicios->idservicio=0;
        $this->_vista->datos_servicios= $this->_servicios->selecciona();
        $this->_tipo_producto->idtipo_producto=0;
        $this->_vista->datos_tipo= $this->_tipo_producto->selecciona();
        $this->_unidad_medida->idunidad_medida=0;
        $this->_vista->datos_um= $this->_unidad_medida->selecciona();
        $this->_ubicaciones->idubicacion=0;
        $this->_vista->datos_ubicaciones= $this->_ubicaciones->selecciona();
        $this->_promociones->idpromocion=0;
        $this->_vista->datos_promociones= $this->_promociones->selecciona();
        $this->_vista->titulo = 'Registrar Producto';
        $this->_vista->action = BASE_URL . 'productos/nuevo';
        $this->_vista->renderizar('form');
    }
    
}

?>
