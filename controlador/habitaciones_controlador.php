<?php

class habitaciones_controlador {

    public function grilla() {
        $objhabitaciones = new habitaciones();
        $objhabitaciones->idhabitacion= 0;
        $stmt = $objhabitaciones->selecciona();
        return $stmt;
    }

    public function selecciona($id) {
        $objhabitaciones = new habitaciones();
        $objhabitaciones->idhabitacion = $id;
        $stmt = $objhabitaciones->selecciona();
        return $stmt;
    }

    public function elimina($id) {
        $objhabitaciones = new habitaciones();
        $objhabitaciones->idhabitacion = $id;
        $error = $objhabitaciones->elimina();
        return $error;
    }

    public function inserta($datos) {
        $objhabitaciones = new habitaciones();
        $objhabitaciones->idhabitacion = $datos[0];
        $objhabitaciones->descripcion = $datos[1];
        $objhabitaciones->nro_habitacion = $datos[2];
        $error = $objhabitaciones->inserta();
        return $error;
    }

    public function actualiza($datos) {
        $objhabitaciones = new habitaciones();
        $objhabitaciones->idhabitacion = $datos[0];
        $objhabitaciones->descripcion = $datos[1];
        $objhabitaciones->nro_habitacion = $datos[2];
        $error = $objhabitaciones->actualiza();
        return $error;
    }

}

?>
