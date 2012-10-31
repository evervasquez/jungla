<?php

class web_controlador extends controller {

    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $this->_vista->renderiza_web('index');
    }
    
    public function servicios(){
        $this->_vista->renderiza_web('servicios');
    }
    public function fotos(){
        $this->_vista->renderiza_web('fotos');
    }
    public function contactenos(){
        $this->_vista->renderiza_web('contacto');
    }
}

?>
