<?php

class ubigeos {

    public $idubigeo;
    public $codigo_region;
    public $codigo_provincia;
    public $codigo_distrito;
    public $idpais;
    
    public function selecciona_region() {
        $datos = array($this->codigo_region,  $this->idpais);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_regiones", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        return $stmt->fetchall();
    }
    
    public function selecciona_provincias() {
        $datos = array($this->codigo_provincia,  $this->codigo_region);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_provincias", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        return $stmt->fetchall();
    }
    
    public function selecciona() {
        $datos = array($this->idubigeo,  $this->codigo_provincia);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_provincias", $datos);
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
