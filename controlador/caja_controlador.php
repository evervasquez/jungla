<?php

class caja_controlador extends controller{
    
    public function __construct() {
        parent::__construct();
    }

    public function index(){
        $this->_vista->renderizar('index');
    }
  
    public function grilla() {
        $objcaja = new caja();
        $objcaja->idcaja= 0;
        $stmt = $objcaja->selecciona();
        return $stmt;
    }

    public function selecciona($id) {
        $objcaja = new caja();
        $objcaja->idcaja = $id;
        $stmt = $objcaja->selecciona();
        return $stmt;
    }

    public function elimina($id) {
        $objcaja = new caja();
        $objcaja->idcaja = $id;
        $error = $objcaja->elimina();
        return $error;
    }

    public function inserta($datos) {
        $objcaja = new caja();
        $objcaja->idcaja= $datos[0];
        $objcaja->estado = $datos[1];
        $objcaja->fecha = $datos[2];
        $objcaja->saldo = $datos[3];
        $objcaja->idempleado = $datos[4];
        $error = $objcaja->inserta();
        return $error;
    }

    public function actualiza($datos) {
        $objcaja = new caja();
        $objcaja->idcaja= $datos[0];
        $objcaja->estado = $datos[1];
        $objcaja->fecha = $datos[2];
        $objcaja->saldo = $datos[3];
        $objcaja->idempleado = $datos[4];
        $error = $objcaja->actualiza();
        return $error;
    }

}

?>
