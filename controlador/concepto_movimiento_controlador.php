<?php

class concepto_movimiento_controlador {

    public function grilla() {
        $objconcepto_movimiento = new concepto_movimiento();
        $objconcepto_movimiento->idconcepto_movimiento = 0;
        $stmt = $objconcepto_movimiento->selecciona();
        return $stmt;
    }

    public function selecciona($id) {
        $objconcepto_movimiento = new concepto_movimiento();
        $objconcepto_movimiento->idconcepto_movimiento = $id;
        $stmt = $objconcepto_movimiento->selecciona();
        return $stmt;
    }

    public function elimina($id) {
        $objconcepto_movimiento = new concepto_movimiento();
        $objconcepto_movimiento->idconcepto_movimiento = $id;
        $error = $objconcepto_movimiento->elimina();
        return $error;
    }

    public function inserta($datos) {
        $objconcepto_movimiento = new concepto_movimiento();
        $objconcepto_movimiento->idconcepto_movimiento = $datos[0];
        $objconcepto_movimiento->concepto = $datos[1];
        $error = $objconcepto_movimiento->inserta();
        return $error;
    }

    public function actualiza($datos) {
        $objconcepto_movimiento = new concepto_movimiento();
        $objconcepto_movimiento->idconcepto_movimiento = $datos[0];
        $objconcepto_movimiento->concepto = $datos[1];
        $error = $objconcepto_movimiento->actualiza();
        return $error;
    }

}

?>
