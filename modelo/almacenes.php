<?php

class almacenes extends Main{

    public $idalmacen;
    public $descripcion;

    public function selecciona() {
        if (is_null($this->idalmacen)) {
            $this->idalmacen = 0;
        }
        if (is_null($this->descripcion)) {
            $this->descripcion = '';
        }
        $datos = array($this->idalmacen, $this->descripcion);
        $r = $this->get_consulta("pa_selecciona_almacenes", $datos);
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
        }
    }

    public function elimina() {
        $datos = array($this->idalmacen);
        $r = $this->get_consulta("pa_elimina_almacenes", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function inserta() {
        $datos = array(0, $this->descripcion);
        $r = $this->get_consulta("pa_inserta_actualiza_almacenes", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idalmacen, $this->descripcion);
        $r = $this->get_consulta("pa_inserta_actualiza_almacenes", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>
