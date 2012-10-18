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

    public function elimina($id) {
        $objProfesiones = new profesiones();
        $objProfesiones->idprofesion = $id;
        $error = $objProfesiones->elimina();
        return $error;
    }

    public function inserta($datos) {
        $objProfesiones = new profesiones();
        $objProfesiones->idprofesion = $datos[0];
        $objProfesiones->descripcion = $datos[1];
        $error = $objProfesiones->inserta();
        return $error;
    }

    public function actualiza($datos) {
        $objProfesiones = new profesiones();
        $objProfesiones->idprofesion = $datos[0];
        $objProfesiones->descripcion = $datos[1];
        $error = $objProfesiones->actualiza();
        return $error;
    }
}

?>
