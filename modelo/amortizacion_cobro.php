<?php

class amortizacion_cobro extends Main{

    public $idmovimiento_caja;
    public $idcuota_cobro;
    public $fecha;
    public $monto;

    public function selecciona() {
        $datos = array($this->idmovimiento_caja, $this->idcuota_cobro);
        $r = $this->get_consulta("pa_selecciona_amort_c", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
    if (conexion::$_servidor == 'oci') {
            oci_fetch_all($stmt, $data, null, null, OCI_FETCHSTATEMENT_BY_ROW);
            return $data;
        } else {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);       
            return $stmt->fetchall();
        }
    }

    public function elimina() {
        $datos = array($this->idmovimiento_caja, $this->idcuota_cobro);
        $r = $this->get_consulta("pa_elimina_amortizacion_cobro", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function inserta() {
        $datos = array($this->idmovimiento_caja, $this->idcuota_cobro, $this->fecha, $this->monto);
        $r = $this->get_consulta("pa_inserta_actualiza_amort_c", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idmovimiento_caja, $this->idcuota_cobro, $this->fecha, $this->monto);
        $r = $this->get_consulta("pa_inserta_actualiza_amort_c", $datos);

        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>