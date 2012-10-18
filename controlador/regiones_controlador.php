<?php

class regiones_controlador {

    public function grilla() {
        $objregiones= new regiones();
        $objregiones->idregion= 0;
        $stmt = $objregiones->selecciona();
        return $stmt;
    }

    public function selecciona($id) {
        $objregiones = new regiones();
        $objregiones->idregion= $id;
        $stmt = $objregiones->selecciona();
        return $stmt;
    }

}

?>
