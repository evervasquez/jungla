<?php

class tipo_transaccion_controlador extends controller{
    
    private $_tipo_transaccion;

    public function __construct() {
        parent::__construct();
        $this->_tipo_transaccion = $this->cargar_modelo('tipo_transaccion');
    }

    public function index() {
        $this->_tipo_transaccion->idtipo_transaccion = 0;
        $this->_vista->datos = $this->_tipo_transaccion->selecciona();
        $this->_vista->renderizar('index');
    }

    public function nuevo() {
        if ($_POST['guardar'] == 1) {
            $this->_tipo_transaccion->idtipo_transaccion = 0;
            $this->_tipo_transaccion->descripcion = $_POST['descripcion'];
            $this->_tipo_transaccion->inserta();
            $this->redireccionar('tipo_transaccion');
        }
        $this->_vista->titulo = 'Registrar Tipo de Transaccion';
        $this->_vista->action = BASE_URL . 'tipo_transaccion/nuevo';
        $this->_vista->renderizar('form');
    }

    public function editar($id) {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('tipo_transaccion');
        }

        $this->_tipo_transaccion->idtipo_transaccion = $this->filtrarInt($id);
        $this->_vista->datos = $this->_tipo_transaccion->selecciona();

        if ($_POST['guardar'] == 1) {
            $this->_tipo_transaccion->idtipo_transaccion = $_POST['codigo'];
            $this->_tipo_transaccion->descripcion = $_POST['descripcion'];
            $this->_tipo_transaccion->actualiza();
            $this->redireccionar('tipo_transaccion');
        }
        $this->_vista->titulo = 'Actualizar Tipo de Transaccion';
        $this->_vista->renderizar('form');
    }

    public function eliminar($id) {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('tipo_transaccion');
        }
        $this->_tipo_transaccion->idtipo_transaccion = $this->filtrarInt($id);
        $this->_tipo_transaccion->elimina();
        $this->redireccionar('tipo_transaccion');
    }
}

?>