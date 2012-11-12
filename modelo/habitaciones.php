<?php

class habitaciones {

    public $idhabitacion;
    public $descripcion;
    public $nro_habitacion;
    public $ventilacion;
    public $estado;
    
    public function inserta() {
        $datos = array(0, $this->descripcion, $this->nro_habitacion, $this->ventilacion, $this->estado);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_habitaciones", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        $stmt->setFetchMode(PDO::FETCH_ASSOC);  
        return $stmt->fetch();
    }

    public function actualiza() {
        $datos = array($this->idhabitacion, $this->descripcion, $this->nro_habitacion, $this->ventilacion, $this->estado);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_habitaciones", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function selecciona() {
        if(is_null($this->idhabitacion)){
            $this->idhabitacion=0;
        }
        $datos = array($this->idhabitacion);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_habitaciones", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        return $stmt->fetchall(PDO::FETCH_ASSOC);
    }

    public function elimina() {
        $datos = array($this->idhabitacion);
        $r = consulta::procedimientoAlmacenado("pa_elimina_habitaciones", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>
