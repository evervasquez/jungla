<?php

class servicios_controlador extends controller {

    private $_servicios;

    public function __construct() {
        parent::__construct();
        $this->_servicios = $this->cargar_modelo('servicios');
    }

    public function index() {
        $this->_servicios->idservicio = 0;
        $this->_servicios->descripcion = '';
        $this->_vista->datos = $this->_servicios->selecciona();
        $this->_vista->renderizar('index');
    }
    
    public function buscador(){
        $this->_servicios->idservicio = 0;
        if($_POST['filtro']==0){
            $this->_servicios->descripcion=$_POST['descripcion'];
        }
        echo json_encode($this->_servicios->selecciona());
    }
    
    public function nuevo() {        
        if ($_POST['guardar'] == 1) {
            $this->_servicios->idservicio = 0;
            $this->_servicios->descripcion = $_POST['descripcion'];
            $this->_servicios->inserta();
            $this->redireccionar('servicios');
        }
        $this->_vista->titulo = 'Registrar Servicio';
        $this->_vista->action = BASE_URL.'servicios/nuevo';
        $this->_vista->renderizar('form');
    }

    public function editar($id) {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('servicios');
        }

        $this->_servicios->idservicio = $this->filtrarInt($id);
        $this->_vista->datos = $this->_servicios->selecciona();

        if ($_POST['guardar'] == 1) {
            $this->_servicios->idservicio = $_POST['codigo'];
            $this->_servicios->descripcion = $_POST['descripcion'];
            $this->_servicios->actualiza();
            $this->redireccionar('servicios');
        }
        $this->_vista->titulo = 'Actualizar Servicio';
        $this->_vista->renderizar('form');
    }

    public function eliminar($id) {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('servicios');
        }
        $this->_servicios->idservicio = $this->filtrarInt($id);
        $this->_servicios->elimina();
        $this->redireccionar('servicios');
    }

}

?>
