<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of reportes_graficos
 *
 * @author eveR
 */
class reportes_graficos_controlador extends controller {
    private $_modulos;
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->_modulos = $this->cargar_modelo('modulos');
    }
    
    public function index() {
        $this->_vista->renderizar('index');
    }
    
    public function reporte_ventas(){
        $this->_vista->setJs(array('highcharts','funciones','grid','exporting'));
        $this->_modulos->idmodulo = 0;
        $this->_modulos->descripcion = '';
        $this->_modulos->modulo_padre = '';
        $this->_vista->datos = json_encode($this->_modulos->selecciona());
        //die($this->_vista->datos);
        $this->_vista->renderizar('r_ventas');
    }
}

?>
