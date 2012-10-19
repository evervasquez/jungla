<?php

class producto_paquete_controlador {

    public function grilla() {
        $objProducto_paquete = new producto_paquete();
        $objProducto_paquete->idpaquete = 0;
        $objProducto_paquete->idproducto = 0;
        $stmt = $objProducto_paquete->selecciona();
        return $stmt;
    }

    public function selecciona($ids) {
        $objProducto_paquete = new producto_paquete();
        $objProducto_paquete->idpaquete = $ids[0];
        $objProducto_paquete->idproducto = $ids[1];
        $stmt = $objProducto_paquete->selecciona();
        return $stmt;
    }

    public function elimina($ids) {
        $objProducto_paquete = new producto_paquete();
        $objProducto_paquete->idpaquete = $ids[0];
        $objProducto_paquete->idproducto = $ids[1];
        $error = $objProducto_paquete->elimina();
        return $error;
    }

    public function inserta($datos) {
        $objProducto_paquete = new producto_paquete();
        $objProducto_paquete->idalmacen = $datos[0];
        $objProducto_paquete->descripcion = $datos[1];
        $error = $objProducto_paquete->inserta();
        return $error;
    }

    public function actualiza($datos) {
        $objProducto_paquete = new producto_paquete();
        $objProducto_paquete->idalmacen = $datos[0];
        $objProducto_paquete->descripcion = $datos[1];
        $error = $objProducto_paquete->actualiza();
        return $error;
    }

}

?>
