<?php

class mensajes extends Main{

    public $idmensaje;
    public $nombre;
    public $email;
    public $telefono;
    public $mensaje;
    public $fecha;
    public $estado;

    public function selecciona() {
        if(is_null($this->idmensaje)){
            $this->idmensaje=0;
        }
        if(is_null($this->nombre)){
            $this->nombre='';
        }
        if(is_null($this->email)){
            $this->email='';
        }
        $datos = array($this->idmensaje, $this->nombre, $this->email);
        $r = $this->get_consulta("pa_selecciona_mensajes", $datos);
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
        };
    }

    public function elimina() {
        $datos = array($this->idmensaje);
        $r = $this->get_consulta("pa_elimina_mensajes", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function inserta() {
        $datos = array(0, $this->nombre, $this->email, $this->telefono, $this->mensaje, $this->fecha, $this->estado);
        $r = $this->get_consulta("pa_inserta_mensajes", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }
    
    public function estado(){
        $datos = array($this->idmensaje);
        $r = $this->get_consulta("pa_estado_mensajes", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>