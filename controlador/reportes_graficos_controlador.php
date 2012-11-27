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
class reportes_graficos_controlador extends controller {

    private $_reportes_graficos;

    //put your code here
    public function __construct() {
        if (!$this->acceso(45)) {
            $this->redireccionar('error/access/5050');
            parent::__construct();
        }
        $this->get_Libreria('highchart' . DS . 'Highchart');
        parent::__construct();
        $this->_vista->setJs(array('funciones'));
        $this->_vista->setCss(array('estilos'));
        $this->_reportes_graficos = $this->cargar_modelo('reportes_graficos');
    }

    public function index() {
        $this->_vista->renderizar('index');
    }

    public function r_ventas() {
        $this->_reportes_graficos->anio=2012;
        $this->_vista->datos= $this->_reportes_graficos->reporte_ventas();
        $this->_vista->renderizar_reporte('r_ventas');
    }

    public function r_estadias() {
        //recibimos por post el año
        $this->_reportes_graficos->anio=2012;
        $this->_vista->datos= $this->_reportes_graficos->reporte_estadias();
        $this->_vista->renderizar_reporte('r_estadias');
    }

    public function r_pasajeros() {
        $this->_reportes_graficos->anio=2012;
        $this->_vista->datos= $this->_reportes_graficos->reporte_pasajero();
//        echo '<pre>';
//        print_r($this->_vista->datos);
//        exit;
        $this->_vista->renderizar_reporte('r_pasajeros');
    }

}

?>
