<?php

class ruta_huesped extends Main{

    public $idruta_huesped;
    public $observaciones;
    public $idtipo_ruta;
    public $idubigeo;
    public $idcliente;
    

    public function inserta() {
        $datos = array($this->idruta_huesped, $this->observaciones, $this->idtipo_ruta, $this->idubigeo, 
            $this->idcliente);
        $r = $this->get_consulta("pa_inserta_actualiza_ruta_huesped", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idruta_huesped, $this->observaciones, $this->idtipo_ruta, $this->idubigeo, 
            $this->idcliente);
        $r = $this->get_consulta("pa_inserta_actualiza_ruta_huesped", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function selecciona() {
        $datos = array($this->idruta_huesped);
        $r = $this->get_consulta("pa_selecciona_ruta_huesped", $datos);
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
        };
    }

    public function elimina() {
        $datos = array($this->idruta_huesped);
        $r = $this->get_consulta("pa_elimina_ruta_huesped", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>
