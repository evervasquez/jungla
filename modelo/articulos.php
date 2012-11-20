<?php

class articulos {

    public $idarticulo;
    public $titulo;
    public $descripcion;
    public $idmodulo;

    public function selecciona() {
        if(is_null($this->idarticulo)){
            $this->idarticulo=0;
        }
        $datos = array($this->idarticulo);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_articulos", $datos);
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
        $datos = array($this->idarticulo);
        $r = consulta::procedimientoAlmacenado("pa_elimina_articulos", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function inserta() {
        $datos = array(0, $this->titulo, $this->descripcion, 37);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_articulos", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idarticulo, $this->titulo, $this->descripcion, $this->idmodulo);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_articulos", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>