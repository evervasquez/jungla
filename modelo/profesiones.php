<?php

class profesiones {

    public $idprofesion;
    public $descripcion;

    public function selecciona() {
        $datos = array($this->idprofesion);
        $r = consulta::procedimientoAlmacenado("pa_seleccionaProfesiones", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
//        $stmt = $r[0];
        return $stmt;
    }

    public function elimina() {
        $datos = array($this->idprofesion);
        $r = consulta::procedimientoAlmacenado("pa_eliminaProfesiones", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function inserta() {
        $datos = array($this->idprofesion, $this->descripcion);
        $r = consulta::procedimientoAlmacenado("pa_insertaProfesiones", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idprofesion, $this->descripcion);
        $r = consulta::procedimientoAlmacenado("pa_actualizaProfesiones", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>