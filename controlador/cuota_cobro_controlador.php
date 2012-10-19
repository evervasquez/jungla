<?php

class cuota_cobro_controlador {
    
    public function grilla() {
        $objCuota_cobro = new cuota_cobro();
        $objCuota_cobro->idcuota_cobro = 0;
        $stmt = $objCuota_cobro->selecciona();
        return $stmt;
    }

    public function selecciona($id) {
        $objCuota_cobro = new cuota_cobro();
        $objCuota_cobro->idcuota_cobro = $id;
        $stmt = $objCuota_cobro->selecciona();
        return $stmt;
    }

    public function elimina($id) {
        $objCuota_cobro = new cuota_cobro();
        $objCuota_cobro->idcuota_cobro = $id;
        $error = $objCuota_cobro->elimina();
        return $error;
    }

    public function inserta($datos) {
        $objCuota_cobro = new cuota_cobro();
        $objCuota_cobro->idcuota_cobro = $datos[0];
        $objCuota_cobro->idventa = $datos[1];
        $objCuota_cobro->fecha_cobro = $datos[2];
        $objCuota_cobro->nro_cobro = $datos[3];
        $objCuota_cobro->monto_cuota = $datos[4];
        $objCuota_cobro->interes = $datos[5];
        $objCuota_cobro->fecha_vencimiento = $datos[6];
        $objCuota_cobro->monto_cobrado = $datos[7];
        $error = $objCuota_cobro->inserta();
        return $error;
    }

    public function actualiza($datos) {
        $objCuota_cobro = new cuota_cobro();
        $objCuota_cobro->idcuota_cobro = $datos[0];
        $objCuota_cobro->idventa = $datos[1];
        $objCuota_cobro->fecha_cobro = $datos[2];
        $objCuota_cobro->nro_cobro = $datos[3];
        $objCuota_cobro->monto_cuota = $datos[4];
        $objCuota_cobro->interes = $datos[5];
        $objCuota_cobro->fecha_vencimiento = $datos[6];
        $objCuota_cobro->monto_cobrado = $datos[7];
        $error = $objCuota_cobro->actualiza();
        return $error;
    }
}
?>
