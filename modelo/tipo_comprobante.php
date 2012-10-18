<?php

class tipo_comprobante {

    public $idtipo_comprobante;
    public $descripcion;
    public $serie;
    public $correlativo;

    public function selecciona() {
        $datos = array($this->idtipo_comprobante);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_tipo_comprobante", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
//        $stmt = $r[0];
        return $stmt;
    }

    public function elimina() {
        $datos = array($this->idtipo_comprobante);
        $r = consulta::procedimientoAlmacenado("pa_elimina_tipo_comprobante", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function inserta() {
        $datos = array($this->idtipo_comprobante, $this->descripcion, $this->serie, $this->correlativo);
        $r = consulta::procedimientoAlmacenado("pa_inserta_tipo_comprobante", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idtipo_comprobante, $this->descripcion, $this->serie, $this->correlativo);
        $r = consulta::procedimientoAlmacenado("pa_actualiza_tipo_comprobante", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>