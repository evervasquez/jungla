<?php

class clientes extends Main {

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
    public $direccion;
    public $tipo;
    public $nombresyapellidos;
    public $razonsocial;
    public $dni;
    public $ruc;

    public function inserta() {
        if(is_null($this->apellidos)){
            $this->apellidos=' ';
        }
        $datos = array(0, $this->nombres, $this->apellidos, $this->documento, $this->fecha_nacimiento,
            $this->sexo, $this->telefono, $this->email, $this->estado_civil, $this->idprofesion, $this->idubigeo,
            $this->idmembresia, $this->direccion, $this->tipo);
//            echo '<pre>';
//            print_r($datos);
//            echo '</pre>';
//            exit;
        $r = $this->get_consulta("pa_inserta_actualiza_clientes", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchall();
    }

    public function actualiza() {
        $datos = array($this->idcliente, $this->nombres, $this->apellidos, $this->documento, $this->fecha_nacimiento,
            $this->sexo, $this->telefono, $this->email, $this->estado_civil, $this->idprofesion, $this->idubigeo,
            $this->idmembresia, $this->direccion, $this->tipo);

//        echo '<pre>';
//                print_r($datos);exit;
        $r = $this->get_consulta("pa_inserta_actualiza_clientes", $datos);

        $error = $r[1];
        $r = null;
        return $error;
    }

    public function selecciona() {
        if (is_null($this->idcliente)) {
            $this->idcliente = 0;
        }
        if (is_null($this->nombresyapellidos)) {
            $this->nombresyapellidos = null;
        }
        if (is_null($this->razonsocial)) {
            $this->razonsocial = null;
        }
        if (is_null($this->dni)) {
            $this->dni = null;
        }
        if (is_null($this->ruc)) {
            $this->ruc = null;
        }
        $datos = array($this->idcliente, $this->nombresyapellidos, $this->razonsocial, $this->dni, $this->ruc);
        $r = $this->get_consulta("pa_selecciona_clientes", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        if (conexion::$_servidor == 'oci') {
            oci_fetch_all($stmt, $data, null, null, OCI_FETCHSTATEMENT_BY_ROW);
            return $data;
        } else {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetchall();
        }
    }

}

?>
