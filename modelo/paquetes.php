<?php

class paquetes {

    public $idpaquete;
    public $descuento;
    public $costo;
    public $descripcion;

    public function selecciona() {
        if(is_null($this->idpaquete)){
            $this->idpaquete=0;
        }
        if(is_null($this->descripcion)){
            $this->descripcion='';
        }
        $datos = array($this->idpaquete);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_paquetes", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        return $stmt->fetchall(PDO::FETCH_ASSOC);
    }

    public function elimina() {
        $datos = array($this->idpaquete);
        $r = consulta::procedimientoAlmacenado("pa_elimina_paquetes", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function inserta() {
        $datos = array(0, $this->descuento, $this->costo, $this->descripcion);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_paquetes", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualiza() {
        $datos = array($this->idpaquete, $this->descuento, $this->costo, $this->descripcion);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_paquetes", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>