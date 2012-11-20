<?php

class detalle_compra {

    public $idcompra;
    public $idproducto;
    public $cantidad;
    public $precio;

    public function selecciona() {
        if(is_null($this->idcompra)){
            $this->idcompra=0;
        }
        if(is_null($this->idproducto)){
            $this->idproducto=0;
        }
        $datos = array($this->idcompra, $this->idproducto);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_detalle_compra", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        return $stmt->fetchall(PDO::FETCH_ASSOC);
    }

    public function elimina() {
        $datos = array($this->idcompra, $this->idproducto);
        $r = consulta::procedimientoAlmacenado("pa_elimina_detalle_compra", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function inserta() {
        $datos = array($this->idcompra, $this->idproducto, $this->cantidad, $this->precio);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_detalle_compra", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idcompra, $this->idproducto, $this->cantidad, $this->precio);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_detalle_compra", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>