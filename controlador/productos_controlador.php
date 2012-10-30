<?php

class productos_controlador extends controller {
    
    private $_productos;

    public function __construct() {
        parent::__construct();
        $this->_productos = $this->cargar_modelo('productos');
    }

    public function index() {
        $this->_productos->idproducto = 0;
        $this->_vista->datos = $this->_productos->selecciona();
        $this->_vista->renderizar('index');
    }
    
    public function nuevo(){
        $this->_vista->renderizar('form');
    }
    
}

?>
