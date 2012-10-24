<?php

class productos_controlador extends controller {
<<<<<<< HEAD
   
    public function __construct() {
        parent::__construct();
    }
=======

    
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        $this->_vista->renderizar('index');
    }
    
    public function nuevo(){
        $this->_vista->renderizar('form');
    }
>>>>>>> be527ada5f408713e5f1fc2ec43188a2758599bd

    public function grilla() {
        $objproductos = new productos();
        $objproductos->idproducto = 0;
        $stmt = $objproductos->selecciona();
        return $stmt;
    }

    public function selecciona($id) {
        $objproductos = new productos();
        $objproductos->idproducto = $id;
        $stmt = $objproductos->selecciona();
        return $stmt;
    }

    public function elimina($id) {
        $objproductos = new productos();
        $objproductos->idproducto = $id;
        $error = $objproductos->elimina();
        return $error;
    }

    public function inserta($datos) {
        $objproductos = new productos();
        $objproductos->idproducto = $datos[0];
        $objproductos->descripcion = $datos[1];
        $objproductos->precio_unitario = $datos[2];
        $objproductos->observaciones = $datos[3];
        $objproductos->idservicio = $datos[4];
        $objproductos->idtipo_producto = $datos[5];
        $objproductos->idunidad_medida = $datos[6];
        $objproductos->idubicacion = $datos[7];
        $objproductos->idpromocion = $datos[8];
        $objproductos->stock = $datos[9];
        $objproductos->estado = $datos[10];
        $objproductos->precio_compra = $datos[11];
        $error = $objproductos->inserta();
        return $error;
    }

    public function actualiza($datos) {
        $objproductos = new productos();
        $objproductos->idproducto = $datos[0];
        $objproductos->descripcion = $datos[1];
        $objproductos->precio_unitario = $datos[2];
        $objproductos->observaciones = $datos[3];
        $objproductos->idservicio = $datos[4];
        $objproductos->idtipo_producto = $datos[5];
        $objproductos->idunidad_medida = $datos[6];
        $objproductos->idubicacion = $datos[7];
        $objproductos->idpromocion = $datos[8];
        $objproductos->stock = $datos[9];
        $objproductos->estado = $datos[10];
        $objproductos->precio_compra = $datos[11];
        $error = $objproductos->actualiza();
        return $error;
    }
}

?>
