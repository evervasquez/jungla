<?php

class productos {

    public $idproducto;
    public $descripcion;
    public $precio_unitario;
    public $observaciones;
    public $idservicio;
    public $idtipo_producto;
    public $idunidad_medida;
    public $idubicacion;
    public $idpromocion;
    public $stock;
    public $estado;
    public $precio_compra;
    

    public function inserta() {
        $datos = array($this->idproducto, $this->descripcion, $this->precio_unitario, $this->observaciones, 
            $this->idservicio, $this->idtipo_producto, $this->idunidad_medida, $this->idubicacion,  
            $this->idpromocion, $this->stock, $this->estado, $this->precio_compra);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_productos", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idproducto, $this->descripcion, $this->precio_unitario, $this->observaciones, 
            $this->idservicio, $this->idtipo_producto, $this->idunidad_medida, $this->idubicacion,  
            $this->idpromocion, $this->stock, $this->estado, $this->precio_compra);
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
