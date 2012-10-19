<?php

class modulos_controlador {

    public function grilla() {
        $objmodulos = new modulos();
        $objmodulos->idmodulo= 0;
        $stmt = $objmodulos->selecciona();
        return $stmt;
    }

    public function selecciona($id) {
        $objmodulos = new modulos();
        $objmodulos->idmodulo = $id;
        $stmt = $objmodulos->selecciona();
        return $stmt;
    }

    public function elimina($id) {
        $objmodulos = new modulos();
        $objmodulos->idmodulo = $id;
        $error = $objmodulos->elimina();
        return $error;
    }

    public function inserta($datos) {
        $objmodulos = new modulos();
        $objmodulos->idmodulo = $datos[0];
        $objmodulos->descripcion= $datos[1];
        $objmodulos->url = $datos[2];
        $objmodulos->estado = $datos[3];
        $objmodulos->idmodulo_padre = $datos[4];
        $error = $objmodulos->inserta();
        return $error;
    }

    public function actualiza($datos) {
        $objmodulos = new modulos();
        $objmodulos->idmodulo = $datos[0];
        $objmodulos->descripcion= $datos[1];
        $objmodulos->url = $datos[2];
        $objmodulos->estado = $datos[3];
        $objmodulos->idmodulo_padre = $datos[4];
        $error = $objmodulos->actualiza();
        return $error;
    }

}

?>
