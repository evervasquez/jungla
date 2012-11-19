<?php

class caja {

    public $idcaja;
    public $estado;
    public $fecha;
    public $saldo;
    public $idempleado;
    
    public function selecciona() {
        if(is_null($this->idcaja)){
            $this->idcaja=0;
        }
        $datos = array($this->idcaja);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_caja", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        return $stmt->fetchall();
    }
    
    public function apertura(){
        $datos = array($this->fecha, $this->idempleado);
        $r = consulta::procedimientoAlmacenado("pa_apertura_caja", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }
    
    public function reapertura(){
        $datos = array($this->fecha, $this->idempleado);
        $r = consulta::procedimientoAlmacenado("pa_reapertura_caja", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }
    
    public function cierra(){
        $datos = array($this->idcaja);
        $r = consulta::procedimientoAlmacenado("pa_cierra_caja", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }
    
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

}

?>
