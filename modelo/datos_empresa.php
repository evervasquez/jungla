<?php

class datos_empresa {

    public $idarticulo;
    public $titulo;
    public $descripcion;
    public $imagen;

    public function selecciona() {
        $r = consulta::procedimientoAlmacenado("pa_selecciona_datos_empresa", $datos);
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
        $datos = array(0, $this->titulo, $this->descripcion, $this->imagen);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_articulos", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idarticulo, $this->titulo, $this->descripcion, $this->imagen);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_articulos", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>