<?php

class mensajes {

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
        $r = consulta::procedimientoAlmacenado("pa_selecciona_mensajes", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchall();
    }

    public function elimina() {
        $datos = array($this->idmensaje);
        $r = consulta::procedimientoAlmacenado("pa_elimina_mensajes", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function inserta() {
        $datos = array(0, $this->nombre, $this->email, $this->telefono, $this->mensaje, $this->fecha, $this->estado);
        $r = consulta::procedimientoAlmacenado("pa_inserta_mensajes", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }
    
    public function estado(){
        $datos = array($this->idmensaje);
        $r = consulta::procedimientoAlmacenado("pa_estado_mensajes", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>