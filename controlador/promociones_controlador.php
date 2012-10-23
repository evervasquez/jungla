<?php

class promociones_controlador extends controller{
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $this->_vista->renderizar('index');
    }
    
    public function nuevo(){
        $this->_vista->renderizar('form');
    }
    public function grilla() {
        $objPromociones = new promociones();
        $objPromociones->idpromociones = 0;
        $stmt = $objPromociones->selecciona();
        return $stmt;
    }

    public function selecciona($id) {
        $objPromociones = new promociones();
        $objPromociones->idpromociones = $id;
        $stmt = $objPromociones->selecciona();
        return $stmt;
    }

    public function elimina($id) {
        $objPromociones = new promociones();
        $objPromociones->idpromociones = $id;
        $error = $objPromociones->elimina();
        return $error;
    }

    public function inserta($datos) {
        $objPromociones = new promociones();
        $objPromociones->idpromociones = $datos[0];
        $objPromociones->descripcion = $datos[1];
        $objPromociones->descuento = $datos[2];
        $objPromociones->fecha_inicio = $datos[3];
        $objPromociones->fecha_final = $datos[4];
        $error = $objPromociones->inserta();
        return $error;
    }

    public function actualiza($datos) {
        $objPromociones = new promociones();
        $objPromociones->idpromociones = $datos[0];
        $objPromociones->descuento = $datos[2];
        $objPromociones->fecha_inicio = $datos[3];
        $objPromociones->fecha_final = $datos[4];
        $error = $objPromociones->actualiza();
        return $error;
    }
}
?>
