<?php

class asientos extends Main {

    public $idcompra;
    public $idasiento;
    public $idventa;
    public $idventa_cobro;
    public $idventa_servicio;
    public $monto_amortizado;
    public $idcompra_deuda;

    public function selecciona() {
        if (is_null($this->idasiento)) {
            $this->idasiento = 0;
        }
        $datos = array($this->idasiento);
        $r = $this->get_consulta("pa_selecciona_asientos", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
//        $stmt = $r[0];
        return $stmt->fetchall();
    }

    public function inserta() {
        if (!is_null($this->idcompra)) {
            $datos = array($this->idcompra);
            $r = $this->get_consulta("pa_inserta_asientos_compra", $datos);
        }
        if (!is_null($this->idventa)) {
            $datos = array($this->idventa);
            $r = $this->get_consulta("pa_inserta_asientos_venta", $datos);
        }
        if (!is_null($this->idventa_servicio)) {
            $datos = array($this->idventa_servicio);
            $r = $this->get_consulta("pa_inserta_asientos_servicio", $datos);
        }
        if (!is_null($this->idventa_cobro)) {
            $datos = array($this->idventa_cobro);
            $r = $this->get_consulta("pa_inserta_asientos_cobros", $datos);
        }
        if (!is_null($this->idcompra_deuda)) {
            if (is_null($this->monto_amortizado)) {
                $this->monto_amortizado = 0;
            }
            $datos = array($this->idcompra_deuda, $this->monto_amortizado);
            $r = $this->get_consulta("pa_inserta_asientos_deudas", $datos);
        }
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function amortiza() {
        $datos = array($this->idventa_cobro, $this->monto_amortizado);
        $r = $this->get_consulta("pa_inserta_asientos_amortiza", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>