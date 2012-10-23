<?php

class servicios {

    public $idservicio;
    public $descripcion;

    public function selecciona() {
        $datos = array($this->idservicio);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_servicios", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        return $stmt->fetch();
    }

    public function elimina() {
        $datos = array($this->idservicio);
        $r = consulta::procedimientoAlmacenado("pa_elimina_servicios", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function inserta() {
        $datos = array($this->idservicio, $this->descripcion);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_servicios", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idservicio, $this->descripcion);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_servicios", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>
