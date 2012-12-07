<?php

class alertas extends Main{

    public $idalerta;
    public $descripcion;
    public $idmodulo;
    public $estado;
    public $idperfil;
    
    public function selecciona() {
        if(is_null($this->idalerta)){
            $this->idalerta=0;
        }
        if(is_null($this->idperfil)){
            $this->idperfil='';
        }
        $datos = array($this->idalerta,$this->idperfil);
        $r = $this->get_consulta("pa_selecciona_alertas", $datos);
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
        }
    }
    
    public function activa_alerta() {
        $datos = array($this->idalerta);
        $r = $this->get_consulta("pa_activa_alertas", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }
    
    public function desactiva_alerta() {
        $r = $this->get_consulta("pa_desactiva_alertas");
        $error = $r[1];
        $r = null;
        return $error;
    }
        
}

?>
