<?php

class tipo_comprobante extends Main{

    public $idtipo_comprobante;
    public $descripcion;

    public function selecciona() {
        if(is_null($this->idtipo_comprobante)){
            $this->idtipo_comprobante=0;
        }
        if(is_null($this->descripcion)){
            $this->descripcion='';
        }
        $datos = array($this->idtipo_comprobante, $this->descripcion);
        $r = $this->get_consulta("pa_selecciona_tipo_comprobante", $datos);
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