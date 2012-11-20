<?php

class plan_contable {

    public $idcuenta;
    public $descripcion;
    public $nro_cuenta;
    public $nivel;
    public $idcuenta_padre;
    public $idcategoria;

    public function inserta() {
        $datos = array(0, $this->descripcion, $this->nro_cuenta,
            $this->idcuenta_padre, $this->idcategoria);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_plan_contable", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idcuenta, $this->descripcion, $this->nro_cuenta,
            $this->idcuenta_padre, $this->idcategoria);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_plan_contable", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function selecciona() {
        if(is_null($this->idcuenta)){
            $this->idcuenta=0;
        }
        if(is_null($this->nro_cuenta)){
            $this->nro_cuenta='';
        }
        if(is_null($this->descripcion)){
            $this->descripcion='';
        }
        if(is_null($this->nivel)){
            $this->nivel='';
        }
        if(is_null($this->idcuenta_padre)){
            $this->idcuenta_padre='';
        }
        $datos = array($this->idcuenta);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_cuentas", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchall();
    }
    
        public function seleccionar($idcuenta_padre){
        $datos = array($idcuenta_padre);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_cuentas_padre", $datos);
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
        $datos = array($this->idcuenta);
        $r = consulta::procedimientoAlmacenado("pa_elimina_plan_contable", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>
