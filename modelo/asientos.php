<?php

class asientos {

    public $idasiento;
    public $fecha;
    public $glosa;
    public $idplantilla_movimiento;
    public $nro_asiento;

    public function selecciona() {
        $datos = array($this->idasiento);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_articulo", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
//        $stmt = $r[0];
        return $stmt->fetch();
    }

    public function elimina() {
        $datos = array($this->idasiento);
        $r = consulta::procedimientoAlmacenado("pa_elimina_articulo", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function inserta() {
        $datos = array($this->idasiento, $this->fecha, $this->glosa, $this->idplantilla_movimiento, $this->nro_asiento);
        $r = consulta::procedimientoAlmacenado("pa_inserta_articulo", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idasiento, $this->fecha, $this->glosa, $this->idplantilla_movimiento, $this->nro_asiento);
        $r = consulta::procedimientoAlmacenado("pa_actualiza_articulo", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>