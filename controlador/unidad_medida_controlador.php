<?php

class unidad_medida_controlador extends controller{
    
    public function __construct() {
        parent::__construct();
    }

    public function grilla() {
        $objUnidad_medida = new unidad_medida();
        $objUnidad_medida->idunidad_medida = 0;
        $stmt = $objUnidad_medida->selecciona();
        return $stmt;
    }

    public function selecciona($id) {
        $objUnidad_medida = new unidad_medida();
        $objUnidad_medida->idunidad_medida = $id;
        $stmt = $objUnidad_medida->selecciona();
        return $stmt;
    }

    public function elimina($id) {
        $objUnidad_medida = new unidad_medida();
        $objUnidad_medida->idunidad_medida = $id;
        $error = $objUnidad_medida->elimina();
        return $error;
    }

    public function inserta($datos) {
        $objUnidad_medida = new unidad_medida();
        $objUnidad_medida->idunidad_medida = $datos[0];
        $objUnidad_medida->descripcion = $datos[1];
        $objUnidad_medida->abreviatura = $datos[2];
        $error = $objUnidad_medida->inserta();
        return $error;
    }

    public function actualiza($datos) {
        $objUnidad_medida = new unidad_medida();
        $objUnidad_medida->idunidad_medida = $datos[0];
        $objUnidad_medida->descripcion = $datos[1];
        $objUnidad_medida->abreviatura = $datos[2];
        $error = $objUnidad_medida->actualiza();
        return $error;
    }

    public function index() {
      $this->_vista->renderizar('index');
    }
}
?>
