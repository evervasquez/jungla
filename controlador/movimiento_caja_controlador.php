<?php

class movimiento_caja_controlador extends controller {
    private $_concepto_movimiento;
    private $_ventas;
    public function __construct() {
        $this->_concepto_movimiento=  $this->cargar_modelo('concepto_movimiento');
        $this->_ventas= $this->cargar_modelo('ventas');
        parent::__construct();
    }

    public function index() {
        $this->_vista->datos=  $this->_concepto_movimiento->selecciona();
        $this->_vista->datos_venta= $this->_ventas->selecciona();   
        $this->_vista->renderizar('index');
    }

    
    public function inserta() {
        if ($_POST['guardar'] == 1) {
            
            //if(is_null($POST['idventa']){
            $this->_modulos->estado = $_POST['estado'];
            $this->_modulos->inserta();
            $this->redireccionar('modulos');
            //}else{
                
            //}
        }
        $this->_vista->modulos_padre = $this->_modulos->seleccionar(0);
        $this->_vista->titulo = 'Registrar Modulo';
        $this->_vista->action = BASE_URL . 'modulos/nuevo';
        $this->_vista->setJs(array('funciones_form'));
        $this->_vista->renderizar('form');
    }

    public function actualiza($datos) {
        $objmovimiento_caja = new movimiento_caja();
        $objmovimiento_caja->idmovimiento_caja = $datos[0];
        $objmovimiento_caja->idconcepto_movimiento = $datos[1];
        $objmovimiento_caja->idcaja = $datos[2];
        $objmovimiento_caja->monto = $datos[3];
        $error = $objmovimiento_caja->actualiza();
        return $error;
    }

}

?>
