<?php

class comprobantes {

    public $idcomprobante;
    public $serie;
    public $correlativo;
    public $idtipo_comprobante;
    public $tipo;

    public function selecciona() {
        if(is_null($this->idcomprobante)){
            $this->idcomprobante=0;
        }
        if(is_null($this->descripcion)){
            $this->descripcion='';
        }
        if(is_null($this->tipo)){
            $this->tipo='';
        }
        $datos = array($this->idcomprobante, $this->descripcion, $this->tipo);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_comprobante", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        return $stmt->fetchall(PDO::FETCH_ASSOC);
    }

    public function elimina() {
        $datos = array($this->idcomprobante);
        $r = consulta::procedimientoAlmacenado("pa_elimina_comprobante", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function inserta() {
        $datos = array(0, $this->serie, $this->correlativo, $this->idtipo_comprobante);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_comprobante", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idcomprobante, $this->serie, $this->correlativo, $this->idtipo_comprobante);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_comprobante", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>