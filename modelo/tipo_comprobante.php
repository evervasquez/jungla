<?php

class tipo_comprobante {

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
        $r = consulta::procedimientoAlmacenado("pa_selecciona_tipo_comprobante", $datos);
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