<?php

class provincias {
    
    public $idubigeo;
    public $codigo_region;
    public $codigo_provincia;
    public $codigo_distrito;
    public $idpais;
    
    public function selecciona() {
        $datos = array($this->codigo_provincia,  $this->codigo_region);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_provincias", $datos);
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
