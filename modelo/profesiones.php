<?php

class profesiones extends Main{

    public $idprofesion;
    public $descripcion;

    public function selecciona() {
        if(is_null($this->idprofesion)){
            $this->idprofesion=0;
        }
        $datos = array($this->idprofesion);
        $r = $this->get_consulta("pa_selecciona_profesiones", $datos);
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

}

?>