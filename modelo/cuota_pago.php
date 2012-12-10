<?php

class cuota_pago extends Main{

    public $idcuota_pago;
    public $idcompra;
    public $fecha_pago;
    public $fecha_vencimiento;
    public $interes;
    public $monto_cuota;
    public $monto_pagado;
    public $nro_cuota;

    public function selecciona() {
        if(is_null($this->idcompra)){
            $this->idcompra=0;
        }
        $datos = array($this->idcompra);
        $r = $this->get_consulta("pa_selecciona_cuota_pago", $datos);
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
        $datos = array($this->idcompra);
        $r = $this->get_consulta("pa_elimina_cuota_pago", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function inserta() {
        if(is_null($this->interes)){
            $this->interes=0;
        }
        if(is_null($this->monto_pagado)){
            $this->monto_pagado=0;
        }
        $datos = array(0, $this->idcompra, $this->fecha_pago, $this->fecha_vencimiento, $this->interes,
            $this->monto_cuota, $this->monto_pagado, $this->nro_cuota);
        $r = $this->get_consulta("pa_inserta_act_cuota_pago", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {

//        if(!is_null($this->idcompra)){
//            $datos = array($this->idcuota_pago, $this->idcompra, $this->fecha_pago, $this->fecha_vencimiento, 
//                $this->interes, $this->monto_cuota, $this->monto_pagado, $this->nro_cuota);
//            $r = $this->get_consulta("pa_inserta_actualiza_cuota_pago", $datos);
//        }else{
            $datos = array($this->idcuota_pago, $this->monto_pagado);
            $r = $this->get_consulta("pa_inserta_act_cuota_pago", $datos);
//        }
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>