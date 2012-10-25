<?php

class producto_paquete {
    
    public $idpaquete;
    public $idproducto;
    public $cantidad;

    public function selecciona() {
        $datos = array($this->idalmacen, $this->idproducto);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_producto_paquete", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        return $stmt->fetchall();
    }

    public function elimina() {
        $datos = array($this->idalmacen, $this->idproducto);
        $r = consulta::procedimientoAlmacenado("pa_elimina_producto_paquete", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function inserta() {
        $datos = array($this->idalmacen, $this->idproducto, $this->cantidad);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_producto_paquete", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idalmacen, $this->idproducto, $this->cantidad);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_producto_paquete", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>
