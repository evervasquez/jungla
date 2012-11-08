<?php

class membresia_controlador extends controller{
    
    private $_membresias;

    public function __construct() {
        parent::__construct();
        $this->_membresias = $this->cargar_modelo('membresia');
    }

    public function index() {
        $this->_vista->datos = $this->_membresias->selecciona();
        $this->_vista->setJs(array('funcion'));
        $this->_vista->renderizar('index');
    }
    
    public function buscador(){
        if($_POST['filtro']==0){
            $this->_membresias->descripcion=$_POST['descripcion'];
        }
        echo json_encode($this->_membresias->selecciona());
    }

    public function nuevo() {
        if ($_POST['guardar'] == 1) {
            $this->_membresias->descripcion = $_POST['descripcion'];
            $this->_membresias->inserta();
            $this->redireccionar('membresia');
        }
        $this->_vista->titulo = 'Registrar Membresia';
        $this->_vista->action = BASE_URL.'membresia/nuevo';
        $this->_vista->setJs(array('funciones_form'));
        $this->_vista->renderizar('form');
    }

    public function editar($id) {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('membresias');
        }

        $this->_membresias->idmembresia = $this->filtrarInt($id);
        $this->_vista->datos = $this->_membresias->selecciona();

        if ($_POST['guardar'] == 1) {
            $this->_membresias->idmembresia = $_POST['codigo'];
            $this->_membresias->descripcion = $_POST['descripcion'];
            $this->_membresias->actualiza();
            $this->redireccionar('membresia');
        }
        $this->_vista->titulo = 'Actualizar Membresia';
        $this->_vista->setJs(array('funciones_form'));
        $this->_vista->renderizar('form');
    }

    public function eliminar($id) {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('membresia');
        }
        $this->_membresias->idmembresia = $this->filtrarInt($id);
        $this->_membresias->elimina();
        $this->redireccionar('membresia');
    }

}

?>
