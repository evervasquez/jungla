<?php

class profesiones {

    public $idprofesion;
    public $descripcion;

    public function selecciona() {
        $datos = array($this->idprofesion);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_profesiones", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
//        $stmt = $r[0];
        return $stmt->fetchall();
    }

}

?>