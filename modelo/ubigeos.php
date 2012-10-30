<?php

class ubigeos {

    public $idubigeo;
    public $codigo_region;
    public $codigo_provincia;
    public $codigo_distrito;
    public $idpais;
        
    public function selecciona() {
        $datos = array($this->idubigeo,  $this->codigo_provincia);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_ubigeos", $datos);
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
