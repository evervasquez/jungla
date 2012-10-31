<?php

class tipo_empleado_controlador extends controller {
    
    private $_tipo_empleado;

    public function __construct() {
        parent::__construct();
        $this->_tipo_empleado = $this->cargar_modelo('tipo_empleado');
    }

    public function index() {
        $this->_tipo_empleado->idtipo_empleado = 0;
        $this->_vista->datos = $this->_tipo_empleado->selecciona();
        $this->_vista->renderizar('index');
    }

    public function nuevo() {
        if ($_POST['guardar'] == 1) {
            $this->_tipo_empleado->idtipo_empleado = 0;
            $this->_tipo_empleado->descripcion = $_POST['descripcion'];
            $this->_tipo_empleado->inserta();
            $this->redireccionar('tipo_empleado');
        }
        $this->_vista->titulo = 'Registrar Tipo de Empleado';
        $this->_vista->action = BASE_URL . 'tipo_empleado/nuevo';
        $this->_vista->renderizar('form');
    }

    public function editar($id) {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('tipo_empleado');
        }

        $this->_tipo_empleado->idtipo_empleado = $this->filtrarInt($id);
        $this->_vista->datos = $this->_tipo_empleado->selecciona();

        if ($_POST['guardar'] == 1) {
            $this->_tipo_empleado->idtipo_empleado = $_POST['codigo'];
            $this->_tipo_empleado->descripcion = $_POST['descripcion'];
            $this->_tipo_empleado->actualiza();
            $this->redireccionar('tipo_empleado');
        }
        $this->_vista->titulo = 'Actualizar Tipo de Empleado';
        $this->_vista->renderizar('form');
    }

    public function eliminar($id) {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('tipo_empleado');
        }
        $this->_tipo_empleado->idtipo_empleado = $this->filtrarInt($id);
        $this->_tipo_empleado->elimina();
        $this->redireccionar('tipo_empleado');
    }
}

?>
