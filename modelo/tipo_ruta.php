<?php

class tipo_ruta extends Main{

    public $idtipo_ruta;
    public $descripcion;

    public function selecciona() {
        $datos = array($this->idtipo_ruta);
        $r = $this->get_consulta("pa_selecciona_tipo_ruta", $datos);
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
