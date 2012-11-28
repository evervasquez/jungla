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
    public $anio;

    public function reporte_pasajero() {
        if (is_null($this->anio)) {
           $this->anio=  getdate('Y') ;
        }
        $datos = array($this->anio);
        //pa_reporte_pasajeros->procedimiento de pasajeros nacionales e internacionales por mes
        $r = consulta::procedimientoAlmacenado("pasajeros_porcentaje_nacionales_internacionales", $datos);
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
         if (is_null($this->anio)) {
           $this->anio=  getdate('Y') ;
        }
        $datos = array($this->anio);
        //pa_reporte_estadias->estadias x mes
        //en porcentaje
        $r = consulta::procedimientoAlmacenado("pa_estadias_mes", $datos);
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
         if (is_null($this->anio)) {
           $this->anio=  getdate('Y') ;
        }
        $datos = array($this->anio);
        //pa_reporte_ventas->ventas x mes
        $r = consulta::procedimientoAlmacenado("pa_reporte_ventasxestadia", $datos);
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
