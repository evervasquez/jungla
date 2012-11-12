<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of reportes_graf
 *
 * @author eveR
 */
class reportes_graficos {
    //put your code here
    
        public function reporte_pasajero() {
        $datos = array($this->codigo_region, $this->idpais);
        //pa_reporte_pasajeros->procedimiento de pasajeros nacionales e internacionales por mes
        $r = consulta::procedimientoAlmacenado("pa_reporte_pasajeros", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchall();
    }
    
    public function reporte_estadias() {
        $datos = array($this->codigo_region, $this->idpais);
        //pa_reporte_estadias->estadias x mes
        //en porcentaje
        $r = consulta::procedimientoAlmacenado("pa_reporte_estadias", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchall();
    }
    
    public function reporte_ventas() {
        $datos = array($this->codigo_region, $this->idpais);
        //pa_reporte_ventas->ventas x mes
        $r = consulta::procedimientoAlmacenado("pa_reporte_ventas", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchall();
    }
}

?>
