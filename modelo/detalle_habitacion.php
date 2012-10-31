<?php

class detalle_habitacion {

    public $idhabitacion;
    public $idtipo_habitacion;
    public $costo;
    public $observaciones;

    public function selecciona() {
        $datos = array($this->idhabitacion, $this->idtipo_habitacion);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_detalle_habitacion", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        return $stmt->fetchall();
    }

    public function elimina() {
        $datos = array($this->idhabitacion, $this->idtipo_habitacion);
        $r = consulta::procedimientoAlmacenado("pa_elimina_detalle_habitacion", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function inserta() {
        $datos = array($this->idhabitacion, $this->idtipo_habitacion, $this->costo, $this->observaciones);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_detalle_habitacion", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idhabitacion, $this->idtipo_habitacion, $this->costo, $this->observaciones);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_detalle_habitacion", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>