<?php

class cuota_cobro extends Main{

    public $idcuota_cobro;
    public $idventa;
    public $fecha_cobro;
    public $nro_cobro;
    public $monto_cuota;
    public $interes;
    public $fecha_vencimiento;
    public $monto_cobrado;

    public function selecciona() {
        $datos = array($this->idcuota_cobro);
        $r = $this->get_consulta("pa_selecciona_cuota_cobro", $datos);
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
        $datos = array($this->idcuota_cobro);
        $r = $this->get_consulta("pa_elimina_cuota_cobro", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function inserta() {
        $datos = array(0, $this->idventa, $this->fecha_cobro, $this->nro_cobro,
            $this->monto_cuota, $this->interes, $this->fecha_vencimiento, $this->monto_cobrado);
        $r = $this->get_consulta("pa_inserta_actualiza_cuota_cobro", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idcuota_cobro, $this->idventa, $this->fecha_cobro, $this->nro_cobro,
            $this->monto_cuota, $this->interes, $this->fecha_vencimiento, $this->monto_cobrado);
        $r = $this->get_consulta("pa_inserta_actualiza_cuota_cobro", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>