<?php

class compras_controlador {

    public function grilla() {
        $objcompras = new compras();
        $objcompras->idcompra= 0;
        $stmt = $objcompras->selecciona();
        return $stmt;
    }

    public function selecciona($id) {
        $objcompras = new compras();
        $objcompras->idcompra = $id;
        $stmt = $objcompras->selecciona();
        return $stmt;
    }

    public function elimina($id) {
        $objcompras = new compras();
        $objcompras->idcompra = $id;
        $error = $objcompras->elimina();
        return $error;
    }

    public function inserta($datos) {
        $objcompras = new compras();
        $objcompras->idcompra = $datos[0];
        $objcompras->fecha_compra = $datos[1];
        $objcompras->estado = $datos[2];
        $objcompras->observaciones = $datos[3];
        $objcompras->nro_comprobante = $datos[4];
        $objcompras->importe = $datos[5];
        $objcompras->igv = $datos[6];
        $objcompras->idproveedor = $datos[7];
        $objcompras->idtipo_transaccion = $datos[8];
        $error = $objcompras->inserta();
        return $error;
    }

    public function actualiza($datos) {
        $objcompras = new compras();
        $objcompras->idcompra = $datos[0];
        $objcompras->fecha_compra = $datos[1];
        $objcompras->estado = $datos[2];
        $objcompras->observaciones = $datos[3];
        $objcompras->nro_comprobante = $datos[4];
        $objcompras->importe = $datos[5];
        $objcompras->igv = $datos[6];
        $objcompras->idproveedor = $datos[7];
        $objcompras->idtipo_transaccion = $datos[8];
        $error = $objcompras->actualiza();
        return $error;
    }

}

?>
