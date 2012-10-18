<?php

class servicios_controlador {

    public function grilla() {
        $objservicios = new servicios();
        $objservicios->idservicio= 0;
        $stmt = $objservicios->selecciona();
        return $stmt;
    }

    public function selecciona($id) {
        $objservicios = new servicios();
        $objservicios->idservicio = $id;
        $stmt = $objservicios->selecciona();
        return $stmt;
    }

    public function elimina($id) {
        $objservicios = new servicios();
        $objservicios->idservicio = $id;
        $error = $objservicios->elimina();
        return $error;
    }

    public function inserta($datos) {
        $objservicios = new servicios();
        $objservicios->idservicio = $datos[0];
        $objservicios->descripcion = $datos[1];
        $error = $objservicios->inserta();
        return $error;
    }

    public function actualiza($datos) {
        $objservicios = new servicios();
        $objservicios->idservicio = $datos[0];
        $objservicios->descripcion = $datos[1];
        $error = $objservicios->actualiza();
        return $error;
    }

}

?>
