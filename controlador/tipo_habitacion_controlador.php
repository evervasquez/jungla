<?php

class tipo_habitacion_controlador {

    public function grilla() {
        $objtipohabitacion = new tipo_habitacion();
        $objtipohabitacion->idtipo_habitacion = 0;
        $stmt = $objtipohabitacion->selecciona();
        return $stmt;
    }

    public function selecciona($id) {
        $objtipohabitacion = new tipo_habitacion();
        $objtipohabitacion->idtipo_habitacion = $id;
        $stmt = $objtipohabitacion->selecciona();
        return $stmt;
    }

    public function elimina($id) {
        $objtipohabitacion = new tipo_habitacion();
        $objtipohabitacion->idtipo_habitacion = $id;
        $error = $objtipohabitacion->elimina();
        return $error;
    }

    public function inserta($datos) {
        $objtipohabitacion = new tipo_habitacion();
        $objtipohabitacion->idtipo_habitacion = $datos[0];
        $objtipohabitacion->descripcion = $datos[1];
        $error = $objtipohabitacion->inserta();
        return $error;
    }

    public function actualiza($datos) {
        $objtipohabitacion = new tipo_habitacion();
        $objtipohabitacion->idtipo_habitacion = $datos[0];
        $objtipohabitacion->descripcion = $datos[1];
        $error = $objtipohabitacion->actualiza();
        return $error;
    }

}

?>
