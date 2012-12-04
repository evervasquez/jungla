<?php

class datos_empresa {

    public $telefono;
    public $ruc;
    public $direccion;
    public $e_mail;
    public $presentacion;
    public $mision;
    public $vision;

    public function selecciona() {
        $r = consulta::procedimientoAlmacenado("pa_selecciona_datos_empresa", $datos);
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
        $datos = array(1, $this->telefono, $this->movistar, $this->rpm, $this->rpc, $this->direccion, $this->e_mail, $this->presentacion, $this->mision, $this->vision);
        $r = consulta::procedimientoAlmacenado("pa_actualiza_datos", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>