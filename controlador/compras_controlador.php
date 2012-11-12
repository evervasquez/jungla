<?php

class compras_controlador extends controller{
    
    private $_compras;
    private $_proveedores;
    private $_tipo_transaccion;
    private $_productos;
    private $_detalle_compra;

    public function __construct() {
        parent::__construct();
        $this->_compras = $this->cargar_modelo('compras');
        $this->_proveedores = $this->cargar_modelo('proveedores');
        $this->_tipo_transaccion= $this->cargar_modelo('tipo_transaccion');
        $this->_productos= $this->cargar_modelo('productos');
        $this->_detalle_compra= $this->cargar_modelo('detalle_compra');
    }

    public function index() {
        $this->_vista->datos = $this->_compras->selecciona();
        $this->_vista->renderizar('index');
    }
    
    public function nuevo(){
        if ($_POST['guardar'] == 1) {
//            echo '<pre>';
//            print_r($_POST);
//            echo '</pre>';
//            exit;
            //inserta compra
            $this->_compras->fecha_compra = $_POST['fecha_compra'];
            $this->_compras->estado = $_POST['estado'];
            $this->_compras->observaciones = $_POST['observaciones'];
            $this->_compras->nro_comprobante = $_POST['nro_comprobante'];
            $this->_compras->importe = $_POST['importe'];
            $this->_compras->igv = $_POST['igv'];
            $this->_compras->idproveedor = $_POST['idproveedor'];
            $this->_compras->idtipo_transaccion = $_POST['tipo_transaccion'];
            $this->_compras->confirmacion = 0;
            $dato_compra=$this->_compras->inserta();
            //inserta detalle compra
            for($i=0;$i<count($_POST['idprodutos']);$i++){
                $this->_detalle_compra->idcompra=$dato_compra['idcompra'];
                $this->_detalle_compra->idproducto= $_POST['idprodutos'][$i];
                $this->_detalle_compra->cantidad= $_POST['cantidad'][$i];
                $this->_detalle_compra->precio= $_POST['precio'][$i];
                $this->_detalle_compra->inserta();
            }
            $this->redireccionar('compras');
        }
        $this->_vista->datos_proveedores = $this->_proveedores->selecciona();
        $this->_vista->datos_tipo_transaccion=$this->_tipo_transaccion->selecciona();
        $this->_vista->datos_productos = $this->_productos->selecciona();
        $this->_vista->titulo = 'Registrar Compra:';
        $this->_vista->action = BASE_URL . 'compras/nuevo';
        $this->_vista->setJs(array('funciones_form'));
        $this->_vista->setCss(array('estilos_form'));
        $this->_vista->renderizar('form');
    }
    
    public function editar($id){
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('compras');
        }
        
        if ($_POST['guardar'] == 1) {
//            echo '<pre>';
//            print_r($_POST);
//            echo '</pre>';
//            exit;
            //inserta compra
            $this->_compras->idcompra = $_POST['codigo'];
            $this->_compras->fecha_compra = $_POST['fecha_compra'];
            $this->_compras->estado = $_POST['estado'];
            $this->_compras->observaciones = $_POST['observaciones'];
            $this->_compras->nro_comprobante = $_POST['nro_comprobante'];
            $this->_compras->importe = $_POST['importe'];
            $this->_compras->igv = $_POST['igv'];
            $this->_compras->idproveedor = $_POST['idproveedor'];
            $this->_compras->idtipo_transaccion = $_POST['tipo_transaccion'];
            $this->_compras->confirmacion = 0;
            $this->_compras->actualiza();
            $this->redireccionar('compras');
        }
        $this->_compras->idcompra=$this->filtrarInt($id);
        $this->_vista->datos=$this->_compras->selecciona();
        
        $this->_detalle_compra->idcompra=$this->filtrarInt($id);
        $this->_vista->datos_detalle_compra=$this->_detalle_compra->selecciona();
        
        $this->_vista->datos_proveedores = $this->_proveedores->selecciona();
        
        $this->_vista->datos_tipo_transaccion=$this->_tipo_transaccion->selecciona();
        
        $this->_vista->datos_productos = $this->_productos->selecciona();
        
        $this->_vista->titulo = 'Actualizar Compra:';
        $this->_vista->setJs(array('funciones_editar'));
        $this->_vista->setCss(array('estilos_form'));
        $this->_vista->renderizar('form');
    }
    
    public function insertar_detalle_compra(){
        $this->_detalle_compra->idcompra=$_POST['idcompra'];
        $this->_detalle_compra->idproducto= $_POST['idprodutos'];
        $this->_detalle_compra->cantidad= $_POST['cantidad'];
        $this->_detalle_compra->precio= $_POST['precio'];
        $this->_detalle_compra->inserta();
    }
    
    public function eliminar_detalle_compra(){
        $this->_detalle_compra->idcompra=$_POST['idcompra'];
        $this->_detalle_compra->idproducto= $_POST['idprodutos'];
        $this->_detalle_compra->elimina();
    }
}

?>
