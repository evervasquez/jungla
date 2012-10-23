<?php

class unidad_medida {

    public $idunidad_medida;
    public $descripcion;
    public $abreviatura;

    public function selecciona() {
        $datos = array($this->idunidad_medida);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_unidad_medida", $datos);
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
        $datos = array($this->idunidad_medida);
        $r = consulta::procedimientoAlmacenado("pa_elimina_unidad_medida", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function inserta() {
        $datos = array($this->idunidad_medida, $this->descripcion, $this->abreviatura);
        $r = consulta::procedimientoAlmacenado("pa_inserta_unidad_medida", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idunidad_medida, $this->descripcion, $this->abreviatura);
        $r = consulta::procedimientoAlmacenado("pa_actualiza_unidad_medida", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>