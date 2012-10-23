<?php

class ubigeos_controlador {
    
    public function grilla() {
        $objubigeos = new ubigeos();
        $objubigeos->idubigeo= 0;
        $stmt = $objubigeos->selecciona();
        return $stmt;
    }

    public function selecciona($id) {
        $objubigeos = new ubigeos();
        $objubigeos->idubigeo = $id;
        $stmt = $objubigeos->selecciona();
        return $stmt;
    }
}

?>
