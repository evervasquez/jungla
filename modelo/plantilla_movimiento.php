<?php

class plantilla_movimiento {

    public $idplantilla_movimiento;
    public $descripcion;
    public $idcuenta;
    public $idconcepto_movimiento;
    public $debe_haber;

    public function selecciona() {
        if(is_null($this->idplantilla_movimiento)){
            $this->idplantilla_movimiento=0;
        }
        $datos = array($this->idplantilla_movimiento);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_plantilla_movimiento", $datos);
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
        $datos = array($this->idplantilla_movimiento);
        $r = consulta::procedimientoAlmacenado("pa_elimina_plantilla_movimiento", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function inserta() {
        $datos = array(0,$this->descripcion, $this->idcuenta,  $this->idconcepto_movimiento,  $this->debe_haber);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_plantilla_movimiento", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idplantilla_movimiento, $this->descripcion, $this->idasiento);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_plantilla_movimiento", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>
