<?php

class ubicaciones {

    public $idubicacion;
    public $idalmacen;
    public $descripcion;
    public $almacenes;

    public function selecciona() {
        if(is_null($this->descripcion)){
            $this->descripcion='';
        }
        if(is_null($this->almacenes)){
            $this->almacenes='';
        }
        $datos = array($this->idubicacion, $this->descripcion, $this->almacenes);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_ubicaciones", $datos);
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
        $datos = array($this->idubicacion);
        $r = consulta::procedimientoAlmacenado("pa_elimina_ubicaciones", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function inserta() {
        $datos = array($this->idubicacion, $this->descripcion, $this->idalmacen);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_ubicaciones", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idubicacion, $this->descripcion, $this->idalmacen);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_ubicaciones", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>
