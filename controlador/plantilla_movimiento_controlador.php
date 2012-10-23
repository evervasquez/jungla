<?php

class plantilla_movimiento_controlador extends controller {
    
    public function __construct() {
        parent::__construct();
    }

    public function grilla() {
        $objplantilla_movimiento = new plantilla_movimiento();
        $objplantilla_movimiento->idplantilla_movimiento= 0;
        $stmt = $objplantilla_movimiento->selecciona();
        return $stmt;
    }

    public function selecciona($id) {
        $objplantilla_movimiento = new plantilla_movimiento();
        $objplantilla_movimiento->idplantilla_movimiento = $id;
        $stmt = $objplantilla_movimiento->selecciona();
        return $stmt;
    }

    public function elimina($id) {
        $objplantilla_movimiento = new plantilla_movimiento();
        $objplantilla_movimiento->idplantilla_movimiento = $id;
        $error = $objplantilla_movimiento->elimina();
        return $error;
    }

    public function inserta($datos) {
        $objplantilla_movimiento = new plantilla_movimiento();
        $objplantilla_movimiento->idplantilla_movimiento = $datos[0];
        $objplantilla_movimiento->descripcion = $datos[1];
        $objplantilla_movimiento->idasiento = $datos[2];
        $error = $objplantilla_movimiento->inserta();
        return $error;
    }

    public function actualiza($datos) {
        $objplantilla_movimiento = new plantilla_movimiento();
        $objplantilla_movimiento->idplantilla_movimiento = $datos[0];
        $objplantilla_movimiento->descripcion = $datos[1];
        $objplantilla_movimiento->idasiento = $datos[2];
        $error = $objplantilla_movimiento->actualiza();
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
