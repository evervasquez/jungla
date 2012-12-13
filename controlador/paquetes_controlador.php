<?php

class paquetes_controlador extends controller{
    
    private $_paquetes;
    private $_producto_paquete;
    private $_productos;

    public function __construct() {
        if (!$this->acceso(24)) {
            $this->redireccionar('error/access/5050');
        }
        parent::__construct();
        $this->_paquetes = $this->cargar_modelo('paquetes');
        $this->_producto_paquete= $this->cargar_modelo('producto_paquete');
        $this->_productos= $this->cargar_modelo('productos');
    }

    public function index() {
        $this->_vista->datos = $this->_paquetes->selecciona();
        $this->_vista->setJs(array('funcion'));
        $this->_vista->renderizar('index');
    }
    
    public function buscador(){
        if($_POST['filtro']==0){
            $this->_paquetes->descripcion=$_POST['descripcion'];
        }
        echo json_encode($this->_paquetes->selecciona());
    }
    
    public function nuevo() {
        if ($_POST['guardar'] == 1) {
//            echo '<pre>';
//            print_r($_POST);
//            echo '</pre>';
//            exit;
            //inserta paquete
            $this->_paquetes->descripcion=$_POST['descripcion'];
            $this->_paquetes->descuento=0;
            $this->_paquetes->costo=$_POST['costo'];
            $dato_paquete=$this->_paquetes->inserta();
            //inserta productos x paquete
            for($i=0;$i<count($_POST['idproducto']);$i++){
                $this->_producto_paquete->idpaquete=$dato_paquete[0]['X_IDPAQUETE'];
                $this->_producto_paquete->idproducto= $_POST['idproducto'][$i];
                $this->_producto_paquete->cantidad= $_POST['cantidad'][$i];
                $this->_producto_paquete->inserta();
            }
            $this->redireccionar('paquetes');
            
        }
        $this->_vista->datos_productos=$this->_productos->selecciona();
        $this->_vista->titulo = 'Registrar Paquete';
        $this->_vista->action = BASE_URL . 'paquetes/nuevo';
        $this->_vista->setJs(array('funciones_form'));
        $this->_vista->setCss(array('estilos_form'));
        $this->_vista->renderizar('form');
    }
    
    public function editar($id){
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('paquetes');
        }
        if ($_POST['guardar'] == 1) {
//            echo '<pre>';
//            print_r($_POST);
//            echo '</pre>';
//            exit;
            //inserta habitacion
            $this->_paquetes->idpaquete=$_POST['codigo'];
            $this->_paquetes->descripcion=$_POST['descripcion'];
            $this->_paquetes->descuento=0;
            $this->_paquetes->costo=$_POST['costo'];
            $this->_paquetes->actualiza();
            $this->redireccionar('paquetes');
        }
        $this->_paquetes->idpaquete=$this->filtrarInt($id);
        $this->_vista->datos=$this->_paquetes->selecciona();
        $this->_producto_paquete->idpaquete=$this->filtrarInt($id);
        $this->_vista->datos_producto_paquete=$this->_producto_paquete->selecciona();
        $this->_vista->datos_productos=$this->_productos->selecciona();
        $this->_vista->titulo = 'Actualizar Paquete';
        $this->_vista->setJs(array('funciones_editar'));
        $this->_vista->setCss(array('estilos_form'));
        $this->_vista->renderizar('form');
    }
    
    public function eliminar($id) {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('paquetes');
        }
        $this->_paquetes->idpaquete = $this->filtrarInt($id);
        $this->_paquetes->elimina();
        $this->redireccionar('paquetes');
    }
    
    public function eliminar_producto_paquete(){
        $this->_producto_paquete->idpaquete=$_POST['idpaquete'];
        $this->_producto_paquete->idproducto= $_POST['idproducto'];
        $this->_producto_paquete->elimina();
    }
    
    public function insertar_producto_paquete(){
        $this->_producto_paquete->idpaquete=$_POST['idpaquete'];
        $this->_producto_paquete->idproducto= $_POST['idproducto'];
        $this->_producto_paquete->cantidad= $_POST['cantidad'];
        $this->_producto_paquete->inserta();
    }
    
}

?>
