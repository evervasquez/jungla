<?php

class membresia extends Main{

    public $idmembresia;
    public $descripcion;

    public function selecciona() {
        if(is_null($this->idmembresia)){
            $this->idmembresia=0;
        }
        if(is_null($this->descripcion)){
            $this->descripcion='';
        }
        $datos = array($this->idmembresia, $this->descripcion);
        $r = $this->get_consulta("pa_selecciona_membresia", $datos);
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
        $datos = array($this->idmembresia);
        $r = $this->get_consulta("pa_elimina_membresia", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function inserta() {
        $datos = array(0, $this->descripcion);
        $r = $this->get_consulta("pa_inserta_actualiza_membresia", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idmembresia, $this->descripcion);
        $r = $this->get_consulta("pa_inserta_actualiza_membresia", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>
