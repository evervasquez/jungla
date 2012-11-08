<?php

class almacenes_controlador extends controller {

    private $_almacenes;

    public function __construct() {
        parent::__construct();
        $this->_almacenes = $this->cargar_modelo('almacenes');
    }

    public function index() {
        $this->_almacenes->idalmacen = 0;
        $this->_vista->datos = $this->_almacenes->selecciona();
        $this->_vista->setJs(array('funcion'));
        $this->_vista->renderizar('index');
    }
    
    public function buscador(){
        $this->_almacenes->idalmacen = 0;
        if($_POST['filtro']==0){
            $this->_almacenes->descripcion=$_POST['descripcion'];
        }
        echo json_encode($this->_almacenes->selecciona());
    }
    
    public function nuevo() {
        if ($_POST['guardar'] == 1) {
            $this->_almacenes->idalmacen = 0;
            $this->_almacenes->descripcion = $_POST['descripcion'];
            $this->_almacenes->inserta();
            $this->redireccionar('almacenes');
        }
        $this->_vista->titulo = 'Registrar Almacen';
        $this->_vista->action = BASE_URL . 'almacenes/nuevo';
        $this->_vista->setJs(array('funciones_form'));
        $this->_vista->renderizar('form');
    }

    public function editar($id) {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('almacenes');
        }

        $this->_almacenes->idalmacen = $this->filtrarInt($id);
        $this->_vista->datos = $this->_almacenes->selecciona();

        if ($_POST['guardar'] == 1) {
            $this->_almacenes->idalmacen = $_POST['codigo'];
            $this->_almacenes->descripcion = $_POST['descripcion'];
            $this->_almacenes->actualiza();
            $this->redireccionar('almacenes');
        }
        $this->_vista->titulo = 'Actualizar Almacen';
        $this->_vista->setJs(array('funciones_form'));
        $this->_vista->renderizar('form');
    }

    public function eliminar($id) {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('almacenes');
        }
        $this->_almacenes->idalmacen = $this->filtrarInt($id);
        $this->_almacenes->elimina();
        $this->redireccionar('almacenes');
    }

}

?>
