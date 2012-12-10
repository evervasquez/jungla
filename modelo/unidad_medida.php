<?php

class unidad_medida extends Main{

    public $idunidad_medida;
    public $descripcion;
    public $abreviatura;

    public function selecciona() {
        if(is_null($this->idunidad_medida)){
            $this->idunidad_medida=0;
        }
        if(is_null($this->descripcion)){
            $this->descripcion='';
        }
        if(is_null($this->abreviatura)){
            $this->abreviatura='';
        }
        $datos = array($this->idunidad_medida, $this->descripcion, $this->abreviatura);
        $r = $this->get_consulta("pa_selecciona_unidad_medida", $datos);
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
        };
    }

    public function elimina() {
        $datos = array($this->idunidad_medida);
        $r = $this->get_consulta("pa_elimina_unidad_medida", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function inserta() {
        $datos = array(0, $this->descripcion, $this->abreviatura);
        $r = $this->get_consulta("pa_inserta_act_unidad_medida", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idunidad_medida, $this->descripcion, $this->abreviatura);
        $r = $this->get_consulta("pa_inserta_act_unidad_medida", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>