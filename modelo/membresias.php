<?php

class membresias {

    public $idmembresia;
    public $descripcion;

    public function selecciona() {
        $datos = array($this->idmembresia);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_membresias", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        return $stmt;
    }

    public function elimina() {
        $datos = array($this->idmembresia);
        $r = consulta::procedimientoAlmacenado("pa_elimina_membresias", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function inserta() {
        $datos = array($this->idmembresia, $this->descripcion);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_membresias", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idmembresia, $this->descripcion);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_membresias", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>
