<?php

class amortizacion_pago_controlador {
    
    public function grilla() {
        $objAmortizacion_pago = new amortizacion_pago();
        $objAmortizacion_pago->idcuota_pago = 0;
        $objAmortizacion_pago->idmovimiento_caja = 0;
        $stmt = $objAmortizacion_pago->selecciona();
        return $stmt;
    }

    public function selecciona($ids) {
        $objAmortizacion_pago = new amortizacion_pago();
        $objAmortizacion_pago->idcuota_pago = $ids[0];
        $objAmortizacion_pago->idmovimiento_caja = $ids[1];
        $stmt = $objAmortizacion_pago->selecciona();
        return $stmt;
    }

    public function elimina($ids) {
        $objAmortizacion_pago = new amortizacion_pago();
        $objAmortizacion_pago->idcuota_pago = $ids[0];
        $objAmortizacion_pago->idmovimiento_caja = $ids[1];
        $error = $objAmortizacion_pago->elimina();
        return $error;
    }

    public function inserta($datos) {
        $objAmortizacion_pago = new amortizacion_pago();
        $objAmortizacion_pago->idcuota_pago = $datos[0];
        $objAmortizacion_pago->idmovimiento_caja = $datos[1];
        $objAmortizacion_pago->fecha = $datos[2];
        $objAmortizacion_pago->monto = $datos[3];
        $error = $objAmortizacion_pago->inserta();
        return $error;
    }

    public function actualiza($datos) {
        $objAmortizacion_pago = new amortizacion_pago();
        $objAmortizacion_pago->idcuota_pago = $datos[0];
        $objAmortizacion_pago->idmovimiento_caja = $datos[1];
        $objAmortizacion_pago->fecha = $datos[2];
        $objAmortizacion_pago->monto = $datos[3];
        $error = $objAmortizacion_pago->actualiza();
        return $error;
    }
}
?>
