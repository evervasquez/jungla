<?php

class clientes_controlador {

    public function grilla() {
        $objclientes = new clientes();
        $objclientes->idcliente= 0;
        $stmt = $objclientes->selecciona();
        return $stmt;
    }

    public function selecciona($id) {
        $objclientes = new clientes();
        $objclientes->idcliente = $id;
        $stmt = $objclientes->selecciona();
        return $stmt;
    }

    public function inserta($datos) {
        $objclientes = new clientes();
        $objclientes->idcliente = $datos[0];
        $objclientes->nombres = $datos[1];
        $objclientes->apellidos = $datos[2];
        $objclientes->documento = $datos[3];
        $objclientes->fecha_nacimiento = $datos[4];
        $objclientes->sexo = $datos[5];
        $objclientes->telefono = $datos[6];
        $objclientes->email = $datos[7];
        $objclientes->estado_civil = $datos[8];
        $objclientes->idprofesion = $datos[9];
        $objclientes->idubigeo = $datos[10];
        $objclientes->idmembresia = $datos[11];
        $error = $objclientes->inserta();
        return $error;
    }

    public function actualiza($datos) {
        $objclientes = new clientes();
        $objclientes->idcliente = $datos[0];
        $objclientes->nombres = $datos[1];
        $objclientes->apellidos = $datos[2];
        $objclientes->documento = $datos[3];
        $objclientes->fecha_nacimiento = $datos[4];
        $objclientes->sexo = $datos[5];
        $objclientes->telefono = $datos[6];
        $objclientes->email = $datos[7];
        $objclientes->estado_civil = $datos[8];
        $objclientes->idprofesion = $datos[9];
        $objclientes->idubigeo = $datos[10];
        $objclientes->idmembresia = $datos[11];
        $error = $objclientes->actualiza();
        return $error;
    }

}

?>
