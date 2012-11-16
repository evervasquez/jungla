<?php

class deudas {

    public $nro_comprobante;
    public $proveedor;

    public function selecciona() {
        if(is_null($this->nro_comprobante)){
            $this->nro_comprobante='';
        }
        if(is_null($this->proveedor)){
            $this->proveedor='';
        }
        $datos = array($this->nro_comprobante, $this->proveedor);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_deudas", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        return $stmt->fetchall();
    }

}

?>
