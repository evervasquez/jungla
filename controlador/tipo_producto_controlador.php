<?php

class tipo_producto_controlador {

    public function grilla() {
        $objtipoproducto = new tipo_producto();
        $objtipoproducto->idtipo_producto= 0;
        $stmt = $objtipoproducto->selecciona();
        return $stmt;
    }

    public function selecciona($id) {
        $objtipoproducto = new tipo_producto();
        $objtipoproducto->idtipo_producto = $id;
        $stmt = $objtipoproducto->selecciona();
        return $stmt;
    }

    public function elimina($id) {
        $objtipoproducto = new tipo_producto();
        $objtipoproducto->idtipo_producto = $id;
        $error = $objtipoproducto->elimina();
        return $error;
    }

    public function inserta($datos) {
        $objtipoproducto = new tipo_producto();
        $objtipoproducto->idtipo_producto = $datos[0];
        $objtipoproducto->descripcion = $datos[1];
        $error = $objtipoproducto->inserta();
        return $error;
    }

    public function actualiza($datos) {
        $objtipoproducto = new tipo_producto();
        $objtipoproducto->idtipo_producto = $datos[0];
        $objtipoproducto->descripcion = $datos[1];
        $error = $objtipoproducto->actualiza();
        return $error;
    }

}

?>
