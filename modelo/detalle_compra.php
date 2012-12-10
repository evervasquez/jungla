<?php

class detalle_compra extends Main{

    public $idcompra;
    public $idproducto;
    public $cantidad;
    public $precio;

    public function selecciona() {
        if(is_null($this->idcompra)){
            $this->idcompra=0;
        }
        if(is_null($this->idproducto)){
            $this->idproducto=0;
        }
        $datos = array($this->idcompra, $this->idproducto);
        $r = $this->get_consulta("pa_selecciona_detalle_compra", $datos);
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
        $datos = array($this->idcompra, $this->idproducto);
        $r = $this->get_consulta("pa_elimina_detalle_compra", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function inserta() {
        $datos = array($this->idcompra, $this->idproducto, $this->cantidad, $this->precio);
        $r = $this->get_consulta("pa_inserta_act_detalle_compra", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idcompra, $this->idproducto, $this->cantidad, $this->precio);
        $r = $this->get_consulta("pa_inserta_act_detalle_compra", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>