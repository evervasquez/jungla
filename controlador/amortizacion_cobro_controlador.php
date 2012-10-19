<?php

class amortizacion_cobro_controlador {
    
    public function grilla() {
        $objAmortizacion_cobro = new amortizacion_cobro();
        $objAmortizacion_cobro->idmovimiento_caja = 0;
        $objAmortizacion_cobro->idcuota_cobro = 0;
        $stmt = $objAmortizacion_cobro->selecciona();
        return $stmt;
    }

    public function selecciona($ids) {
        $objAmortizacion_cobro = new amortizacion_cobro();
        $objAmortizacion_cobro->idmovimiento_caja = $ids[0];
        $objAmortizacion_cobro->idcuota_cobro = $ids[1];
        $stmt = $objAmortizacion_cobro->selecciona();
        return $stmt;
    }

    public function elimina($ids) {
        $objAmortizacion_cobro = new amortizacion_cobro();
        $objAmortizacion_cobro->idmovimiento_caja = $ids[0];
        $objAmortizacion_cobro->idcuota_cobro = $ids[1];
        $error = $objAmortizacion_cobro->elimina();
        return $error;
    }

    public function inserta($datos) {
        $objAmortizacion_cobro = new amortizacion_cobro();
        $objAmortizacion_cobro->idmovimiento_caja = $datos[0];
        $objAmortizacion_cobro->idcuota_cobro = $datos[1];
        $objAmortizacion_cobro->fecha = $datos[2];
        $objAmortizacion_cobro->monto = $datos[3];
        $error = $objAmortizacion_cobro->inserta();
        return $error;
    }

    public function actualiza($datos) {
        $objAmortizacion_cobro = new amortizacion_cobro();
        $objAmortizacion_cobro->idmovimiento_caja = $datos[0];
        $objAmortizacion_cobro->idcuota_cobro = $datos[1];
        $objAmortizacion_cobro->fecha = $datos[2];
        $objAmortizacion_cobro->monto = $datos[3];
        $error = $objAmortizacion_cobro->actualiza();
        return $error;
    }
}
?>
