<?php

class producto_paquete extends Main{
    
    public $idpaquete;
    public $idproducto;
    public $cantidad;

    public function selecciona() {
        if(is_null($this->idpaquete)){
            $this->idpaquete=0;
        }
        if(is_null($this->idproducto)){
            $this->idproducto=0;
        }
        $datos = array($this->idpaquete, $this->idproducto);
        $r = $this->get_consulta("pa_selecciona_prod_paq", $datos);
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
        $datos = array($this->idpaquete, $this->idproducto);
        $r = $this->get_consulta("pa_elimina_producto_paquete", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function inserta() {
        $datos = array($this->idpaquete, $this->idproducto, $this->cantidad);
        $r = $this->get_consulta("pa_inserta_act_prod_paq", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idpaquete, $this->idproducto, $this->cantidad);
        $r = $this->get_consulta("pa_inserta_act_prod_paq", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>
