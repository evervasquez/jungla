<?php

class plantilla_movimiento {

    public $idplantilla_movimiento;
    public $descripcion;
    public $idasiento;

    public function selecciona() {
        $datos = array($this->idplantilla_movimiento);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_plantilla_movimiento", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        return $stmt->fetch();
    }

    public function elimina() {
        $datos = array($this->idplantilla_movimiento);
        $r = consulta::procedimientoAlmacenado("pa_elimina_plantilla_movimiento", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function inserta() {
        $datos = array($this->idplantilla_movimiento, $this->descripcion, $this->idasiento);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_plantilla_movimiento", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idplantilla_movimiento, $this->descripcion, $this->idasiento);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_plantilla_movimiento", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>
