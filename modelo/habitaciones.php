<?php

class habitaciones {

    public $idhabitacion;
    public $descripcion;
    public $nro_habitacion;
    

    public function inserta() {
        $datos = array($this->idhabitacion, $this->descripcion, $this->nro_habitacion);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_habitaciones", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idhabitacion, $this->descripcion, $this->nro_habitacion);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_habitaciones", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function selecciona() {
        $datos = array($this->idhabitacion);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_habitaciones", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        return $stmt;
    }

    public function elimina() {
        $datos = array($this->idhabitacion);
        $r = consulta::procedimientoAlmacenado("pa_elimina_habitaciones", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>
