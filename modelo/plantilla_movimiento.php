<?php

class plantilla_movimiento extends Main{

    public $idplantilla_movimiento;
    public $descripcion;
    public $idcuenta;
    public $idconcepto_movimiento;
    public $debe_haber;
    public $cuenta;
    public $concepto_movimiento;

    public function selecciona() {
        if(is_null($this->idplantilla_movimiento)){
            $this->idplantilla_movimiento=0;
        }
        if(is_null($this->descripcion)){
            $this->descripcion='';
        }
        if(is_null($this->cuenta)){
            $this->cuenta='';
        }
        if(is_null($this->concepto_movimiento)){
            $this->concepto_movimiento='';
        }
        $datos = array($this->idplantilla_movimiento, $this->descripcion, $this->cuenta, $this->concepto_movimiento);
        $r = $this->get_consulta("pa_selecciona_plantilla_movimiento", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
         if (BaseDatos::$_archivo == 'OCI') {
            oci_fetch_all($stmt, $data, null, null, OCI_FETCHSTATEMENT_BY_ROW);
            return $data;
        } else {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);       
            return $stmt->fetchall();
        };
    }

    public function elimina() {
        $datos = array($this->idplantilla_movimiento);
        $r = $this->get_consulta("pa_elimina_plantilla_movimiento", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function inserta() {
         if(is_null($this->idplantilla_movimiento)){
            $this->idplantilla_movimiento=0;
        }
        $datos = array($this->descripcion, $this->idcuenta,  $this->idconcepto_movimiento,  $this->debe_haber,$this->idplantilla_movimiento);
        $r = $this->get_consulta("pa_inserta_actualiza_plantilla_movimiento", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->descripcion, $this->idcuenta,  $this->idconcepto_movimiento,  $this->debe_haber,$this->idplantilla_movimiento);
        $r = $this->get_consulta("pa_inserta_actualiza_plantilla_movimiento", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>
