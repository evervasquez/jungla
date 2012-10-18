<?php

class profesiones_controlador {
    
    public function grilla() {
        $objProfesiones = new profesiones();
        $objProfesiones->idprofesion = 0;
        $stmt = $objProfesiones->selecciona();
        return $stmt;
    }

    public function selecciona($id) {
        $objProfesiones = new profesiones();
        $objProfesiones->idprofesion = $id;
        $stmt = $objProfesiones->selecciona();
        return $stmt;
    }

}

?>
