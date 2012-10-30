<?php

class habitaciones_controlador extends controller {
    
    private $_habitaciones;
    private $_detalle_habitacion;

    public function __construct() {
        parent::__construct();
        $this->_habitaciones = $this->cargar_modelo('habitaciones');
        $this->_detalle_habitacion= $this->cargar_modelo('detalle_habitacion');
    }

    public function index() {
        $this->_habitaciones->idhabitacion = 0;
        $this->_vista->datos = $this->_habitaciones->selecciona();
        $this->_vista->renderizar('index');
    }
    
}

?>
