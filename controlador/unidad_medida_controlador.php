<?php

class unidad_medida_controlador extends controller{
    
    private $_unidad_medida;

    public function __construct() {
        if (!$this->acceso(13)) {
            $this->redireccionar('error/access/5050');
        }
        parent::__construct();
        $this->_unidad_medida = $this->cargar_modelo('unidad_medida');
    }

    public function index() {
        $this->_vista->datos = $this->_unidad_medida->selecciona();
        $this->_vista->setJs(array('funcion'));
        $this->_vista->renderizar('index');
    }
    
    public function buscador(){
        if($_POST['filtro']==0){
            $this->_unidad_medida->descripcion=$_POST['cadena'];
        }else{
            $this->_unidad_medida->abreviatura=$_POST['cadena'];
        }
        echo json_encode($this->_unidad_medida->selecciona());
    }
    
    public function nuevo() {
        if ($_POST['guardar'] == 1) {
            $this->_unidad_medida->descripcion = $_POST['descripcion'];
            $this->_unidad_medida->abreviatura = $_POST['abreviatura'];
            $this->_unidad_medida->inserta();
            $this->redireccionar('unidad_medida');
        }
        $this->_vista->titulo = 'Registrar Unidad de Medida';
        $this->_vista->action = BASE_URL . 'unidad_medida/nuevo';
        $this->_vista->setJs(array('funciones_form'));
        $this->_vista->renderizar('form');
    }

    public function editar($id) {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('unidad_medida');
        }

        $this->_unidad_medida->idunidad_medida = $this->filtrarInt($id);
        $this->_vista->datos = $this->_unidad_medida->selecciona();

        if ($_POST['guardar'] == 1) {
            $this->_unidad_medida->idunidad_medida = $_POST['codigo'];
            $this->_unidad_medida->descripcion = $_POST['descripcion'];
            $this->_unidad_medida->abreviatura = $_POST['abreviatura'];
            $this->_unidad_medida->actualiza();
            $this->redireccionar('unidad_medida');
        }
        $this->_vista->titulo = 'Actualizar Unidad de Medida';
        $this->_vista->setJs(array('funciones_form'));
        $this->_vista->renderizar('form');
    }

    public function eliminar($id) {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('unidad_medida');
        }
        $this->_unidad_medida->idunidad_medida = $this->filtrarInt($id);
        $this->_unidad_medida->elimina();
        $this->redireccionar('unidad_medida');
    }
    
}
?>
