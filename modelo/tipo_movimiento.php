<?php

class tipo_movimiento extends Main{

    public $idtipo_movimiento;
    public $descripcion;

    public function selecciona() {
        $datos = array($this->idtipo_movimiento);
        $r = $this->get_consulta("pa_selecciona_tipo_movimiento", $datos);
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
        $datos = array($this->idtipo_movimiento);
        $r = $this->get_consulta("pa_elimina_tipo_movimiento", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function inserta() {
        $datos = array($this->idtipo_movimiento, $this->descripcion);
        $r = $this->get_consulta("pa_inserta_actualiza_tipo_movimiento", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idtipo_movimiento, $this->descripcion);
        $r = $this->get_consulta("pa_inserta_actualiza_tipo_movimiento", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>
