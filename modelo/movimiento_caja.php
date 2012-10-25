<?php

class movimiento_caja {

    public $idmovimiento_caja;
    public $idconcepto_movimiento;
    public $idcaja;
    public $monto;
    

    public function inserta() {
        $datos = array($this->idmovimiento_caja, $this->idconcepto_caja, $this->idcaja, $this->monto);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_movimiento_caja", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idmovimiento_caja, $this->idconcepto_caja, $this->idcaja, $this->monto);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_movimiento_caja", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function selecciona() {
        $datos = array($this->idmovimiento_caja);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_movimiento_caja", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        return $stmt->fetchall();
    }

    public function elimina() {
        $datos = array($this->idmovimiento_caja);
        $r = consulta::procedimientoAlmacenado("pa_elimina_movimiento_caja", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>
