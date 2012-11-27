<?php

class detalle_venta {

    public $idventa;
    public $idpaquete;
    public $idproducto;
    public $cantidad;
    public $precio_venta;

    public function inserta() {
        $datos = array($this->idventa, $this->idpaquete, $this->idproducto, $this->cantidad, 0, $this->precio_venta);
//        echo '<pre>';
//                print_r($datos);exit;
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_detalle_venta", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idventa, $this->idpaquete, $this->idproducto, $this->cantidad, 0, $this->precio_venta);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_detalle_venta", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }
    
    public function selecciona() {
        if(is_null($this->idventa)){
            $this->idventa=0;
        }
        if(is_null($this->idproducto)){
            $this->idproducto=0;
        }
        if(is_null($this->idpaquete)){
            $this->idpaquete=0;
        }
        $datos = array($this->idventa, $this->idproducto, $this->idpaquete);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_detalle_venta", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        return $stmt->fetchall(PDO::FETCH_ASSOC);
    }

    public function elimina() {
        $datos = array($this->idventa, $this->idproducto, $this->idpaquete);
        $r = consulta::procedimientoAlmacenado("pa_elimina_detalle_venta", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }


}

?>