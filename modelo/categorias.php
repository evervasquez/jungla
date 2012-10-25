<?php

class categorias {

    public $idcategoria;
    public $descripcion;
    public $nroelemento;

    public function selecciona() {
        $datos = array($this->idcategoria);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_categorias", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
//        $stmt = $r[0];
        return $stmt->fetchall();
    }

    public function elimina() {
        $datos = array($this->idcategoria);
        $r = consulta::procedimientoAlmacenado("pa_elimina_categorias", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function inserta() {
        $datos = array($this->idcategoria, $this->descripcion, $this->nroelemento);
        $r = consulta::procedimientoAlmacenado("pa_inserta_categorias", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idcategoria, $this->descripcion, $this->nroelemento);
        $r = consulta::procedimientoAlmacenado("pa_actualiza_categorias", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>