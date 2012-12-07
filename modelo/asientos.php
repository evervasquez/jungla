<?php

class asientos extends Main{

    public $idcompra;
    public $idasiento;
    public $fecha;
    public $glosa;
    public $idplantilla_movimiento;
    public $nro_asiento;

    public function selecciona() {
         if(is_null($this->idasiento)){
            $this->idasiento=0;
        }
        $datos = array($this->idasiento);
        $r = $this->get_consulta("pa_selecciona_asientos", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
//        $stmt = $r[0];
        return $stmt->fetchall();
    }

    public function elimina() {
        $datos = array($this->idasiento);
        $r = $this->get_consulta("pa_elimina_articulo", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function inserta($idcompra,$idventa) {
        $datos = array($idcompra,$idventa);
        if($idventa == 0){
            $r = $this->get_consulta("pa_inserta_asientos_compra", $datos);
        }else{
            $r = $this->get_consulta("pa_inserta_asientos_venta", $datos);
        }
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idasiento, $this->fecha, $this->glosa, $this->idplantilla_movimiento, $this->nro_asiento);
        $r = $this->get_consulta("pa_actualiza_articulo", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>