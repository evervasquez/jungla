<?php

class tipo_habitacion_controlador extends controller {
    
    private $_tipo_habitacion;

    public function __construct() {
        if (!$this->acceso(28)) {
            $this->redireccionar('error/access/5050');
        }
        parent::__construct();
        $this->_tipo_habitacion = $this->cargar_modelo('tipo_habitacion');
    }

    public function index() {
        $this->_vista->datos = $this->_tipo_habitacion->selecciona();
        $this->_vista->setJs(array('funcion'));
        $this->_vista->renderizar('index');
    }
    
    public function buscador(){
        if($_POST['filtro']==0){
            $this->_tipo_habitacion->descripcion=$_POST['descripcion'];
        }
        echo json_encode($this->_tipo_habitacion->selecciona());
    }
    
    public function nuevo() {
        if ($_POST['guardar'] == 1) {
            $this->_tipo_habitacion->descripcion = $_POST['descripcion'];
            $this->_tipo_habitacion->costo = $_POST['costo'];
            $this->_tipo_habitacion->camas = $_POST['camas'];
            $this->_tipo_habitacion->inserta();
            $this->redireccionar('tipo_habitacion');
        }
        $this->_vista->titulo = 'Registrar Tipo de Habitacion';
        $this->_vista->action = BASE_URL . 'tipo_habitacion/nuevo';
        $this->_vista->setJs(array('funciones_form'));
        $this->_vista->renderizar('form');
    }

    public function editar($id) {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('tipo_habitacion');
        }

        $this->_tipo_habitacion->idtipo_habitacion = $this->filtrarInt($id);
        $this->_vista->datos = $this->_tipo_habitacion->selecciona();

        if ($_POST['guardar'] == 1) {
            $this->_tipo_habitacion->idtipo_habitacion = $_POST['codigo'];
            $this->_tipo_habitacion->descripcion = $_POST['descripcion'];
            $this->_tipo_habitacion->costo = $_POST['costo'];
            $this->_tipo_habitacion->camas = $_POST['camas'];
            $this->_tipo_habitacion->actualiza();
            $this->redireccionar('tipo_habitacion');
        }
        $this->_vista->titulo = 'Actualizar Tipo de Habitacion';
        $this->_vista->setJs(array('funciones_form'));
        $this->_vista->renderizar('form');
    }

    public function eliminar($id) {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('tipo_habitacion');
        }
        $this->_tipo_habitacion->idtipo_habitacion = $this->filtrarInt($id);
        $this->_tipo_habitacion->elimina();
        $this->redireccionar('tipo_habitacion');
    }
}

?>
