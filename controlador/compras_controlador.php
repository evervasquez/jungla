<?php

class compras_controlador extends controller{
    
    private $_compras;
    private $_proveedores;

    public function __construct() {
        parent::__construct();
        $this->_compras = $this->cargar_modelo('compras');
        $this->_proveedores = $this->cargar_modelo('proveedores');
        $this->_tipo_transaccion= $this->cargar_modelo('tipo_transaccion');
        $this->_productos= $this->cargar_modelo('productos');
        $this->_unidad_medida= $this->cargar_modelo('unidad_medida');
    }

    public function index() {
        $this->_vista->datos = $this->_compras->selecciona();
        $this->_vista->renderizar('index');
    }
    
    public function nuevo(){
        if ($_POST['guardar'] == 1) {
            $this->_compras->idalmacen = 0;
            $this->_compras->descripcion = $_POST['descripcion'];
            $this->_compras->inserta();
            $this->redireccionar('compras');
        }
        $this->_proveedores->idproveedor = 0;
        $this->_vista->datos_proveedores = $this->_proveedores->selecciona();
        $this->_tipo_transaccion->idtipo_transaccion=0;
        $this->_vista->datos_tipo_transaccion=$this->_tipo_transaccion->selecciona();
        $this->_productos->idproducto = 0;
        $this->_vista->datos_productos = $this->_productos->selecciona();
        $this->_unidad_medida->idunidad_medida=0;
        $this->_vista->datos_um= $this->_unidad_medida->selecciona();   
        $this->_vista->titulo = 'Registrar Compra:';
        $this->_vista->action = BASE_URL . 'compras/nuevo';
        $this->_vista->setJs(array('funciones_form'));
        $this->_vista->setCss(array('estilos_form'));
        $this->_vista->renderizar('form');
    }

    public function grilla() {
        $objcompras = new compras();
        $objcompras->idcompra= 0;
        $stmt = $objcompras->selecciona();
        return $stmt;
    }

    public function selecciona($id) {
        $objcompras = new compras();
        $objcompras->idcompra = $id;
        $stmt = $objcompras->selecciona();
        return $stmt;
    }

    public function elimina($id) {
        $objcompras = new compras();
        $objcompras->idcompra = $id;
        $error = $objcompras->elimina();
        return $error;
    }

    public function inserta($datos) {
        $objcompras = new compras();
        $objcompras->idcompra = $datos[0];
        $objcompras->fecha_compra = $datos[1];
        $objcompras->estado = $datos[2];
        $objcompras->observaciones = $datos[3];
        $objcompras->nro_comprobante = $datos[4];
        $objcompras->importe = $datos[5];
        $objcompras->igv = $datos[6];
        $objcompras->idproveedor = $datos[7];
        $objcompras->idtipo_transaccion = $datos[8];
        $error = $objcompras->inserta();
        return $error;
    }

    public function actualiza($datos) {
        $objcompras = new compras();
        $objcompras->idcompra = $datos[0];
        $objcompras->fecha_compra = $datos[1];
        $objcompras->estado = $datos[2];
        $objcompras->observaciones = $datos[3];
        $objcompras->nro_comprobante = $datos[4];
        $objcompras->importe = $datos[5];
        $objcompras->igv = $datos[6];
        $objcompras->idproveedor = $datos[7];
        $objcompras->idtipo_transaccion = $datos[8];
        $error = $objcompras->actualiza();
        return $error;
    }

}

?>
