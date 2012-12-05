<?php

class habitaciones {

    public $idhabitacion;
    public $descripcion;
    public $nro_habitacion;
    public $ventilacion;
    public $estado;
    public $tipo_habitacion_predet;
    public $idventa;
    
    public function inserta() {
        $datos = array(0, $this->descripcion, $this->nro_habitacion, $this->ventilacion, $this->estado, $this->tipo_habitacion_predet);
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
        $datos = array($this->idhabitacion, $this->descripcion, $this->nro_habitacion, $this->ventilacion, $this->estado, $this->tipo_habitacion_predet);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_habitaciones", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function selecciona() {
        if(is_null($this->idventa)){
            if(is_null($this->idhabitacion)){
                $this->idhabitacion=0;
            }
            if(is_null($this->nro_habitacion)){
                $this->nro_habitacion='';
            }
            $datos = array($this->idhabitacion, $this->nro_habitacion);
            $r = consulta::procedimientoAlmacenado("pa_selecciona_habitaciones", $datos);
        }else{
            $datos = array($this->idventa);
            $r = consulta::procedimientoAlmacenado("pa_selecciona_habitaciones_detalle_estadia", $datos);
        }
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
        $datos = array($this->idhabitacion);
        $r = consulta::procedimientoAlmacenado("pa_elimina_habitaciones", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }
    
     public function selecciona_android() {
        $datos = array();
        $r = consulta::procedimientoAlmacenado("pa_habitacion_android", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchall();
    }
}

?>
