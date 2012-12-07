<?php

class tipo_empleado extends Main{

    public $idtipo_empleado;
    public $descripcion;

    public function selecciona() {
        if(is_null($this->idtipo_empleado)){
            $this->idtipo_empleado=0;
        }
        $datos = array($this->idtipo_empleado);
        $r = $this->get_consulta("pa_selecciona_tipo_empleado", $datos);
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
