<?php

class reserva_controlador extends controller{
    
    private $_habitaciones;
    public function __construct() {
        parent::__construct();
        $this->_habitaciones = $this->cargar_modelo('habitaciones');
    }

    public function index() {
        if($_POST['guardar']==1){
            echo '<pre>';print_r($_POST);exit;
        }
        $this->_vista->datos_habitaciones=  $this->_habitaciones->selecciona();
        $this->_vista->titulo = 'Registrar reserva';
        $this->_vista->action = BASE_URL.'reserva';
        $this->_vista->setJs(array('funciones'));
        $this->_vista->renderizar('index');
    }
}

?>
