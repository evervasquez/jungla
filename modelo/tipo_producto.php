<?php

class tipo_producto extends Main{

    public $idtipo_producto;
    public $descripcion;

    public function selecciona() {
        if(is_null($this->idtipo_producto)){
            $this->idtipo_producto=0;
        }
        if(is_null($this->descripcion)){
            $this->descripcion='';
        }
        $datos = array($this->idtipo_producto, $this->descripcion);
        $r = $this->get_consulta("pa_selecciona_tipo_producto", $datos);
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
        $datos = array($this->idtipo_producto);
        $r = $this->get_consulta("pa_elimina_tipo_producto", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function inserta() {
        $datos = array(0, $this->descripcion);
        $r = $this->get_consulta("pa_inserta_act_tipo_producto", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idtipo_producto, $this->descripcion);
        $r = $this->get_consulta("pa_inserta_act_tipo_producto", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>
