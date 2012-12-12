<?php

class movimiento_caja extends Main{

    public $idmovimiento_caja;
    public $idconcepto_movimiento;
    public $idcaja;
    public $monto;
    public $idcompra;
    public $idventa;
    public $descripcion;
    

    public function inserta() {
        $datos = array(0, $this->idconcepto_movimiento, $this->idcaja, $this->monto, 
            $this->idcompra, $this->idventa);
        $r = $this->get_consulta("pa_inserta_movimiento_c", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        return $stmt->fetchall(PDO::FETCH_ASSOC);
    }

    public function actualiza() {
        $datos = array($this->idmovimiento_caja, $this->idconcepto_movimiento, $this->idcaja, $this->monto, 
            $this->idcompra, $this->idventa);
        $r = $this->get_consulta("pa_inserta_movimiento_c", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function selecciona() {
        if(is_null($this->idmovimiento_caja)){
            $this->idmovimiento_caja=0;
        }
        if(is_null($this->descripcion)){
            $this->descripcion='';
        }
        $datos = array($this->idmovimiento_caja, $this->descripcion);
        $r = $this->get_consulta("pa_selecciona_movimiento_c", $datos);
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

    public function elimina() {
        $datos = array($this->idmovimiento_caja);
        $r = $this->get_consulta("pa_elimina_movimiento_caja", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>
