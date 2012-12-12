<?php

class servicios extends Main{

    public $idservicio;
    public $descripcion;
    
    public function selecciona() {
        if(is_null($this->idservicio)){
            $this->idservicio=0;
        }
        if(is_null($this->descripcion)){
            $this->descripcion='';
        }
        $datos = array($this->idservicio, $this->descripcion);
        $r = $this->get_consulta("pa_selecciona_servicios", $datos);
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
        $datos = array($this->idservicio);
        $r = $this->get_consulta("pa_elimina_servicios", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function inserta() {
        $datos = array(0, $this->descripcion);
        $r = $this->get_consulta("pa_inserta_actualiza_servicios", $datos);
        $error = $r[1];
        //$r = null;
      // return $error;
    }

    public function actualiza() {
        $datos = array($this->idservicio, $this->descripcion);
        $r = $this->get_consulta("pa_inserta_actualiza_servicios", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>
