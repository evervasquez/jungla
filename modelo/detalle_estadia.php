<?php

class detalle_estadia {

    public $idhabitacion_especifica;
    public $idcliente;
    public $idventa;
    public $estado;
    public $fecha_ingreso;
    public $fecha_salida;
    public $fecha_reserva;

    public function selecciona() {
        $datos = array($this->idhabitacion_especifica_especifica, $this->idcliente, $this->idventa);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_detalle_estadia", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        return $stmt->fetchall();
    }
    
    public function elimina() {
        $datos = array($this->idhabitacion_especifica, $this->idcliente, $this->idventa);
        $r = consulta::procedimientoAlmacenado("pa_elimina_detalle_estadia", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function inserta() {
        $datos = array($this->idhabitacion_especifica, $this->idcliente, $this->idventa, $this->estado, 
            $this->fecha_ingreso, $this->fecha_salida, $this->fecha_reserva);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_detalle_estadia", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idhabitacion_especifica, $this->idcliente, $this->idventa, $this->estado, $this->fecha_ingreso,
            $this->fecha_salida, $this->fecha_reserva);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_detalle_estadia", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>