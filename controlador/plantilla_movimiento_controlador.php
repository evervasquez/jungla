<?php

class plantilla_movimiento_controlador extends controller {

    private $_plantilla_movimiento;
    private $_plan_contable;
    private $_concepto_movimiento;

    public function __construct() {
        if (!$this->acceso(32)) {
            $this->redireccionar('error/access/5050');
        }
        $this->_plantilla_movimiento = $this->cargar_modelo('plantilla_movimiento');
        $this->_plan_contable = $this->cargar_modelo('plan_contable');
        $this->_concepto_movimiento = $this->cargar_modelo('concepto_movimiento');
        parent::__construct();
    }

    public function index() {
        $this->_vista->datos = $this->_plantilla_movimiento->selecciona();
        $this->_vista->setJs(array('funcion'));
        $this->_vista->renderizar('index');
    }
    
    public function buscador(){
        if($_POST['filtro']==0){
            $this->_plantilla_movimiento->descripcion=$_POST['cadena'];
        }
        if($_POST['filtro']==1){
            $this->_plantilla_movimiento->cuenta=$_POST['cadena'];
        }
        if($_POST['filtro']==2){
            $this->_plantilla_movimiento->concepto_movimiento=$_POST['cadena'];
        }
        echo json_encode($this->_plantilla_movimiento->selecciona());
    }

    public function nuevo() {
        if ($_POST['guardar'] == 1) {
            $this->_plantilla_movimiento->descripcion = $_POST['descripcion'];
            $this->_plantilla_movimiento->idcuenta = $this->filtrarInt($_POST['idcuenta']);
            $this->_plantilla_movimiento->idconcepto_movimiento = $this->filtrarInt($_POST['idconcepto_movimiento']);
            $this->_plantilla_movimiento->debe_haber = $_POST['debe_haber'];
            $this->_plantilla_movimiento->inserta();
            $this->redireccionar('plantilla_movimiento');
        }
        $this->_vista->datosCuentas = $this->_plan_contable->selecciona();
        $this->_vista->datosConcepto = $this->_concepto_movimiento->selecciona();
        $this->_vista->titulo = 'Registrar Plantilla Movimiento';
        $this->_vista->action = BASE_URL . 'plantilla_movimiento/nuevo';
        $this->_vista->setJs(array('funciones_form'));
        $this->_vista->renderizar('form');
    }

    public function editar($id) {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('plantilla_movimiento');
        }

        $this->_plantilla_movimiento->idplantilla_movimiento = $this->filtrarInt($id);
        $this->_vista->datos = $this->_plantilla_movimiento->selecciona();

        if ($_POST['guardar'] == 1) {
            $this->_plantilla_movimiento->idplantilla_movimiento = $_POST['codigo'];
            $this->_plantilla_movimiento->descripcion = $_POST['descripcion'];
            $this->_plantilla_movimiento->idcuenta = $_POST['idcuenta'];
            $this->_plantilla_movimiento->idconcepto_movimiento = $_POST['idconcepto_movimiento'];
            $this->_plantilla_movimiento->debe_haber = $_POST['debe_haber'];
            $this->_plantilla_movimiento->actualiza();
            $this->redireccionar('plantilla_movimiento');
        }
        $this->_vista->datosCuentas = $this->_plan_contable->selecciona();
        $this->_vista->datosConcepto = $this->_concepto_movimiento->selecciona();
        $this->_vista->setJs(array('funciones_form'));
        $this->_vista->titulo = 'Actualizar Plantilla Movimiento';
        $this->_vista->renderizar('form');
    }
    
        public function eliminar($id) {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('plantilla_movimiento');
        }
        $this->_plantilla_movimiento->idplantilla_movimiento = $this->filtrarInt($id);
        $this->_plantilla_movimiento->elimina();
        $this->redireccionar('plantilla_movimiento');
    }
}
 
?>
