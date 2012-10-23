<?php

class tipo_ruta {

    public $idtipo_ruta;
    public $descripcion;

    public function selecciona() {
        $datos = array($this->idtipo_ruta);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_tipo_ruta", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        return $stmt->fetch();
    }

}

?>
