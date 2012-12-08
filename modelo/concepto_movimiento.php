<?php

class concepto_movimiento extends Main{

    public $idconcepto_movimiento;
    public $descripcion;

    public function selecciona() {
        if(is_null($this->idconcepto_movimiento)){
            $this->idconcepto_movimiento=0;
        }
         if(is_null($this->descripcion)){
            $this->descripcion='';
        }
        $datos = array($this->idconcepto_movimiento, $this->descripcion);
        $r = $this->get_consulta("pa_selecciona_concepto_m", $datos);
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
        }
    }

    public function elimina() {
        $datos = array($this->idconcepto_movimiento);
        $r = $this->get_consulta("pa_elimina_concepto_movimiento", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function inserta() {
        $datos = array(0, $this->descripcion);
        $r = $this->get_consulta("pa_inserta_actualiza_concepto_movimiento", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idconcepto_movimiento, $this->descripcion);
        $r = $this->get_consulta("pa_inserta_actualiza_concepto_movimiento", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>
