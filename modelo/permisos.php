<?php

class permisos {

    public $idperfil;
    public $idmodulo;
    public $estado;

    public function selecciona() {
        $datos = array($this->idperfil, $this->idmodulo);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_permisos", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchall();
    }

    public function elimina() {
        $datos = array($this->idperfil, $this->idmodulo);
        $r = consulta::procedimientoAlmacenado("pa_elimina_permisos", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function inserta() {
        $datos = array($this->idperfil, $this->idmodulo, $this->estado);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_permisos", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idperfil, $this->idmodulo, $this->estado);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_permisos", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }
}

?>