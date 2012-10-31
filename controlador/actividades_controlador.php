<?php

class actividades_controlador extends controller {
    
    private $_actividades;

    public function __construct() {
        parent::__construct();
        $this->_actividades = $this->cargar_modelo('actividades');
    }

    public function index() {
        $this->_actividades->idactividad = 0;
        $this->_vista->datos = $this->_actividades->selecciona();
        $this->_vista->renderizar('index');
    }

    public function nuevo() {
        if ($_POST['guardar'] == 1) {
            $this->_actividades->idactividad = 0;
            $this->_actividades->descripcion = $_POST['descripcion'];
            $this->_actividades->inserta();
            $this->redireccionar('actividades');
        }
        $this->_vista->titulo = 'Registrar Tipo de Actividad Empleado';
        $this->_vista->action = BASE_URL . 'actividades/nuevo';
        $this->_vista->renderizar('form');
    }

    public function editar($id) {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('actividades');
        }

        $this->_actividades->idactividad = $this->filtrarInt($id);
        $this->_vista->datos = $this->_actividades->selecciona();

        if ($_POST['guardar'] == 1) {
            $this->_actividades->idactividad = $_POST['codigo'];
            $this->_actividades->descripcion = $_POST['descripcion'];
            $this->_actividades->actualiza();
            $this->redireccionar('actividades');
        }
        $this->_vista->titulo = 'Actualizar Tipo de Actividad Empleado';
        $this->_vista->renderizar('form');
    }

    public function eliminar($id) {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('actividades');
        }
        $this->_actividades->idactividad = $this->filtrarInt($id);
        $this->_actividades->elimina();
        $this->redireccionar('actividades');
    }
}

?>
