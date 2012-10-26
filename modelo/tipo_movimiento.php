<?php

class tipo_movimiento {

    public $idtipo_movimiento;
    public $descripcion;

    public function selecciona() {
        $datos = array($this->idtipo_movimiento);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_tipo_movimiento", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        return $stmt->fetchall();
    }

    public function elimina() {
        $datos = array($this->idtipo_movimiento);
        $r = consulta::procedimientoAlmacenado("pa_elimina_tipo_movimiento", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function inserta() {
        $datos = array($this->idtipo_movimiento, $this->descripcion);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_tipo_movimiento", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idtipo_movimiento, $this->descripcion);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_tipo_movimiento", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>
