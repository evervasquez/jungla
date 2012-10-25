<?php

class clientes {

    public $idcliente;
    public $nombres;
    public $apellidos;
    public $documento;
    public $fecha_nacimiento;
    public $sexo;
    public $telefono;
    public $email;
    public $estado_civil;
    public $idprofesion;
    public $idubigeo;
    public $idmembresia;        

    public function inserta() {
        $datos = array($this->idcliente, $this->nombres, $this->apellidos, $this->documento, 
            $this->fecha_nacimiento, $this->sexo, $this->telefono, $this->email,  
            $this->estado_civil, $this->idprofesion, $this->idubigeo, $this->idmembresia);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_clientes", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idcliente, $this->nombres, $this->apellidos, $this->documento, 
            $this->fecha_nacimiento, $this->sexo, $this->telefono, $this->email,  
            $this->estado_civil, $this->idprofesion, $this->idubigeo, $this->idmembresia);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_clientes", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function selecciona() {
        $datos = array($this->idcliente);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_clientes", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        return $stmt->fetchall();
    }

}

?>
