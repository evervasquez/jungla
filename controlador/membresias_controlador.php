<?php

class membresias_controlador extends controller{
    public function __construct() {
        parent::__construct();
    }

        public function index(){
        $this->_vista->renderizar('index');
    }
    
        public function nuevo(){
        $this->_vista->renderizar('form');   
        }

        public function grilla() {
        $objmembresias = new membresias();
        $objmembresias->idmembresia = 0;
        $stmt = $objmembresias->selecciona();
        return $stmt;
    }

    public function selecciona($id) {
        $objmembresias = new membresias();
        $objmembresias->idmembresia = $id;
        $stmt = $objmembresias->selecciona();
        return $stmt;
    }

    public function elimina($id) {
        $objmembresias = new membresias();
        $objmembresias->idmembresia = $id;
        $error = $objmembresias->elimina();
        return $error;
    }

    public function inserta($datos) {
        $objmembresias = new membresias();
        $objmembresias->idmembresia = $datos[0];
        $objmembresias->descripcion = $datos[1];
        $error = $objmembresias->inserta();
        return $error;
    }

    public function actualiza($datos) {
        $objmembresias = new membresias();
        $objmembresias->idmembresia = $datos[0];
        $objmembresias->descripcion = $datos[1];
        $error = $objmembresias->actualiza();
        return $error;
    }

}

?>
