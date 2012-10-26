<?php

class concepto_movimiento_controlador extends controller {
    
    private $_concepto_movimiento;

    public function __construct() {
        parent::__construct();
        $this->_concepto_movimiento = $this->cargar_modelo('concepto_movimiento');
    }

    public function index() {
        $this->_concepto_movimiento->idconcepto_movimiento = 0;
        $this->_vista->datos = $this->_concepto_movimiento->selecciona();
        $this->_vista->renderizar('index');
    }

    public function nuevo() {
        if ($_POST['guardar'] == 1) {
            $this->_concepto_movimiento->idconcepto_movimiento = 0;
            $this->_concepto_movimiento->descripcion = $_POST['descripcion'];
            $this->_concepto_movimiento->inserta();
            $this->redireccionar('concepto_movimiento');
        }
        $this->_vista->titulo = 'Registrar Concepto Movimiento';
        $this->_vista->action = BASE_URL . 'concepto_movimiento/nuevo';
        $this->_vista->renderizar('form');
    }

    public function editar($id) {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('concepto_movimiento');
        }

        $this->_concepto_movimiento->idconcepto_movimiento = $this->filtrarInt($id);
        $this->_vista->datos = $this->_concepto_movimiento->selecciona();

        if ($_POST['guardar'] == 1) {
            $this->_concepto_movimiento->idconcepto_movimiento = $_POST['codigo'];
            $this->_concepto_movimiento->descripcion = $_POST['descripcion'];
            $this->_concepto_movimiento->actualiza();
            $this->redireccionar('concepto_movimiento');
        }
        $this->_vista->titulo = 'Actualizar Concepto Movimiento';
        $this->_vista->renderizar('form');
    }

    public function eliminar($id) {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('concepto_movimiento');
        }
        $this->_concepto_movimiento->idconcepto_movimiento = $this->filtrarInt($id);
        $this->_concepto_movimiento->elimina();
        $this->redireccionar('concepto_movimiento');
    }
    
}

?>
