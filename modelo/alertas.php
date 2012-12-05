<?php

class alertas {

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
            $this->idperfil=0;
        }
        $datos = array($this->idalerta,$this->idperfil);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_alertas", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchall();
    }
    
    public function activa_alerta() {
        $datos = array($this->idalerta);
        $r = consulta::procedimientoAlmacenado("pa_activa_alertas", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }
    
    public function desactiva_alerta() {
        $r = consulta::procedimientoAlmacenado("pa_desactiva_alertas");
        $error = $r[1];
        $r = null;
        return $error;
    }
        
}

?>
