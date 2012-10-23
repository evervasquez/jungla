<?php

class ventas_controlador extends controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function grilla() {
        $objventas = new ventas();
        $objventas->idventa= 0;
        $stmt = $objventas->selecciona();
        return $stmt;
    }

    public function selecciona($id) {
        $objventas = new ventas();
        $objventas->idventa = $id;
        $stmt = $objventas->selecciona();
        return $stmt;
    }

    public function elimina($id) {
        $objventas = new ventas();
        $objventas->idventa = $id;
        $error = $objventas->elimina();
        return $error;
    }

    public function inserta($datos) {
        $objventas = new ventas();
        $objventas->idventa = $datos[0];
        $objventas->fecha_venta = $datos[1];
        $objventas->estado = $datos[2];
        $objventas->observaciones = $datos[3];
        $objventas->nro_documento = $datos[4];
        $objventas->idtipo_comprobante = $datos[5];
        $objventas->idcliente = $datos[6];
        $objventas->idempleado = $datos[7];
        $objventas->idtipo_transaccion = $datos[8];
        $error = $objventas->inserta();
        return $error;
    }

    public function actualiza($datos) {
        $objventas = new ventas();
        $objventas->idventa = $datos[0];
        $objventas->fecha_venta = $datos[1];
        $objventas->estado = $datos[2];
        $objventas->observaciones = $datos[3];
        $objventas->nro_documento = $datos[4];
        $objventas->idtipo_comprobante = $datos[5];
        $objventas->idcliente = $datos[6];
        $objventas->idempleado = $datos[7];
        $objventas->idtipo_transaccion = $datos[8];
        $error = $objventas->actualiza();
        return $error;
    }
    
    public function index() {
        $this->_vista->renderizar('index');
    }
    
    public function nuevo(){
        $this->_vista->renderizar('form');
    }
}

?>
