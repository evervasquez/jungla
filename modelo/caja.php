<?php

class caja extends Main{

    public $idcaja;
    public $estado;
    public $fecha;
    public $saldo;
    public $idempleado;
    public $empleado;
    
    public function selecciona() {
        if(is_null($this->idcaja)){
            $this->idcaja=0;
        }
        if(is_null($this->empleado)){
            $this->empleado='';
        }
        $datos = array($this->idcaja, $this->empleado);
        $r = $this->get_consulta("pa_selecciona_caja", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
       if (BaseDatos::$_archivo == 'OCI') {
            oci_fetch_all($stmt, $data, null, null, OCI_FETCHSTATEMENT_BY_ROW);
            return $data;
        } else {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);       
            return $stmt->fetchall();
        }
    }
    
    public function inserta() {
        $datos = array(0, $this->estado, $this->fecha, $this->idempleado);
        $r = $this->get_consulta("pa_inserta_actualiza_caja", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idcaja, $this->estado, $this->fecha, $this->idempleado);
        $r = $this->get_consulta("pa_inserta_actualiza_caja", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>
