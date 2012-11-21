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
//        echo '<pre>';
//                print_r($datos);exit;
        $r = consulta::procedimientoAlmacenado("pa_selecciona_caja", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        return $stmt->fetchall(PDO::FETCH_ASSOC);
    }
    
    public function inserta() {
        $datos = array(0, $this->estado, $this->fecha, $this->idempleado);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_caja", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idcaja, $this->estado, $this->fecha, $this->idempleado);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_caja", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>
