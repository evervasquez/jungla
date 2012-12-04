<?php

class cuota_pago {

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
        $r = consulta::procedimientoAlmacenado("pa_selecciona_cuota_pago", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
//        $stmt = $r[0];
        return $stmt->fetchall();
    }

    public function elimina() {
        $datos = array($this->idcompra);
        $r = consulta::procedimientoAlmacenado("pa_elimina_cuota_pago", $datos);
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
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_cuota_pago", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
//        if(!is_null($this->idcompra)){
//            $datos = array($this->idcuota_pago, $this->idcompra, $this->fecha_pago, $this->fecha_vencimiento, 
//                $this->interes, $this->monto_cuota, $this->monto_pagado, $this->nro_cuota);
//            $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_cuota_pago", $datos);
//        }else{
            $datos = array($this->idcuota_pago, $this->monto_pagado);
            $r = consulta::procedimientoAlmacenado("pa_actualiza_monto_pagado", $datos);
//        }
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>