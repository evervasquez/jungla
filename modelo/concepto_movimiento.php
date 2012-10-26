<?php

class concepto_movimiento {

    public $idconcepto_movimiento;
    public $concepto;

    public function selecciona() {
        $datos = array($this->idconcepto_movimiento);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_concepto_movimiento", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        return $stmt->fetchall();
    }

    public function elimina() {
        $datos = array($this->idconcepto_movimiento);
        $r = consulta::procedimientoAlmacenado("pa_elimina_concepto_movimiento", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function inserta() {
        $datos = array($this->idconcepto_movimiento, $this->concepto);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_concepto_movimiento", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idconcepto_movimiento, $this->concepto);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_concepto_movimiento", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>
