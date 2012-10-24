<?php

class plan_contable_controlador extends controller{
//    private $_plan_contable;
    public function __construct() {
        parent::__construct();
//        $this->_plan_contable = $this->carga_modelo('plan_contable');
    }
    public function index(){
//        $this->_plan_contable->idplan_contable = 0;
//        $datos =$this->_plan_contable->selecciona();
//        $this->_vista->datos = $datos;
        $this->_vista->renderiza('index','plan_contable');
    }
    
    public function nuevo(){
        $this->_vista->renderiza('form','plan_contable');
    }
}

?>
