<?php

class cuota_cobro {

    public $idcuota_cobro;
    public $idventa;
    public $fecha_cobro;
    public $nro_cobro;
    public $monto_cuota;
    public $interes;
    public $fecha_vencimiento;
    public $monto_cobrado;

    public function selecciona() {
        $datos = array($this->idcuota_cobro);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_cuota_cobro", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
//        $stmt = $r[0];
        return $stmt->fetchall();
    }

    public function elimina() {
        $datos = array($this->idcuota_cobro);
        $r = consulta::procedimientoAlmacenado("pa_elimina_cuota_cobro", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function inserta() {
        $datos = array(
            $this->idcuota_cobro,
            $this->idventa,
            $this->fecha_cobro,
            $this->nro_cobro,
            $this->monto_cuota,
            $this->interes,
            $this->fecha_vencimiento,
            $this->monto_cobrado);
        $r = consulta::procedimientoAlmacenado("pa_inserta_cuota_cobro", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array(
            $this->idcuota_cobro,
            $this->idventa,
            $this->fecha_cobro,
            $this->nro_cobro,
            $this->monto_cuota,
            $this->interes,
            $this->fecha_vencimiento,
            $this->monto_cobrado);
        $r = consulta::procedimientoAlmacenado("pa_actualiza_cuota_cobro", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>