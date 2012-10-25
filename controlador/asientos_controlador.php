<?php

class asientos_controlador extends controller{
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $this->_vista->renderizar('index');
    }
    
    public function nuevo(){
        $this->_vista->renderizar(form);
    }

    public function grilla() {
        $objAsientos = new asientos();
        $objAsientos->idasiento = 0;
        $stmt = $objAsientos->selecciona();
        return $stmt;
    }

    public function selecciona($id) {
        $objAsientos = new asientos();
        $objAsientos->idasiento = $id;
        $stmt = $objAsientos->selecciona();
        return $stmt;
    }

    public function elimina($id) {
        $objAsientos = new asientos();
        $objAsientos->idasiento = $id;
        $error = $objAsientos->elimina();
        return $error;
    }

    public function inserta($datos) {
        $objAsientos = new asientos();
        $objAsientos->idasiento = $datos[0];
        $objAsientos->fecha = $datos[1];
        $objAsientos->glosa = $datos[2];
        $objAsientos->idplantilla_movimiento = $datos[3];
        $objAsientos->nro_asiento = $datos[4];
        $error = $objAsientos->inserta();
        return $error;
    }

    public function actualiza($datos) {
        $objAsientos = new asientos();
        $objAsientos->idasiento = $datos[0];
        $objAsientos->fecha = $datos[1];
        $objAsientos->glosa = $datos[2];
        $objAsientos->idplantilla_movimiento = $datos[3];
        $objAsientos->nro_asiento = $datos[4];
        $error = $objAsientos->actualiza();
        return $error;
    }
}
?>
