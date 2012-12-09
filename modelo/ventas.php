<?php

class ventas extends Main{

    public $idventa;
    public $estado;
    public $observaciones;
    public $idtipo_comprobante;
    public $idcliente;
    public $idempleado;
    public $idtipo_transaccion;
    public $importe;
    public $igv;
    public $fecha_venta;
    public $nro_documento;
    public $estado_pago;
    public $descuento;
    public $cliente;
    public $empleado;
    

    public function inserta() {
        $datos = array(0, $this->observaciones, $this->idtipo_comprobante, $this->idcliente, 
            $this->idempleado, $this->idtipo_transaccion,  $this->importe, $this->igv, $this->descuento);
//        echo '<pre>';
//                print_r($datos);exit;
        $r = $this->get_consulta("pa_inserta_actualiza_ventas", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        return $stmt->fetchall(PDO::FETCH_ASSOC);
    }

    public function actualiza() {
        if(is_null($this->estado_pago)){
            $datos = array($this->idventa, $this->observaciones, $this->idtipo_comprobante, $this->idcliente, 
            $this->idempleado, $this->idtipo_transaccion,  $this->importe, $this->igv, $this->descuento);
            $r = $this->get_consulta("pa_inserta_actualiza_ventas", $datos);
        }  else {
            $datos = array($this->idventa, $this->estado_pago, 0);
            $r = $this->get_consulta("pa_actualiza_estado_pago", $datos);
        }
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function selecciona() {
        if(is_null($this->idventa)){
            $this->idventa=0;
        }
        if(is_null($this->nro_documento)){
            $this->nro_documento='';
        }
        if(is_null($this->cliente)){
            $this->cliente=null;
        }
        if(is_null($this->empleado)){
            $this->empleado='';
        }        
        $datos = array($this->idventa, $this->nro_documento, $this->cliente, $this->empleado);
        $r = $this->get_consulta("pa_selecciona_ventas", $datos);
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
        $datos = array($this->idventa);
        $r = $this->get_consulta("pa_elimina_ventas", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>
