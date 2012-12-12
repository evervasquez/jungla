<?php

class tipo_habitacion extends Main{

    public $idtipo_habitacion;
    public $descripcion;
    public $costo;
    public $camas;

    public function selecciona() {
        if(is_null($this->idtipo_habitacion)){
            $this->idtipo_habitacion=0;
        }
        if(is_null($this->descripcion)){
            $this->descripcion='';
        }
        $datos = array($this->idtipo_habitacion, $this->descripcion);
        $r = $this->get_consulta("pa_selecciona_tipo_habitacion", $datos);
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
        $datos = array($this->idtipo_habitacion);
        $r = $this->get_consulta("pa_elimina_tipo_habitacion", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function inserta() {
        $datos = array(0, $this->descripcion, $this->costo, $this->camas);
        $r = $this->get_consulta("pa_inserta_act_tipo_habitacion", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idtipo_habitacion, $this->descripcion, $this->costo, $this->camas);
        $r = $this->get_consulta("pa_inserta_act_tipo_habitacion", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

    ?>