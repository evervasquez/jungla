<?php

class articulos {

    public $idarticulo;
    public $titulo;
    public $descripcion;
    public $idmodulo;

    public function selecciona() {
        $datos = array($this->idarticulo);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_articulo", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
//        $stmt = $r[0];
        return $stmt->fetch();
    }

    public function elimina() {
        $datos = array($this->idarticulo);
        $r = consulta::procedimientoAlmacenado("pa_elimina_articulo", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function inserta() {
        $datos = array($this->idarticulo, $this->titulo, $this->descripcion, $this->idmodulo);
        $r = consulta::procedimientoAlmacenado("pa_inserta_articulo", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idarticulo, $this->titulo, $this->descripcion, $this->idmodulo);
        $r = consulta::procedimientoAlmacenado("pa_actualiza_articulo", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>