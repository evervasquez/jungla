<?php

class amortizacion_pago extends Main{

    public $idcuota_pago;
    public $idmovimiento_caja;
    public $fecha;
    public $monto;

    public function inserta() {
        $datos = array($this->idcuota_pago, $this->idmovimiento_caja, $this->fecha, $this->monto);
        $r = $this->get_consulta("pa_inserta_actualiza_amortizacion_pago", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idcuota_pago, $this->idmovimiento_caja, $this->fecha, $this->monto);
        $r = $this->get_consulta("pa_inserta_actualiza_amortizacion_pago", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }
    
    public function selecciona() {
        $datos = array($this->idcuota_pago, $this->idmovimiento_caja);
        $r = $this->get_consulta("pa_selecciona_amortizacion_pago", $datos);
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
        $datos = array($this->idcuota_pago, $this->idmovimiento_caja);
        $r = $this->get_consulta("pa_elimina_amortizacion_pago", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>