<?php

class tipo_empleado {

    public $idtipo_empleado;
    public $descripcion;

    public function selecciona() {
        $datos = array($this->idtipo_empleado);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_tipo_empleado", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        return $stmt->fetchall();
    }

    public function elimina() {
        $datos = array($this->idtipo_empleado);
        $r = consulta::procedimientoAlmacenado("pa_elimina_tipo_empleado", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function inserta() {
        $datos = array($this->idtipo_empleado, $this->descripcion);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_tipo_empleado", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idtipo_empleado, $this->descripcion);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_tipo_empleado", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>
