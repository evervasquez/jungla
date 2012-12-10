<?php

class movimiento_producto extends Main{

    public $idcompra;
    public $idproducto;
    public $idtipo_movimiento;
//    public $idventa;
    public $cantidad;
    public $idempleado;
    public $idmovimiento_producto;
    public $fecha;
    public $nro_comprobante;
    public $empleado;
    public $producto;
    public $proveedor;
    

    public function inserta() {
        if(is_null($this->idcompra)){
            $this->idcompra=0;
        }
        if(is_null($this->idproducto)){
            $this->idproducto=0;
        }
        $datos = array($this->idcompra, $this->idproducto, $this->idtipo_movimiento, $this->cantidad,
                $this->idempleado, 0, $this->fecha);
//        echo '<pre>';
//                print_r($datos);exit;
        $r = $this->get_consulta("pa_inserta_act_movimiento_p", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idcompra, $this->idproducto, $this->idtipo_movimiento, $this->cantidad,
                $this->idempleado, $this->idmovimiento_producto, $this->fecha);
        $r = $this->get_consulta("pa_inserta_act_movimiento_p", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function selecciona() {
        if(is_null($this->idmovimiento_producto)){
            $this->idmovimiento_producto=0;
        }
        if(is_null($this->idtipo_movimiento)){
            $this->idtipo_movimiento=0;
        }
        if(is_null($this->nro_comprobante)){
            $this->nro_comprobante='';
        }
        if(is_null($this->empleado)){
            $this->empleado='';
        }
        if(is_null($this->producto)){
            $this->producto='';
        }
        if(is_null($this->proveedor)){
            $this->proveedor='';
        }
        $datos = array($this->idmovimiento_producto, $this->idtipo_movimiento, $this->nro_comprobante, $this->empleado, $this->producto, $this->proveedor);
        $r = $this->get_consulta("pa_selecciona_movimiento_p", $datos);
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
        $datos = array($this->idmovimiento_producto);
        $r = $this->get_consulta("pa_elimina_movimiento_producto", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>
