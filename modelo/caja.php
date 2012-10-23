<?php

class caja {

    public $idcaja;
    public $estado;
    public $fecha;
    public $saldo;
    public $idempleado;
    

    public function inserta() {
        $datos = array($this->idcaja, $this->estado, $this->fecha, $this->saldo, 
            $this->idempleado);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_caja", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idcaja, $this->estado, $this->fecha, $this->saldo, 
            $this->idempleado);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_caja", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function selecciona() {
        $datos = array($this->idcaja);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_caja", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        return $stmt->fetch();
    }

    public function elimina() {
        $datos = array($this->idcaja);
        $r = consulta::procedimientoAlmacenado("pa_elimina_caja", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>
