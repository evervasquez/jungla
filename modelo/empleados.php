<?php

class empleados {

    public $idempleado;
    public $nombres;
    public $apellidos;
    public $dni;
    public $telefono;
    public $direccion;
    public $fecha_nacimiento;
    public $fecha_contratacion;
    public $idubigeo;
    public $idperfil;
    public $idprofesion;
    public $usuario;
    public $clave;
    public $estado;
    

    public function inserta() {
        $datos = array($this->idempleado, $this->nombres, $this->apellidos, $this->dni, 
            $this->telefono, $this->direccion, $this->fecha_nacimiento, $this->fecha_contratacion,  
            $this->idubigeo, $this->idperfil, $this->idprofesion, $this->usuario, $this->clave, $this->estado);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_empleados", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idempleado, $this->nombres, $this->apellidos, $this->dni, 
            $this->telefono, $this->direccion, $this->fecha_nacimiento, $this->fecha_contratacion,  
            $this->idubigeo, $this->idperfil, $this->idprofesion, $this->usuario, $this->clave, $this->estado);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_empleados", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function selecciona() {
        $datos = array($this->idempleado);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_empleados", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        return $stmt->fetch();
    }

    public function elimina() {
        $datos = array($this->idempleado);
        $r = consulta::procedimientoAlmacenado("pa_elimina_empleados", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }
    
    public function selecciona($usuario,$clave) {
        $datos = array($usuario,$clave);
        $r = consulta::procedimientoAlmacenado("pa_valida_login", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        return $stmt->fetch();
    }

}

?>
