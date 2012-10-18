<?php

class ubicaciones_controlador {

    public function grilla() {
        $objubicaciones = new ubicaciones();
        $objubicaciones->idubicacion= 0;
        $stmt = $objubicaciones->selecciona();
        return $stmt;
    }

    public function selecciona($id) {
        $objubicaciones = new ubicaciones();
        $objubicaciones->idubicacion = $id;
        $stmt = $objubicaciones->selecciona();
        return $stmt;
    }

    public function elimina($id) {
        $objubicaciones = new ubicaciones();
        $objubicaciones->idubicacion = $id;
        $error = $objubicaciones->elimina();
        return $error;
    }

    public function inserta($datos) {
        $objubicaciones = new ubicaciones();
        $objubicaciones->idubicacion = $datos[0];
        $objubicaciones->idalmacen = $datos[1];
        $objubicaciones->descripcion = $datos[2];
        $error = $objubicaciones->inserta();
        return $error;
    }

    public function actualiza($datos) {
        $objubicaciones = new ubicaciones();
        $objubicaciones->idubicacion = $datos[0];
        $objubicaciones->idalmacen = $datos[1];
        $objubicaciones->descripcion = $datos[2];
        $error = $objubicaciones->actualiza();
        return $error;
    }

}

?>
