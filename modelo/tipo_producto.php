<?php

class tipo_producto {

    public $idtipo_producto;
    public $descripcion;

    public function selecciona() {
        $datos = array($this->idtipo_producto);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_tipo_producto", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        return $stmt->fetch();
    }

    public function elimina() {
        $datos = array($this->idtipo_producto);
        $r = consulta::procedimientoAlmacenado("pa_elimina_tipo_producto", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function inserta() {
        $datos = array($this->idtipo_producto, $this->descripcion);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_tipo_producto", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idtipo_producto, $this->descripcion);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_tipo_producto", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>
