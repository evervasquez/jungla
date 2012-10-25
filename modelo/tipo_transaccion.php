<?php

class tipo_transaccion {

    public $idtipo_transaccion;
    public $descripcion;

    public function selecciona() {
        $datos = array($this->idtipo_transaccion);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_tipo_transaccion", $datos);
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
        $datos = array($this->idtipo_transaccion);
        $r = consulta::procedimientoAlmacenado("pa_elimina_tipo_transaccion", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function inserta() {
        $datos = array($this->idtipo_transaccion, $this->descripcion);
        $r = consulta::procedimientoAlmacenado("pa_inserta_tipo_transaccion", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idtipo_transaccion, $this->descripcion);
        $r = consulta::procedimientoAlmacenado("pa_actualiza_tipo_transaccion", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>