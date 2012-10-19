<?php

class empleados_controlador {

    public function grilla() {
        $objempleados = new empleados();
        $objempleados->idempleado = 0;
        $stmt = $objempleados->selecciona();
        return $stmt;
    }

    public function selecciona($id) {
        $objempleados = new empleados();
        $objempleados->idempleado = $id;
        $stmt = $objempleados->selecciona();
        return $stmt;
    }

    public function elimina($id) {
        $objempleados = new empleados();
        $objempleados->idempleado = $id;
        $error = $objempleados->elimina();
        return $error;
    }

    public function inserta($datos) {
        $objempleados = new empleados();
        $objempleados->idempleado = $datos[0];
        $objempleados->nombres = $datos[1];
        $objempleados->apellidos = $datos[2];
        $objempleados->dni = $datos[3];
        $objempleados->telefono = $datos[4];
        $objempleados->direccion = $datos[5];
        $objempleados->fecha_nacimiento = $datos[6];
        $objempleados->fecha_contratacion = $datos[7];
        $objempleados->idubigeo = $datos[8];
        $objempleados->idperfil = $datos[9];
        $objempleados->idprofesion = $datos[10];
        $objempleados->usuario = $datos[11];
        $objempleados->clave = $datos[12];
        $objempleados->estado = $datos[13];
        $error = $objempleados->inserta();
        return $error;
    }

    public function actualiza($datos) {
        $objempleados = new empleados();
        $objempleados->idempleado = $datos[0];
        $objempleados->nombres = $datos[1];
        $objempleados->apellidos = $datos[2];
        $objempleados->dni = $datos[3];
        $objempleados->telefono = $datos[4];
        $objempleados->direccion = $datos[5];
        $objempleados->fecha_nacimiento = $datos[6];
        $objempleados->fecha_contratacion = $datos[7];
        $objempleados->idubigeo = $datos[8];
        $objempleados->idperfil = $datos[9];
        $objempleados->idprofesion = $datos[10];
        $objempleados->usuario = $datos[11];
        $objempleados->clave = $datos[12];
        $objempleados->estado = $datos[13];
        $error = $objempleados->actualiza();
        return $error;
    }

    public function valida_login($usuario, $clave) {
        $objempleados = new empleados();
        $objempleados->idempleado = 0;
        $stmt = $objempleados->selecciona();
        $existe = false;
        while ($f = $stmt->fetch()) {
            if ($f['usuario'] == $usuario && $f['clave'] == $clave) {
                $existe = true;
            } else {
                $existe = false;
            }
        }
    }

}

?>
