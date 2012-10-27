<?php

class ubigeos {

    public $idubigeo;
    public $codigo_region;
    public $codigo_provincia;
    public $codigo_distrito;
    public $descripcion;
    public $idpais;

    public function selecciona() {
        $datos = array($this->idubigeo);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_ubigeos", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        return $stmt->fetchall();
    }

}

?>
