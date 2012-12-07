<?php

class empleados extends Main{

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
    public $idactividad;
    public $idtipo_empleado;
    public $perfil;
    public $ubigeo;
    

    public function inserta() {
        $datos = array(0, $this->nombres, $this->apellidos, $this->dni, 
            $this->telefono, $this->direccion, $this->fecha_nacimiento, $this->fecha_contratacion,  
            $this->idubigeo, $this->idperfil, $this->idprofesion, $this->usuario, $this->clave, $this->estado,
            $this->idactividad, $this->idtipo_empleado);
//            echo '<pre>';
//            print_r($datos);
//            echo '</pre>';
//            exit;
        $r = reader::consulta("pa_inserta_actualiza_empleados", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idempleado, $this->nombres, $this->apellidos, $this->dni, 
            $this->telefono, $this->direccion, $this->fecha_nacimiento, $this->fecha_contratacion,  
            $this->idubigeo, $this->idperfil, $this->idprofesion, $this->usuario, $this->clave, $this->estado,
            $this->idactividad, $this->idtipo_empleado);
        $r = $this->get_consulta("pa_inserta_actualiza_empleados", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function selecciona() {
        if(is_null($this->idempleado)){
            $this->idempleado=0;
        }
        if(is_null($this->nombres)){
            $this->nombres='';
        }
        if(is_null($this->apellidos)){
            $this->apellidos='';
        }
        if(is_null($this->perfil)){
            $this->perfil='';
        }
        $datos = array($this->idempleado, $this->nombres, $this->apellidos, $this->perfil);
        $r = $this->get_consulta("pa_selecciona_empleados", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
       if (BaseDatos::$_archivo == 'OCI') {
            oci_fetch_all($stmt, $data, null, null, OCI_FETCHSTATEMENT_BY_ROW);
            return $data;
        } else {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);       
            return $stmt->fetchall();
        }
    }

    public function elimina() {
        $datos = array($this->idempleado);
        $r = $this->get_consulta("pa_elimina_empleados", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }
    
    public function seleccionar($usuario,$clave) {
        $datos = array($usuario,$clave);
        $r = $this->get_consulta("pa_selecciona_login", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        if (BaseDatos::$_archivo == 'OCI') {
            oci_fetch_all($stmt, $data, null, null, OCI_FETCHSTATEMENT_BY_ROW);
            return $data;
        } else {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);       
            return $stmt->fetchall();
//            echo '<pre>';
//            print_r($stmt->fetchall());
//            die();
        }
    }
    
    public function seleccion($usuario,$clave){
         $datos = array($usuario,$clave);
        $r = $this->get_consulta("pa_login_android", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetch();
    }
}

?>
