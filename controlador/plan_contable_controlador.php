<?php

class plan_contable_controlador extends controller {

    private $_plan_contable;
    private $_categorias;

    public function __construct() {
        if (!$this->acceso(36)) {
            $this->redireccionar('error/access/5050');
        }
        parent::__construct();
        $this->_plan_contable = $this->cargar_modelo('plan_contable');
        $this->_categorias= $this->cargar_modelo('categorias');
    }

    public function index() {
        $this->_plan_contable->idcuenta = 0;
        $this->_vista->datos = $this->_plan_contable->selecciona();
        $this->_vista->setJs(array('funcion'));
        $this->_vista->renderizar('index');
    }

    public function nuevo() {
        if ($_POST['guardar'] == 1) {
            $this->_plan_contable->idcuenta = 0;
            $this->_plan_contable->descripcion = $_POST['descripcion'];
            $this->_plan_contable->nro_cuenta = $_POST['nro_cuenta'];
            $this->_plan_contable->idcuenta_padre = $_POST['cuenta_padre'];
            $this->_plan_contable->idcategoria = $_POST['idcategoria'];
            $this->_plan_contable->inserta();
            $this->redireccionar('plan_contable');
        }
        $this->_categorias->idcategoria = 0;
        $this->_vista->datos_cuentas=  $this->_plan_contable->seleccionar(0);
        $this->_vista->datos_categorias = $this->_categorias->selecciona();
        $this->_vista->titulo = 'Registrar Cuenta';
        $this->_vista->action = BASE_URL . 'plan_contable/nuevo';
        $this->_vista->renderizar('form');
    }
    
    public function buscador(){
        if($_POST['filtro']==0){
            $this->_plan_contable->nro_cuenta=$_POST['cadena'];
        }
        if($_POST['filtro']==1){
            $this->_plan_contable->descripcion= $_POST['cadena'];
        }
        if($_POST['filtro']==2){
            $this->_plan_contable->nivel = $_POST['cadena'];
        }
        if($_POST['filtro']==3){
            $this->_plan_contable->idcuenta_padre = $_POST['cadena'];
        }
        echo json_encode($this->_plan_contable->selecciona());
    }
    
    public function editar($id) {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('plan_contable');
        }

        $this->_plan_contable->idcuenta = $this->filtrarInt($id);
        $this->_vista->datos = $this->_plan_contable->selecciona();

        if ($_POST['guardar'] == 1) {
            $this->_plan_contable->idcuenta = $_POST['codigo'];
            $this->_plan_contable->descripcion = $_POST['descripcion'];
            $this->_plan_contable->nro_cuenta = $_POST['nro_cuenta'];
            $this->_plan_contable->idcuenta_padre = $_POST['cuenta_padre'];
            $this->_plan_contable->idcategoria = $_POST['idcategoria'];
            $this->_plan_contable->actualiza();
            $this->redireccionar('plan_contable');
        }
        $this->_vista->datos_categorias = $this->_categorias->selecciona();
        $this->_vista->datos_cuentas =  $this->_plan_contable->seleccionar(0);
        $this->_vista->setJs(array('funciones_form'));
        $this->_vista->titulo = 'Actualizar Cuenta';
        $this->_vista->renderizar('form');
    }

    public function eliminar($id) {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('plan_contable');
        }
        $this->_plan_contable->idcuenta = $this->filtrarInt($id);
        $this->_plan_contable->elimina();
        $this->redireccionar('plan_contable');
    }

}

?>
