<?php

class productos {

    public $idproducto;
    public $descripcion;
    public $precio_unitario;
    public $observaciones;
    public $stock;
    public $estado;
    public $precio_compra;
    public $idubicacion;
    public $idunidad_medida;
    public $idtipo_producto;
    public $idservicio;
    public $idpromocion;
    

    public function inserta() {
        $datos = array($this->idproducto, $this->descripcion, $this->idubicacion, $this->idunidad_medida, $this->idtipo_producto
            , $this->idservicio, $this->idpromocion, $this->precio_unitario, $this->observaciones, $this->stock, $this->estado, $this->precio_compra);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_productos", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idproducto, $this->descripcion, $this->idubicacion, $this->idunidad_medida, $this->idtipo_producto
            , $this->idservicio, $this->idpromocion, $this->precio_unitario, $this->observaciones, $this->stock, $this->estado, $this->precio_compra);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_productos", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function selecciona() {
        $datos = array($this->idproducto);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_productos", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        return $stmt;
    }

    public function elimina() {
        $datos = array($this->idproducto);
        $r = consulta::procedimientoAlmacenado("pa_elimina_productos", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>
