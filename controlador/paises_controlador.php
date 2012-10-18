<?php

class paises_controlador {

    public function grilla() {
        $objpaises = new paises();
        $objpaises->idpais = 0;
        $stmt = $objpaises->selecciona();
        return $stmt;
    }

    public function selecciona($id) {
        $objpaises = new paises();
        $objpaises->idpais = $id;
        $stmt = $objpaises->selecciona();
        return $stmt;
    }

}

?>
