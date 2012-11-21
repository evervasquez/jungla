<?php

class web_controlador extends controller {

    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $this->_vista->setJs(array('jflow.plus.min'));
        $this->_vista->setJs(array('funciones_index'));
        $this->_vista->setCss(array('estilos_index'));
        $this->_vista->setCss(array('jflow.style'));
        $this->_vista->renderiza_web('index');
    }
    
    public function servicios(){
        $this->_vista->setCss(array('estilos_servicios'));
        $this->_vista->renderiza_web('servicios');
    }
    public function fotos(){
        $this->_vista->setJs(array('jquery.lightbox'));
        $this->_vista->setCss(array('jquery.lightbox'));
        $this->_vista->setJs(array('funciones_fotos'));
        $this->_vista->setCss(array('estilos_fotos'));
        $this->_vista->renderiza_web('fotos');
    }
    public function contactenos(){
        $this->_vista->setCss(array('estilos_contactenos'));
        $this->_vista->renderiza_web('contacto');
    }
}

?>
