<?php

class deudas extends Main{

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
        $r = $this->get_consulta("pa_selecciona_deudas", $datos);
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

}

?>
