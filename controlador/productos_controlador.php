<?php

class productos_controlador {

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
        $error = $objproductos->inserta();
        return $error;
    }

    public function actualiza($datos) {
        $objproductos = new productos();
        $objproductos->idproducto = $datos[0];
        $objproductos->descripcion = $datos[1];
        $error = $objproductos->actualiza();
        return $error;
    }

}

?>
