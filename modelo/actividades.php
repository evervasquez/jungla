<?php

class actividades {

    public $idactividad;
    public $descripcion;

    public function selecciona() {
        if(is_null($this->idactividad)){
            $this->idactividad=0;
        }
        $datos = array($this->idactividad);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_actividades", $datos);
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
