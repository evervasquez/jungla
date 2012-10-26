<?php

class promociones {

    public $idpromociones;
    public $descripcion;
    public $descuento;
    public $fecha_inicio;
    public $fecha_final;

    public function selecciona() {
        $datos = array($this->idpromociones);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_promociones", $datos);
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
        $datos = array($this->idpromociones);
        $r = consulta::procedimientoAlmacenado("pa_elimina_promociones", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function inserta() {
        $datos = array($this->idpromociones, $this->descripcion, $this->descuento, $this->fecha_inicio, $this->fecha_final);
        $r = consulta::procedimientoAlmacenado("pa_inserta_promociones", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idpromociones, $this->descripcion, $this->descuento, $this->fecha_inicio, $this->fecha_final);
        $r = consulta::procedimientoAlmacenado("pa_actualiza_promociones", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>