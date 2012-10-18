<?php

class tipo_ruta_controlador {

    public function grilla() {
        $objtiporuta = new tipo_ruta();
        $objtiporuta->idtipo_ruta= 0;
        $stmt = $objtiporuta->selecciona();
        return $stmt;
    }

    public function selecciona($id) {
        $objtiporuta = new tipo_ruta();
        $objtiporuta->idtipo_ruta = $id;
        $stmt = $objtiporuta->selecciona();
        return $stmt;
    }

}

?>
