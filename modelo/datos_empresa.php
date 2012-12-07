<?php

class datos_empresa extends Main{

    public $idarticulo;
    public $titulo;
    public $descripcion;
    public $imagen;

    public function selecciona() {
        $r = $this->get_consulta("pa_selecciona_datos_empresa", $datos);
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
        }
    }

    public function elimina() {
        $datos = array($this->idarticulo);
        $r = $this->get_consulta("pa_elimina_articulos", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function inserta() {
        $datos = array(0, $this->titulo, $this->descripcion, $this->imagen);
        $r = $this->get_consulta("pa_inserta_actualiza_articulos", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idarticulo, $this->titulo, $this->descripcion, $this->imagen);
        $r = $this->get_consulta("pa_inserta_actualiza_articulos", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>