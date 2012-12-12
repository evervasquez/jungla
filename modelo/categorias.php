<?php

class categorias extends Main{

    public $idcategoria;
    public $descripcion;
    public $nro_elemento;

    public function selecciona() {
        if(is_null($this->descripcion)){
            $this->descripcion='';
        }
        if(is_null($this->idcategoria)){
            $this->idcategoria=0;
        }
        $datos = array($this->idcategoria, $this->descripcion);
        $r = $this->get_consulta("pa_selecciona_categorias", $datos);
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
        $datos = array($this->idcategoria);
        $r = $this->get_consulta("pa_elimina_categorias", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function inserta() {
        $datos = array($this->idcategoria, $this->descripcion, $this->nro_elemento);
        $r = $this->get_consulta("pa_inserta_actualiza_cat", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idcategoria, $this->descripcion, $this->nro_elemento);
        $r = $this->get_consulta("pa_inserta_actualiza_cat", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>