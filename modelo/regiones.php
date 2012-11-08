<?php

class regiones {

    public $idubigeo;
    public $codigo_region;
    public $codigo_provincia;
    public $codigo_distrito;
    public $idpais;

    public function selecciona() {
        if(is_null($this->codigo_region)){
            $this->codigo_region=0;
        }
        $datos = array($this->codigo_region, $this->idpais);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_regiones", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchall();
    }

}

?>
