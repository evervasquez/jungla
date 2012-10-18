<?php

class almacenes_controlador {

    public function grilla() {
        $objalmacenes = new almacenes();
        $objalmacenes->idalmacen= 0;
        $stmt = $objalmacenes->selecciona();
        return $stmt;
    }

    public function selecciona($id) {
        $objalmacenes = new almacenes();
        $objalmacenes->idalmacen = $id;
        $stmt = $objalmacenes->selecciona();
        return $stmt;
    }

    public function elimina($id) {
        $objalmacenes = new almacenes();
        $objalmacenes->idalmacen = $id;
        $error = $objalmacenes->elimina();
        return $error;
    }

    public function inserta($datos) {
        $objalmacenes = new almacenes();
        $objalmacenes->idalmacen = $datos[0];
        $objalmacenes->descripcion = $datos[1];
        $error = $objalmacenes->inserta();
        return $error;
    }

    public function actualiza($datos) {
        $objalmacenes = new almacenes();
        $objalmacenes->idalmacen = $datos[0];
        $objalmacenes->descripcion = $datos[1];
        $error = $objalmacenes->actualiza();
        return $error;
    }

}

?>
