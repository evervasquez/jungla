<?php

class reserva_controlador extends controller{
    
    private $_habitaciones;
    private $_ventas;
    private $_detalle_estadia;
    
    public function __construct() {
        parent::__construct();
        $this->_habitaciones = $this->cargar_modelo('habitaciones');
        $this->_ventas = $this->cargar_modelo('ventas');
        $this->_detalle_estadia = $this->cargar_modelo('detalle_estadia');
    }

    public function index() {
        if($_POST['guardar']==1){
            //echo '<pre>';print_r($_POST);exit;
            //registrar estadia(venta)
            $this->_ventas->idtipo_comprobante=0;
            for($i=0;$i<count($_POST['idpasajero']);$i++){
                if($_POST['representante'][$i]==1){
                    $this->_ventas->idcliente=$_POST['idpasajero'][$i];
                }
            }
            $this->_ventas->idempleado=session::get('idempleado');
            $this->_ventas->idtipo_transaccion=2;
            $dato_venta=$this->_ventas->inserta();
            
            //insertar detalle estadía
            for($i=0;$i<count($_POST['idpasajero']);$i++){
                $this->_detalle_estadia->idhabitacion_especifica=0;
                $this->_detalle_estadia->idcliente=$_POST['idpasajero'][$i];
                $this->_detalle_estadia->idventa=$dato_venta['idventa'];
                $this->_detalle_estadia->estado=0;
                $this->_detalle_estadia->fecha_ingreso=$_POST['fecha_entrada'][$i];
                $this->_detalle_estadia->fecha_salida=$_POST['fecha_salida'][$i];
                $this->_detalle_estadia->fecha_reserva=$_POST['fecha_reserva'][$i];
                $this->_detalle_estadia->inserta();
            }
        }
        $this->_vista->datos_habitaciones=  $this->_habitaciones->selecciona();
        $this->_vista->titulo = 'Registrar reserva';
        $this->_vista->action = BASE_URL.'reserva';
        $this->_vista->setJs(array('funciones'));
        $this->_vista->renderizar('index');
    }
}

?>
