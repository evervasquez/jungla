<?php

class cobros {
    
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
        $r = consulta::procedimientoAlmacenado("pa_selecciona_cobros", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        return $stmt->fetchall(PDO::FETCH_ASSOC);
    }
    
}

?>
