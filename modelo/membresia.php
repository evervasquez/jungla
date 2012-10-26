<?php

class membresia {

    public $idmembresia;
    public $descripcion;

    public function selecciona() {
        $datos = array($this->idmembresia);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_membresia", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        return $stmt->fetchall();
    }

    public function elimina() {
        $datos = array($this->idmembresia);
        $r = consulta::procedimientoAlmacenado("pa_elimina_membresia", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function inserta() {
        $datos = array($this->idmembresia, $this->descripcion);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_membresia", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idmembresia, $this->descripcion);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_membresia", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>
