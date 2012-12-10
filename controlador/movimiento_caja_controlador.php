<?php

class movimiento_caja_controlador extends controller{
    
    private $_movimiento_caja;
    private $_caja;
    private $_concepto_movimiento;

    public function __construct() {
        if (!$this->acceso(52)) {
            $this->redireccionar('error/access/5050');
        }
        parent::__construct();
        $this->_movimiento_caja=  $this->cargar_modelo('movimiento_caja');
        $this->_caja=  $this->cargar_modelo('caja');
        $this->_concepto_movimiento=  $this->cargar_modelo('concepto_movimiento');
    }

    public function index() {
        $this->_vista->datos= $this->_movimiento_caja->selecciona();
        $this->_vista->setJs(array('funcion'));
        $this->_vista->renderizar('index');
    }
    
    public function buscador(){
        if($_POST['filtro']==0){
            $this->_movimiento_caja->descripcion=$_POST['descripcion'];
        }
        echo json_encode($this->_movimiento_caja->selecciona());
    }
    
    public function nuevo(){
        if($_POST['guardar']==1){
            $datos_caja=$this->_caja->selecciona();
            if($datos_caja[0]['ESTADO']==0){
                echo '<script>alert("Aperture la caja antes de cualquier movimiento")</script>';
                $this->redireccionar('caja');
            }
            if(new DateTime($datos_caja[0]['C_FECHA'])!=new DateTime(date('d-m-Y'))){
                echo '<script>alert("Cierre la caja de fecha pasada y aperture la caja para el dia de hoy")</script>';
                $this->redireccionar('caja');
            }
            if($datos_caja[0]['SALDO']<$monto){
                echo '<script>alert("No hay suficiente saldo para ejecutar el pago")</script>';
                $this->redireccionar('caja');
            }
            //insertar movimiento caja
            $this->_movimiento_caja->idconcepto_movimiento=$_POST['concepto'];
            $this->_movimiento_caja->idcaja=$datos_caja[0]['IDCAJA'];
            $this->_movimiento_caja->monto=$_POST['monto'];
            $this->_movimiento_caja->idcompra=0;
            $this->_movimiento_caja->idventa=0;
            $this->_movimiento_caja->inserta();

            //actualiza saldo caja
            $this->_caja->idcaja=$datos_caja[0]['IDCAJA'];
            $this->_caja->saldo=$_POST['monto'];
            $this->_caja->aumenta=0;
            $this->_caja->actualiza();
            $this->redireccionar('movimiento_caja');
            
        }
        $this->_vista->datos_concepto_movimiento=$this->_concepto_movimiento->selecciona();
        $this->_vista->action=BASE_URL.'movimiento_caja/nuevo';
        $this->_vista->titulo='Registrar Movimiento Caja';
        $this->_vista->renderizar('form');
    }
    
}

?>
