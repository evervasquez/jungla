<?php

class tipo_comprobante_controlador {
    
    public function grilla() {
        $objTipo_comprobante = new tipo_comprobante();
        $objTipo_comprobante->idtipo_comprobante = 0;
        $stmt = $objTipo_comprobante->selecciona();
        return $stmt;
    }

    public function selecciona($id) {
        $objTipo_comprobante = new tipo_comprobante();
        $objTipo_comprobante->idtipo_comprobante = $id;
        $stmt = $objTipo_comprobante->selecciona();
        return $stmt;
    }

    public function elimina($id) {
        $objTipo_comprobante = new tipo_comprobante();
        $objTipo_comprobante->idtipo_comprobante = $id;
        $error = $objTipo_comprobante->elimina();
        return $error;
    }

    public function inserta($datos) {
        $objTipo_comprobante = new tipo_comprobante();
        $objTipo_comprobante->idtipo_comprobante = $datos[0];
        $objTipo_comprobante->descripcion = $datos[1];
        $objTipo_comprobante->serie = $datos[2];
        $objTipo_comprobante->correlativo = $datos[3];
        $error = $objTipo_comprobante->inserta();
        return $error;
    }

    public function actualiza($datos) {
        $objTipo_comprobante = new tipo_comprobante();
        $objTipo_comprobante->idtipo_comprobante = $datos[0];
        $objTipo_comprobante->descripcion = $datos[1];
        $objTipo_comprobante->serie = $datos[2];
        $objTipo_comprobante->correlativo = $datos[3];
        $error = $objTipo_comprobante->actualiza();
        return $error;
    }
}
?>
