<?php

class regiones {

    public $idregion;
    public $idpais;
    public $descripcion;

    public function selecciona() {
        $datos = array($this->idregion);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_regiones", $datos);
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
