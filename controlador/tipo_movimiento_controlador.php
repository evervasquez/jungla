<?php

class tipo_movimiento_controlador {

    public function grilla() {
        $objtipo_movimiento = new tipo_movimiento();
        $objtipo_movimiento->idtipo_movimiento= 0;
        $stmt = $objtipo_movimiento->selecciona();
        return $stmt;
    }

    public function selecciona($id) {
        $objtipo_movimiento = new tipo_movimiento();
        $objtipo_movimiento->idtipo_movimiento = $id;
        $stmt = $objtipo_movimiento->selecciona();
        return $stmt;
    }

    public function elimina($id) {
        $objtipo_movimiento = new tipo_movimiento();
        $objtipo_movimiento->idtipo_movimiento = $id;
        $error = $objtipo_movimiento->elimina();
        return $error;
    }

    public function inserta($datos) {
        $objtipo_movimiento = new tipo_movimiento();
        $objtipo_movimiento->idtipo_movimiento = $datos[0];
        $objtipo_movimiento->descripcion = $datos[1];
        $error = $objtipo_movimiento->inserta();
        return $error;
    }

    public function actualiza($datos) {
        $objtipo_movimiento = new tipo_movimiento();
        $objtipo_movimiento->idtipo_movimiento = $datos[0];
        $objtipo_movimiento->descripcion = $datos[1];
        $error = $objtipo_movimiento->actualiza();
        return $error;
    }

}

?>
