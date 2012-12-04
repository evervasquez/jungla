<?php

class amortizacion_pago {

    public $idcuota_pago;
    public $idmovimiento_caja;
    public $fecha;
    public $monto;

    public function inserta() {
        $datos = array($this->idcuota_pago, $this->idmovimiento_caja, $this->fecha, $this->monto);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_amortizacion_pago", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idcuota_pago, $this->idmovimiento_caja, $this->fecha, $this->monto);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_amortizacion_pago", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }
    
    public function selecciona() {
        $datos = array($this->idcuota_pago, $this->idmovimiento_caja);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_amortizacion_pago", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
//        $stmt = $r[0];
        return $stmt->fetchall(PDO::FETCH_ASSOC);
    }

    public function elimina() {
        $datos = array($this->idcuota_pago, $this->idmovimiento_caja);
        $r = consulta::procedimientoAlmacenado("pa_elimina_amortizacion_pago", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }


}

?>