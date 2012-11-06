<?php

class tipo_habitacion {

    public $idtipo_habitacion;
    public $descripcion;

    public function selecciona() {
        if(is_null($this->descripcion)){
            $this->descripcion='';
        }
        $datos = array($this->idtipo_habitacion, $this->descripcion);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_tipo_habitacion", $datos);
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
        $datos = array($this->idtipo_habitacion);
        $r = consulta::procedimientoAlmacenado("pa_elimina_tipo_habitacion", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function inserta() {
        $datos = array($this->idtipo_habitacion, $this->descripcion);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_tipo_habitacion", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idtipo_habitacion, $this->descripcion);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_tipo_habitacion", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

    ?>