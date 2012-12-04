<?php

class habitacion_especifica {

    public $idhabitacion;
    public $idtipo_habitacion;
    public $costo;
    public $observaciones;
    public $idhabitacion_especifica;

    public function selecciona() {
        if(is_null($this->idhabitacion_especifica)){
            $this->idhabitacion_especifica=0;
        }
        if(is_null($this->idhabitacion)){
            $this->idhabitacion=0;
        }
        if(is_null($this->idtipo_habitacion)){
            $this->idtipo_habitacion=0;
        }
        $datos = array($this->idhabitacion_especifica, $this->idhabitacion, $this->idtipo_habitacion);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_habitacion_especifica", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        return $stmt->fetchall(PDO::FETCH_ASSOC);
    }

    public function elimina() {
        $datos = array($this->idhabitacion, $this->idtipo_habitacion);
        $r = consulta::procedimientoAlmacenado("pa_elimina_habitacion_especifica", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function inserta() {
        $datos = array($this->idhabitacion, $this->idtipo_habitacion, $this->costo, $this->observaciones
                , 0);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_habitacion_especifica", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idhabitacion, $this->idtipo_habitacion, $this->costo, $this->observaciones
                , $this->idhabitacion_especifica);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_habitacion_especifica", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>