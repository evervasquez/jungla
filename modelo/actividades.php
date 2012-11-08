<?php

class actividades {

    public $idactividad;
    public $descripcion;

    public function selecciona() {
        if(is_null($this->idactividad)){
            $this->idactividad=0;
        }
        $datos = array($this->idactividad);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_actividades", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        return $stmt->fetchall();
    }

    public function elimina() {
        $datos = array($this->idactividad);
        $r = consulta::procedimientoAlmacenado("pa_elimina_actividades", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function inserta() {
        $datos = array($this->idactividad, $this->descripcion);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_actividades", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idactividad, $this->descripcion);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_actividades", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>
