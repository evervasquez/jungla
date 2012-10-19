<?php

class articulos_controlador {
    
    public function grilla() {
        $objArticulos = new articulos();
        $objArticulos->idarticulo = 0;
        $stmt = $objArticulos->selecciona();
        return $stmt;
    }

    public function selecciona($id) {
        $objArticulos = new articulos();
        $objArticulos->idarticulo = $id;
        $stmt = $objArticulos->selecciona();
        return $stmt;
    }

    public function elimina($id) {
        $objArticulos = new articulos();
        $objArticulos->idarticulo = $id;
        $error = $objArticulos->elimina();
        return $error;
    }

    public function inserta($datos) {
        $objArticulos = new articulos();
        $objArticulos->idarticulo = $datos[0];
        $objArticulos->titulo = $datos[1];
        $objArticulos->descripcion = $datos[2];
        $objArticulos->idmodulo = $datos[3];
        $error = $objArticulos->inserta();
        return $error;
    }

    public function actualiza($datos) {
        $objArticulos = new articulos();
        $objArticulos->idarticulo = $datos[0];
        $objArticulos->titulo = $datos[1];
        $objArticulos->descripcion = $datos[2];
        $objArticulos->idmodulo = $datos[3];
        $error = $objArticulos->actualiza();
        return $error;
    }
}
?>
