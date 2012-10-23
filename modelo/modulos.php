<?php

class modulos {

    public $idmodulo;
    public $descripcion;
    public $url;
    public $estado;
    public $idmodulo_padre;
    

    public function inserta() {
        $datos = array($this->idmodulo, $this->descripcion, $this->url, $this->estado, 
            $this->idmodulo_padre);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_modulos", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idmodulo, $this->descripcion, $this->url, $this->estado, 
            $this->idmodulo_padre);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_modulos", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function selecciona() {
        $datos = array($this->idmodulo);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_modulos", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        return $stmt->fetch();
    }

    public function elimina() {
        $datos = array($this->idmodulo);
        $r = consulta::procedimientoAlmacenado("pa_elimina_modulos", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>
