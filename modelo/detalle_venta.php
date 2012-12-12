<?php

class detalle_venta extends Main{

    public $idventa;
    public $idpaquete;
    public $idproducto;
    public $cantidad;
    public $precio_venta;

    public function inserta() {
        $datos = array($this->idventa, $this->idpaquete, $this->idproducto, $this->cantidad, $this->precio_venta);
//        echo '<pre>';
//                print_r($datos);exit;
        $r = $this->get_consulta("pa_inserta_act_detalle_venta", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idventa, $this->idpaquete, $this->idproducto, $this->cantidad, $this->precio_venta);
        $r = $this->get_consulta("pa_inserta_act_detalle_venta", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }
    
    public function selecciona() {
        if(is_null($this->idventa)){
            $this->idventa=0;
        }
        if(is_null($this->idproducto)){
            $this->idproducto=0;
        }
        if(is_null($this->idpaquete)){
            $this->idpaquete=0;
        }
        $datos = array($this->idventa, $this->idproducto, $this->idpaquete);
        $r = $this->get_consulta("pa_selecciona_detalle_venta", $datos);
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
        $datos = array($this->idventa, $this->idproducto, $this->idpaquete);
        $r = $this->get_consulta("pa_elimina_detalle_venta", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }


}

?>