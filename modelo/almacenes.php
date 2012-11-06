<?php

class almacenes {

    public $idalmacen;
    public $descripcion;

    public function selecciona() {
        if(is_null($this->descripcion)){
            $this->descripcion='';
        }
        $datos = array($this->idalmacen, $this->descripcion);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_almacenes", $datos);
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
        $datos = array($this->idalmacen);
        $r = consulta::procedimientoAlmacenado("pa_elimina_almacenes", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function inserta() {
        $datos = array($this->idalmacen, $this->descripcion);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_almacenes", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idalmacen, $this->descripcion);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_almacenes", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>
