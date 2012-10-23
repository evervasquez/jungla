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
    

    public function inserta() {
        $datos = array($this->idcompra, $this->fecha_compra, $this->estado, $this->observaciones, 
            $this->nro_comprobante, $this->importe, $this->igv, $this->idproveedor,  
            $this->idtipo_transaccion);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_compras", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idcompra, $this->fecha_compra, $this->estado, $this->observaciones, 
            $this->nro_comprobante, $this->importe, $this->igv, $this->idproveedor,  
            $this->idtipo_transaccion);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_compras", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function selecciona() {
        $datos = array($this->idcompra);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_compras", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        return $stmt->fetch();
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
