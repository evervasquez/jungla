<?php

class paquetes {

    public $idpaquete;
    public $descuento;
    public $costo;

    public function selecciona() {
        $datos = array($this->idpaquete);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_paquetes", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        return $stmt->fetch();
    }

    public function elimina() {
        $datos = array($this->idpaquete);
        $r = consulta::procedimientoAlmacenado("pa_elimina_paquetes", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function inserta() {
        $datos = array($this->idpaquete, $this->descuento, $this->costo);
        $r = consulta::procedimientoAlmacenado("pa_inserta_paquetes", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idpaquete, $this->descuento, $this->costo);
        $r = consulta::procedimientoAlmacenado("pa_actualiza_paquetes", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>