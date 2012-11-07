<?php

class ubicaciones_controlador extends controller {

    private $_ubicaciones;
    private $_almacenes;

    public function __construct() {
        parent::__construct();
        $this->_ubicaciones = $this->cargar_modelo('ubicaciones');
        $this->_almacenes = $this->cargar_modelo('almacenes');
    }

    public function index() {
        $this->_ubicaciones->idubicacion = 0;
        $this->_vista->datos = $this->_ubicaciones->selecciona();
        $this->_vista->setJs(array('funcion'));
        $this->_vista->renderizar('index');
    }
    
    public function buscador(){
        $this->_ubicaciones->idubicacion = 0;
        if($_POST['filtro']==0){
            $this->_ubicaciones->descripcion=$_POST['cadena'];
        }else{
            $this->_ubicaciones->almacenes=$_POST['cadena'];
        }
        echo json_encode($this->_ubicaciones->selecciona());
    }

    public function nuevo() {
        if ($_POST['guardar'] == 1) {
            $this->_ubicaciones->idubicacion = 0;
            $this->_ubicaciones->descripcion = $_POST['descripcion'];
            $this->_ubicaciones->idalmacen = $this->filtrarInt($_POST['almacen']);
            $this->_ubicaciones->inserta();
            $this->redireccionar('ubicaciones');
        }
        $this->_almacenes->idalmacen = 0;
        $this->_vista->datosAlmacen = $this->_almacenes->selecciona();
        $this->_vista->titulo = 'Registrar Ubicacion';
        $this->_vista->action = BASE_URL . 'ubicaciones/nuevo';
        $this->_vista->renderizar('form');
    }

    public function editar($id) {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('ubicaciones');
        }

        $this->_ubicaciones->idubicacion = $this->filtrarInt($id);
        $this->_vista->datos = $this->_ubicaciones->selecciona();

        if ($_POST['guardar'] == 1) {
            $this->_ubicaciones->idubicacion = $_POST['codigo'];
            $this->_ubicaciones->descripcion = $_POST['descripcion'];
            $this->_ubicaciones->idalmacen = $this->filtrarInt($_POST['almacen']);
            $this->_ubicaciones->actualiza();
            $this->redireccionar('ubicaciones');
        }
        $this->_almacenes->idalmacen = 0;
        $this->_vista->datosAlmacen = $this->_almacenes->selecciona();
        $this->_vista->titulo = 'Actualizar Ubicaion';
        $this->_vista->renderizar('form');
    }

    public function eliminar($id) {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('ubicaciones');
        }
        $this->_ubicaciones->idubicacion = $this->filtrarInt($id);
        $this->_ubicaciones->elimina();
        $this->redireccionar('ubicaciones');
    }

}

?>
