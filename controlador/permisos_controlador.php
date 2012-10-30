<?php

class permisos_controlador extends controller {

    private $_permisos;
    private $_perfiles;
    private $_modulos;

    public function __construct() {
        parent::__construct();
        $this->_permisos = $this->cargar_modelo('permisos');
        $this->_perfiles= $this->cargar_modelo('perfiles');
        $this->_modulos= $this->cargar_modelo('modulos');
    }

    public function index() {
        $this->_perfiles->idperfil=0;
        $this->_vista->datos_perfiles=$this->_perfiles->selecciona();
        $this->_modulos->idmodulo=9999;
        $this->_vista->datos_modulos=$this->_modulos->selecciona();
        $this->_vista->renderizar('index');
    }

    public function nuevo() {
        $this->_vista->renderizar('form');
    }

}

?>
