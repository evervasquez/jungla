<?php

class cobros extends Main{
    
    public $nro_documento;
    public $cliente;
    
    public function selecciona() {
        if(is_null($this->nro_documento)){
            $this->nro_documento='';
        }
        if(is_null($this->cliente)){
            $this->cliente='';
        }
        $datos = array($this->nro_documento, $this->cliente);
        $r = $this->get_consulta("pa_selecciona_cobros", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        if (BaseDatos::$_archivo == 'OCI') {
            oci_fetch_all($stmt, $data, null, null, OCI_FETCHSTATEMENT_BY_ROW);
            return $data;
        } else {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);       
            return $stmt->fetchall();
        }
    }
    
}

?>
