<?php

class plan_contable extends Main{

    public $idcuenta;
    public $descripcion;
    public $nro_cuenta;
    public $idcuenta_padre;
    public $idcategoria;
    public $cuenta_padre;

    public function inserta() {
        $datos = array(0, $this->descripcion, $this->nro_cuenta,
            $this->idcuenta_padre, $this->idcategoria);
        $r = $this->get_consulta("pa_inserta_act_plan_contable", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idcuenta, $this->descripcion, $this->nro_cuenta,
            $this->idcuenta_padre, $this->idcategoria);
        $r = $this->get_consulta("pa_inserta_act_plan_contable", $datos);
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
        if(is_null($this->cuenta_padre)){
            $this->cuenta_padre='';
        }
        $datos = array($this->idcuenta,$this->descripcion,$this->nro_cuenta,$this->cuenta_padre);
        $r = $this->get_consulta("pa_selecciona_cuentas", $datos);
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
        };
    }
    
        public function seleccionar($idcuenta_padre){
        $datos = array($idcuenta_padre);
        $r = $this->get_consulta("pa_selecciona_cuentas_padre", $datos);
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
        $r = $this->get_consulta("pa_elimina_plan_contable", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>
