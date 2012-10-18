<?php

class tipo_transaccion_controlador {
    
    public function grilla() {
        $objTipo_transaccion = new tipo_transaccion();
        $objTipo_transaccion->idtipo_transaccion = 0;
        $stmt = $objTipo_transaccion->selecciona();
        return $stmt;
    }

    public function selecciona($id) {
        $objTipo_transaccion = new tipo_transaccion();
        $objTipo_transaccion->idtipo_transaccion = $id;
        $stmt = $objTipo_transaccion->selecciona();
        return $stmt;
    }

    public function elimina($id) {
        $objTipo_transaccion = new tipo_transaccion();
        $objTipo_transaccion->idtipo_transaccion = $id;
        $error = $objTipo_transaccion->elimina();
        return $error;
    }

    public function inserta($datos) {
        $objTipo_transaccion = new tipo_transaccion();
        $objTipo_transaccion->idtipo_transaccion = $datos[0];
        $objTipo_transaccion->descripcion = $datos[1];
        $error = $objTipo_transaccion->inserta();
        return $error;
    }

    public function actualiza($datos) {
        $objTipo_transaccion = new tipo_transaccion();
        $objTipo_transaccion->idtipo_transaccion = $datos[0];
        $objTipo_transaccion->descripcion = $datos[1];
        $error = $objTipo_transaccion->actualiza();
        return $error;
    }
}

?>