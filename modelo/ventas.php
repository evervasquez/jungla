<?php

class ventas {

    public $idventa;
    public $fecha_venta;
    public $estado;
    public $observaciones;
    public $nro_documento;
    public $idtipo_comprobante;
    public $idcliente;
    public $idempleado;
    public $idtipo_transaccion;
    

    public function inserta() {
        $datos = array($this->idventa, $this->fecha_venta, $this->estado, $this->observaciones, 
            $this->nro_documento, $this->idtipo_comprobante, $this->idcliente, $this->idempleado,  
            $this->idtipo_transaccion);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_ventas", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idventa, $this->fecha_venta, $this->estado, $this->observaciones, 
            $this->nro_documento, $this->idtipo_comprobante, $this->idcliente, $this->idempleado,  
            $this->idtipo_transaccion);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_ventas", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function selecciona() {
        if(is_null($this->idventa)){
            $this->idventa=0;
        }
        $datos = array($this->idventa);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_ventas", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        return $stmt->fetchall();
    }

    public function elimina() {
        $datos = array($this->idventa);
        $r = consulta::procedimientoAlmacenado("pa_elimina_ventas", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>
