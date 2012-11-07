<?php

class concepto_movimiento {

    public $idconcepto_movimiento;
    public $descripcion;

    public function selecciona() {
        if(is_null($this->descripcion)){
            $this->descripcion='';
        }
        $datos = array($this->idconcepto_movimiento, $this->descripcion);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_concepto_movimiento", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
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
        $datos = array($this->idconcepto_movimiento, $this->descripcion);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_concepto_movimiento", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idconcepto_movimiento, $this->descripcion);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_concepto_movimiento", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>
