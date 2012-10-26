<?php

class tipo_movimiento_controlador extends controller {
    
    private $_tipo_movimiento;

    public function __construct() {
        parent::__construct();
        $this->_tipo_movimiento = $this->cargar_modelo('tipo_movimiento');
    }

    public function index() {
        $this->_tipo_movimiento->idtipo_movimiento = 0;
        $this->_vista->datos = $this->_tipo_movimiento->selecciona();
        $this->_vista->renderizar('index');
    }

    public function nuevo() {
        if ($_POST['guardar'] == 1) {
            $this->_tipo_movimiento->idtipo_movimiento = 0;
            $this->_tipo_movimiento->descripcion = $_POST['descripcion'];
            $this->_tipo_movimiento->inserta();
            $this->redireccionar('tipo_movimiento');
        }
        $this->_vista->titulo = 'Registrar Tipo de Movimiento';
        $this->_vista->action = BASE_URL . 'tipo_movimiento/nuevo';
        $this->_vista->renderizar('form');
    }

    public function editar($id) {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('tipo_movimiento');
        }

        $this->_tipo_movimiento->idtipo_movimiento = $this->filtrarInt($id);
        $this->_vista->datos = $this->_tipo_movimiento->selecciona();

        if ($_POST['guardar'] == 1) {
            $this->_tipo_movimiento->idtipo_movimiento = $_POST['codigo'];
            $this->_tipo_movimiento->descripcion = $_POST['descripcion'];
            $this->_tipo_movimiento->actualiza();
            $this->redireccionar('tipo_movimiento');
        }
        $this->_vista->titulo = 'Actualizar Tipo de Movimiento';
        $this->_vista->renderizar('form');
    }

    public function eliminar($id) {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('tipo_movimiento');
        }
        $this->_tipo_movimiento->idtipo_movimiento = $this->filtrarInt($id);
        $this->_tipo_movimiento->elimina();
        $this->redireccionar('tipo_movimiento');
    }
}

?>
