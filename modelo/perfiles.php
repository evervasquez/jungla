<?php

class perfiles {

    public $idperfil;
    public $descripcion;

    public function selecciona() {
        $datos = array($this->idperfil);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_perfiles", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        return $stmt->fetch();
    }

    public function elimina() {
        $datos = array($this->idperfil);
        $r = consulta::procedimientoAlmacenado("pa_elimina_perfiles", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function inserta() {
        $datos = array($this->idperfil, $this->descripcion);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_perfiles", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idperfil, $this->descripcion);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_perfiles", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>
