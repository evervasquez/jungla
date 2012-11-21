<?php

class compras {

    public $idcompra;
    public $fecha_compra;
    public $estado;
    public $observaciones;
    public $nro_comprobante;
    public $importe;
    public $igv;
    public $idproveedor;
    public $idtipo_transaccion;
    public $confirmacion;
    public $proveedor;

    public function inserta() {
        $datos = array(0, $this->fecha_compra, $this->estado, $this->observaciones, 
            $this->nro_comprobante, $this->importe, $this->igv, $this->idproveedor,  
            $this->idtipo_transaccion, $this->confirmacion);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_compras", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualiza() {
        $datos = array($this->idcompra, $this->fecha_compra, $this->estado, $this->observaciones, 
            $this->nro_comprobante, $this->importe, $this->igv, $this->idproveedor,  
            $this->idtipo_transaccion, $this->confirmacion);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_compras", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function selecciona() {
        if(is_null($this->idcompra)){
            $this->idcompra=0;
        }
        if(is_null($this->nro_comprobante)){
            $this->nro_comprobante='';
        }
        if(is_null($this->proveedor)){
            $this->proveedor='';
        }
        if(is_null($this->confirmacion)){
            $this->confirmacion='';
        }
        $datos = array($this->idcompra,$this->nro_comprobante,$this->proveedor, $this->confirmacion);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_compras", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchall();
    }

    public function elimina() {
        $datos = array($this->idcompra);
        $r = consulta::procedimientoAlmacenado("pa_elimina_compras", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>
