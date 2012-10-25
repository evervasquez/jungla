<?php

class plan_contable {

    public $idcuenta;
    public $descripcion;
    public $nro_cuenta;
    public $nivel;
    public $movimientos;
    public $idcuenta_padre;
    public $idcategoria;
    

    public function inserta() {
        $datos = array($this->idcuenta, $this->descripcion, $this->nro_cuenta, $this->nivel, 
            $this->movimientos, $this->idcuenta_padre, $this->idcategoria);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_plan_contable", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idcuenta, $this->descripcion, $this->nro_cuenta, $this->nivel, 
            $this->movimientos, $this->idcuenta_padre, $this->idcategoria);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_plan_contable", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function selecciona() {
        $datos = array($this->idcuenta);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_plan_contable", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        return $stmt->fetchall();
    }

    public function elimina() {
        $datos = array($this->idcuenta);
        $r = consulta::procedimientoAlmacenado("pa_elimina_plan_contable", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>
