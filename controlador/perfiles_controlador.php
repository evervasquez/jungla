<?php

class perfiles_controlador {

    public function grilla() {
        $objperfiles = new perfiles();
        $objperfiles->idperfil = 0;
        $stmt = $objperfiles->selecciona();
        return $stmt;
    }

    public function selecciona($id) {
        $objperfiles = new perfiles();
        $objperfiles->idperfil = $id;
        $stmt = $objperfiles->selecciona();
        return $stmt;
    }

    public function elimina($id) {
        $objperfiles = new perfiles();
        $objperfiles->idperfil = $id;
        $error = $objperfiles->elimina();
        return $error;
    }

    public function inserta($datos) {
        $objperfiles = new perfiles();
        $objperfiles->idperfil = $datos[0];
        $objperfiles->descripcion = $datos[1];
        $error = $objperfiles->inserta();
        return $error;
    }

    public function actualiza($datos) {
        $objperfiles = new perfiles();
        $objperfiles->idperfil= $datos[0];
        $objperfiles->descripcion = $datos[1];
        $error = $objperfiles->actualiza();
        return $error;
    }

}

?>
