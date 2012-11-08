<?php

class ubigeos {

    public $idubigeo;
    public $codigo_region;
    public $codigo_provincia;
    public $codigo_distrito;
    public $idpais;
        
    public function selecciona() {
        if(is_null($this->idubigeo)){
            $this->idubigeo=0;
        }
        if(is_null($this->idpais)){
            $this->idpais=0;
        }
        $datos = array($this->idubigeo,  $this->codigo_provincia, $this->idpais);
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
