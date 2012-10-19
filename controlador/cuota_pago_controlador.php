<?php

class cuota_pago_controlador {
    
    public function grilla() {
        $objCuota_pago = new cuota_pago();
        $objCuota_pago->idcuota_pago = 0;
        $stmt = $objCuota_pago->selecciona();
        return $stmt;
    }

    public function selecciona($id) {
        $objCuota_pago = new cuota_pago();
        $objCuota_pago->idcuota_pago = $id;
        $stmt = $objCuota_pago->selecciona();
        return $stmt;
    }

    public function elimina($id) {
        $objCuota_pago = new cuota_pago();
        $objCuota_pago->idcuota_pago = $id;
        $error = $objCuota_pago->elimina();
        return $error;
    }

    public function inserta($datos) {
        $objCuota_pago = new cuota_pago();
        $objCuota_pago->idcuota_pago = $datos[0];
        $objCuota_pago->idcompra = $datos[1];
        $objCuota_pago->fecha_pago = $datos[2];
        $objCuota_pago->fecha_vencimiento = $datos[3];
        $objCuota_pago->interes = $datos[4];
        $objCuota_pago->monto_cuota = $datos[5];
        $objCuota_pago->monto_pagado = $datos[6];
        $objCuota_pago->nro_cuota = $datos[7];
        $error = $objCuota_pago->inserta();
        return $error;
    }

    public function actualiza($datos) {
        $objCuota_pago = new cuota_pago();
        $objCuota_pago->idcuota_pago = $datos[0];
        $objCuota_pago->idcompra = $datos[1];
        $objCuota_pago->fecha_pago = $datos[2];
        $objCuota_pago->fecha_vencimiento = $datos[3];
        $objCuota_pago->interes = $datos[4];
        $objCuota_pago->monto_cuota = $datos[5];
        $objCuota_pago->monto_pagado = $datos[6];
        $objCuota_pago->nro_cuota = $datos[7];
        $error = $objCuota_pago->actualiza();
        return $error;
    }
}
?>
