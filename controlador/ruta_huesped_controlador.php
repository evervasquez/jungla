<?php

class ruta_huesped_controlador extends controller {
    
    public function __construct() {
        parent::__construct();
    }

    public function grilla() {
        $objrutahuesped = new ruta_huesped();
        $objrutahuesped->idruta_huesped= 0;
        $stmt = $objrutahuesped->selecciona();
        return $stmt;
    }

    public function selecciona($id) {
        $objrutahuesped = new ruta_huesped();
        $objrutahuesped->idruta_huesped = $id;
        $stmt = $objrutahuesped->selecciona();
        return $stmt;
    }

    public function elimina($id) {
        $objrutahuesped = new ruta_huesped();
        $objrutahuesped->idruta_huesped = $id;
        $error = $objrutahuesped->elimina();
        return $error;
    }

    public function inserta($datos) {
        $objrutahuesped = new ruta_huesped();
        $objrutahuesped->idruta_huesped = $datos[0];
        $objrutahuesped->observaciones = $datos[1];
        $objrutahuesped->idtipo_ruta = $datos[2];
        $objrutahuesped->idubigeo = $datos[3];
        $objrutahuesped->idcliente = $datos[4];
        $error = $objrutahuesped->inserta();
        return $error;
    }

    public function actualiza($datos) {
        $objrutahuesped = new ruta_huesped();
        $objrutahuesped->idruta_huesped = $datos[0];
        $objrutahuesped->observaciones = $datos[1];
        $objrutahuesped->idtipo_ruta = $datos[2];
        $objrutahuesped->idubigeo = $datos[3];
        $objrutahuesped->idcliente = $datos[4];
        $error = $objrutahuesped->actualiza();
        return $error;
    }
    
    public function index() {
        $this->_vista->renderizar('index');
    }
    
    public function nuevo(){
        $this->_vista->renderizar('form');
    }
}

?>
