<?php

class modulos_controlador extends controller{
    private $_modulos;
<<<<<<< HEAD
    public function __construct() {
        parent::__construct();
        $this->_modulos = $this->carga_modelo('modulos');
=======
    
    public function __construct() {
        parent::__construct();
        $this->_modulos->carga_modelo('modulos');
>>>>>>> 5429b87ae9043b330d223c6df5020f0f8c0a51b6
    }
    
    public function index() {
        $this->_modulos->idmodulo = 0;
<<<<<<< HEAD
        $datos =$this->_modulos->selecciona();
        $this->_vista->datos = $datos;
=======
        $menu=$this->_modulos->selecciona();
>>>>>>> 5429b87ae9043b330d223c6df5020f0f8c0a51b6
        $this->_vista->renderizar('index');
    }
    
    public function nuevo() {
        $this->_vista->renderizar('form');
    }
    public function grilla() {
        $objmodulos = new modulos();
        $objmodulos->idmodulo= 0;
        $stmt = $objmodulos->selecciona();
        return $stmt;
    }

    public function selecciona($id) {
        $objmodulos = new modulos();
        $objmodulos->idmodulo = $id;
        $stmt = $objmodulos->selecciona();
        return $stmt;
    }

    public function elimina($id) {
        $objmodulos = new modulos();
        $objmodulos->idmodulo = $id;
        $error = $objmodulos->elimina();
        return $error;
    }

    public function inserta($datos) {
        $objmodulos = new modulos();
        $objmodulos->idmodulo = $datos[0];
        $objmodulos->descripcion= $datos[1];
        $objmodulos->url = $datos[2];
        $objmodulos->estado = $datos[3];
        $objmodulos->idmodulo_padre = $datos[4];
        $error = $objmodulos->inserta();
        return $error;
    }

    public function actualiza($datos) {
        $objmodulos = new modulos();
        $objmodulos->idmodulo = $datos[0];
        $objmodulos->descripcion= $datos[1];
        $objmodulos->url = $datos[2];
        $objmodulos->estado = $datos[3];
        $objmodulos->idmodulo_padre = $datos[4];
        $error = $objmodulos->actualiza();
        return $error;
    }

}

?>
