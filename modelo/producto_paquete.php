<?php

class producto_paquete {
    
    public $idpaquete;
    public $idproducto;
    public $cantidad;

    public function selecciona() {
        if(is_null($this->idpaquete)){
            $this->idpaquete=0;
        }
        if(is_null($this->idproducto)){
            $this->idproducto=0;
        }
        $datos = array($this->idpaquete, $this->idproducto);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_producto_paquete", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        return $stmt->fetchall(PDO::FETCH_ASSOC);
    }

    public function elimina() {
        $datos = array($this->idpaquete, $this->idproducto);
        $r = consulta::procedimientoAlmacenado("pa_elimina_producto_paquete", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function inserta() {
        $datos = array($this->idpaquete, $this->idproducto, $this->cantidad);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_producto_paquete", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idpaquete, $this->idproducto, $this->cantidad);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_producto_paquete", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>
