<?php

class ubicaciones extends Main{

    public $idubicacion;
    public $idalmacen;
    public $descripcion;
    public $almacenes;

    public function selecciona() {
        if(is_null($this->idubicacion)){
            $this->idubicacion=0;
        }
        if(is_null($this->descripcion)){
            $this->descripcion='';
        }
        if(is_null($this->almacenes)){
            $this->almacenes='';
        }
        $datos = array($this->idubicacion, $this->descripcion, $this->almacenes);
        $r = $this->get_consulta("pa_selecciona_ubicaciones", $datos);
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
        $datos = array($this->idubicacion);
        $r = $this->get_consulta("pa_elimina_ubicaciones", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function inserta() {
        $datos = array(0, $this->descripcion, $this->idalmacen);
        $r = $this->get_consulta("pa_inserta_act_ubicaciones", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idubicacion, $this->descripcion, $this->idalmacen);
        $r = $this->get_consulta("pa_inserta_act_ubicaciones", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>
