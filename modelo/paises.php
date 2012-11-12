<?php

class paises {

    public $idpais;

    public function selecciona() {
        if(is_null($this->idpais)){
            $this->idpais=0;
        }
        $datos = array($this->idpais);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_paises", $datos);
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
