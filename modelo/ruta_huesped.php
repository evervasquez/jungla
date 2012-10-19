<?php

class ruta_huesped {

    public $idruta_huesped;
    public $observaciones;
    public $idtipo_ruta;
    public $idubigeo;
    public $idcliente;
    

    public function inserta() {
        $datos = array($this->idruta_huesped, $this->observaciones, $this->idtipo_ruta, $this->idubigeo, 
            $this->idcliente);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_ruta_huesped", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idruta_huesped, $this->observaciones, $this->idtipo_ruta, $this->idubigeo, 
            $this->idcliente);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_ruta_huesped", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function selecciona() {
        $datos = array($this->idruta_huesped);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_ruta_huesped", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        return $stmt;
    }

    public function elimina() {
        $datos = array($this->idruta_huesped);
        $r = consulta::procedimientoAlmacenado("pa_elimina_ruta_huesped", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>
