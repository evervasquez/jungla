<?php

class ventas {

    public $idventa;
    public $estado;
    public $observaciones;
    public $idtipo_comprobante;
    public $idcliente;
    public $idempleado;
    public $idtipo_transaccion;
    public $importe;
    public $igv;
    public $fecha_venta;
    public $nro_documento;
    public $estado_pago;
    public $descuento;
    

    public function inserta() {
        $datos = array(0, $this->observaciones, $this->idtipo_comprobante, $this->idcliente, 
            $this->idempleado, $this->idtipo_transaccion,  $this->importe, $this->igv, $this->descuento);
//        echo '<pre>';
//                print_r($datos);exit;
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_ventas", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualiza() {
        if(is_null($this->estado_pago)){
            $datos = array($this->idventa, $this->observaciones, $this->idtipo_comprobante, $this->idcliente, 
            $this->idempleado, $this->idtipo_transaccion,  $this->importe, $this->igv, $this->descuento);
            $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_ventas", $datos);
        }  else {
            $datos = array($this->idventa, $this->estado_pago);
            $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_estado_pago_ventas", $datos);
        }
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
        return $stmt->fetchall(PDO::FETCH_ASSOC);
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
