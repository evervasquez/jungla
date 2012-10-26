<?php

class proveedores {

    public $idproveedor;
    public $razon_social;
    public $representante;
    public $ruc;
    public $telefono;
    public $direccion;
    public $email;
    public $idubigeo;

    public function inserta() {
        $datos = array($this->idproveedor, $this->razon_social, $this->representante, $this->ruc, 
            $this->telefono, $this->direccion, $this->email, $this->idubigeo);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_proveedores", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idproveedor, $this->razon_social, $this->representante, $this->ruc, 
            $this->telefono, $this->direccion, $this->email, $this->idubigeo);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_proveedores", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function selecciona() {
        $datos = array($this->idproveedor);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_proveedores", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        return $stmt->fetchall();
    }
    
    public function elimina() {
        $datos = array($this->idproveedor);
        $r = consulta::procedimientoAlmacenado("pa_elimina_promociones", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>
