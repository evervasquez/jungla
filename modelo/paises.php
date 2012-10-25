<?php

class paises {

    public $idpais;
    public $descripcion;

    public function selecciona() {
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
