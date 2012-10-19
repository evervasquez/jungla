<?php

class movimiento_caja_controlador {

    public function grilla() {
        $objmovimiento_caja = new movimiento_caja();
        $objmovimiento_caja->idmovimiento_caja= 0;
        $stmt = $objmovimiento_caja->selecciona();
        return $stmt;
    }

    public function selecciona($id) {
        $objmovimiento_caja = new movimiento_caja();
        $objmovimiento_caja->idmovimiento_caja = $id;
        $stmt = $objmovimiento_caja->selecciona();
        return $stmt;
    }

    public function elimina($id) {
        $objmovimiento_caja = new movimiento_caja();
        $objmovimiento_caja->idmovimiento_caja = $id;
        $error = $objmovimiento_caja->elimina();
        return $error;
    }

    public function inserta($datos) {
        $objmovimiento_caja = new movimiento_caja();
        $objmovimiento_caja->idmovimiento_caja = $datos[0];
        $objmovimiento_caja->idconcepto_movimiento = $datos[1];
        $objmovimiento_caja->idcaja = $datos[2];
        $objmovimiento_caja->monto = $datos[3];
        $error = $objmovimiento_caja->inserta();
        return $error;
    }

    public function actualiza($datos) {
        $objmovimiento_caja = new movimiento_caja();
        $objmovimiento_caja->idmovimiento_caja = $datos[0];
        $objmovimiento_caja->idconcepto_movimiento = $datos[1];
        $objmovimiento_caja->idcaja = $datos[2];
        $objmovimiento_caja->monto = $datos[3];
        $error = $objmovimiento_caja->actualiza();
        return $error;
    }

}

?>
