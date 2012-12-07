
<?php

class promociones extends Main{

    public $idpromocion;
    public $descripcion;
    public $descuento;
    public $fecha_inicio;
    public $fecha_final;

    public function selecciona() {
        if(is_null($this->idpromocion)){
            $this->idpromocion=0;
        }
        if(is_null($this->descripcion)){
            $this->descripcion='';
        }
        $datos = array($this->idpromocion, $this->descripcion);
        $r = $this->get_consulta("pa_selecciona_promociones", $datos);
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
        $datos = array($this->idpromocion);
        $r = $this->get_consulta("pa_elimina_promociones", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function inserta() {
        $datos = array(0, $this->descripcion, $this->descuento, $this->fecha_inicio, $this->fecha_final);
        $r = $this->get_consulta("pa_inserta_actualiza_promociones", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idpromocion, $this->descripcion, $this->descuento, $this->fecha_inicio, $this->fecha_final);
        $r = $this->get_consulta("pa_inserta_actualiza_promociones", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>