<?php

class proveedores_controlador extends controller{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        $this->_vista->renderizar('index');
    }
    
    public function nuevo(){
        $this->_vista->renderizar('form');
    }

    public function grilla() {
        $objproveedores = new proveedores();
        $objproveedores->idproveedor= 0;
        $stmt = $objproveedores->selecciona();
        return $stmt;
    }

    public function selecciona($id) {
        $objproveedores = new proveedores();
        $objproveedores->idproveedor = $id;
        $stmt = $objproveedores->selecciona();
        return $stmt;
    }

    public function elimina($id) {
        $objproveedores = new proveedores();
        $objproveedores->idproveedor = $id;
        $error = $objproveedores->elimina();
        return $error;
    }

    public function inserta($datos) {
        $objproveedores = new proveedores();
        $objproveedores->idproveedor = $datos[0];
        $objproveedores->razon_social = $datos[1];
        $objproveedores->representante = $datos[2];
        $objproveedores->ruc = $datos[3];
        $objproveedores->telefono = $datos[4];
        $objproveedores->direccion = $datos[5];
        $objproveedores->email = $datos[6];
        $objproveedores->idubigeo = $datos[7];
        $error = $objproveedores->inserta();
        return $error;
    }

    public function actualiza($datos) {
        $objproveedores = new proveedores();
        $objproveedores->idproveedor = $datos[0];
        $objproveedores->razon_social = $datos[1];
        $objproveedores->representante = $datos[2];
        $objproveedores->ruc = $datos[3];
        $objproveedores->telefono = $datos[4];
        $objproveedores->direccion = $datos[5];
        $objproveedores->email = $datos[6];
        $objproveedores->idubigeo = $datos[7];
        $error = $objproveedores->actualiza();
        return $error;
    }

}

?>
