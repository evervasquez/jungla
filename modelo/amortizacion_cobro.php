<?php

class amortizacion_cobro {

    public $idmovimiento_caja;
    public $idcuota_cobro;
    public $fecha;
    public $monto;

    public function selecciona() {
        $datos = array($this->idmovimiento_caja, $this->idcuota_cobro);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_amortizacion_cobro", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
//        $stmt = $r[0];
        return $stmt;
    }

    public function elimina() {
        $datos = array($this->idmovimiento_caja, $this->idcuota_cobro);
        $r = consulta::procedimientoAlmacenado("pa_elimina_amortizacion_cobro", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function inserta() {
        $datos = array($this->idmovimiento_caja, $this->idcuota_cobro, $this->fecha, $this->monto);
        $r = consulta::procedimientoAlmacenado("pa_inserta_amortizacion_cobro", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idmovimiento_caja, $this->idcuota_cobro, $this->fecha, $this->monto);
        $r = consulta::procedimientoAlmacenado("pa_actualiza_amortizacion_cobro", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>