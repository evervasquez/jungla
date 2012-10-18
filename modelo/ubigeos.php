<?php

class ubigeos {

    public $idubigeo;
    public $idregion;
    public $descripcion;

    public function selecciona() {
        $datos = array($this->idubigeo);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_ubigeos", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        return $stmt;
    }

}

?>
