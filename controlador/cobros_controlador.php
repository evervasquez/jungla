<?php
    
class cobros_controlador extends controller{
    
    private $_cobros;
    private $_cuota_cobro;
    private $_caja;
    private $_movimiento_caja;
    private $_amortizacion_cobro;
    private $_ventas;
    private $_asiento;
    
    public function __construct() {
        parent::__construct();
        $this->_cobros = $this->cargar_modelo('cobros');
        $this->_cuota_cobro = $this->cargar_modelo('cuota_cobro');
        $this->_caja = $this->cargar_modelo('caja');
        $this->_movimiento_caja = $this->cargar_modelo('movimiento_caja');
        $this->_amortizacion_cobro = $this->cargar_modelo('amortizacion_cobro');
        $this->_ventas = $this->cargar_modelo('ventas');
        $this->_asiento = $this->cargar_modelo('asientos');
    }
    
    public function index(){
        $this->_vista->datos= $this->_cobros->selecciona();
        $this->_vista->datos_ventas= $this->_ventas->selecciona();
//        echo '<pre>';
//                print_r($this->_vista->datos_ventas);exit;
        $this->_vista->renderizar('index');
    }    
    
    public function cronograma($idventa){
        $this->_cuota_cobro->idventa=$idventa;
        $this->_vista->datos=$this->_cuota_cobro->selecciona();
        $this->_vista->titulo = 'Cronograma de Cobros';
        $this->_vista->btn_action = BASE_URL.'cobros/amortizar/'.$idventa;
        $this->_vista->renderizar('cronograma');
    }
    
    public function amortizar($idventa){
        $datos_caja=$this->_caja->selecciona();
        if($datos_caja[0]['ESTADO']==0){
            echo '<script>alert("Aperture la caja antes de cualquier movimiento")</script>';
            $this->redireccionar('caja');
        }
        if(new DateTime($datos_caja[0]['C_FECHA'])!=new DateTime(date('d-m-Y'))){
            echo '<script>alert("Cierre la caja de fecha pasada y aperture la caja para el dia de hoy")</script>';
            $this->redireccionar('caja');
        }
        
        if($_POST['guardar']==1){
//            echo '<pre>';
//            print_r($_POST);exit;
            //insertar movimiento caja
            $this->_movimiento_caja->idconcepto_movimiento=1;
            $this->_movimiento_caja->idcaja=$datos_caja[0]['IDCAJA'];
            $this->_movimiento_caja->monto=$_POST['monto'];
            $this->_movimiento_caja->idcompra=0;
            $this->_movimiento_caja->idventa=$idventa;
            $dato_movimiento_caja = $this->_movimiento_caja->inserta();
            
            $this->_cuota_cobro->idventa=$idventa;
            $datos_cuota_cobro = $this->_cuota_cobro->selecciona();
            
            $monto_amortizado= $_POST['monto'];
            for($i=0;$i<count($datos_cuota_cobro);$i++){
                if($datos_cuota_cobro[$i]['MONTO_CUOTA']>$datos_cuota_cobro[$i]['MONTO_COBRADO']){
                    $monto_restantexcuota = $datos_cuota_cobro[$i]['MONTO_CUOTA'] - $datos_cuota_cobro[$i]['MONTO_COBRADO'];
                    if($monto_amortizado!=0){
                        if($monto_restantexcuota>=$monto_amortizado){
                            //actualiza monto_pagado en cuota_pago
                            $this->_cuota_cobro->idcuota_cobro=$datos_cuota_cobro[$i]['IDCUOTA_COBRO'];
                            $this->_cuota_cobro->monto_cobrado=$monto_amortizado + $datos_cuota_cobro[$i]['MONTO_COBRADO'];
                            $this->_cuota_cobro->actualiza();

                            //inserta amortizacion_pago
                            $this->_amortizacion_cobro->idcuota_cobro=$datos_cuota_cobro[$i]['IDCUOTA_COBRO'];
                            $this->_amortizacion_cobro->idmovimiento_caja=$dato_movimiento_caja['IDMOVIMIENTO_CAJA'];
                            $this->_amortizacion_cobro->fecha=$_POST['FECHA_PAGO'];
                            $this->_amortizacion_cobro->monto=$monto_amortizado;
                            $this->_amortizacion_cobro->inserta();

                            $monto_amortizado=0;
                        }else{
                            //actualiza monto_cobrado en cuota_pago
                            $this->_cuota_cobro->idcuota_cobro=$datos_cuota_cobro[$i]['IDCUOTA_COBRO'];
                            $this->_cuota_cobro->monto_cobrado=$datos_cuota_cobro[$i]['MONTO_CUOTA'];
                            $this->_cuota_cobro->actualiza();

                            //inserta amortizacion_pago
                            $this->_amortizacion_cobro->idcuota_cobro=$datos_cuota_cobro[$i]['IDCUOTA_COBRO'];
                            $this->_amortizacion_cobro->idmovimiento_caja=$dato_movimiento_caja['IDMOVIMIENTO_CAJA'];
                            $this->_amortizacion_cobro->fecha=$_POST['fecha_pago'];
                            $this->_amortizacion_cobro->monto=$monto_restantexcuota;
                            $this->_amortizacion_cobro->inserta();

                            $monto_amortizado= $monto_amortizado - $monto_restantexcuota;
                        }
                    }
                }
            }
            
            //actualiza saldo caja
            $this->_caja->idcaja=$datos_caja[0]['IDCAJA'];
            $this->_caja->saldo=$_POST['monto'];
            $this->_caja->aumenta=1;
            $this->_caja->actualiza();
            
            //inserta asiento
            $this->_asiento->idventa_cobro=$idventa;
            $this->_asiento->monto_amortizado=$_POST['monto'];
            $this->_asiento->amortiza();
            
            $this->redireccionar('cobros');
        }
        $this->_vista->action= BASE_URL.'cobros/amortizar/'.$idventa;
        $this->_vista->renderizar('amortizar');
    }
    
    public function cobrar($idventa, $monto, $idtipo_comprobante){
        $datos_caja=$this->_caja->selecciona();
        if($datos_caja[0]['ESTADO']==0){
            echo '<script>alert("Aperture la caja antes de cualquier movimiento")</script>';
            $this->redireccionar('caja');
        }

        if(new DateTime($datos_caja[0]['C_FECHA'])!=new DateTime(date('d-m-Y'))){
            echo '<script>alert("Cierre la caja de fecha pasada y aperture la caja para el día de hoy")</script>';
            $this->redireccionar('caja');
        }
        //insertar movimiento caja
        $this->_movimiento_caja->idconcepto_movimiento=2;
        $this->_movimiento_caja->idcaja=$datos_caja[0]['IDCAJA'];
        $this->_movimiento_caja->monto=$monto;
        $this->_movimiento_caja->idcompra=0;
        $this->_movimiento_caja->idventa=$idventa;
        $this->_movimiento_caja->inserta();

        //actualizar el estado de venta a pagado
        $this->_ventas->idventa=$idventa;
        $this->_ventas->estado_pago=1;
        $this->_ventas->actualiza();
        
        //asiento cobrar
        $this->_asiento->idventa_cobro=$idventa;
        $this->_asiento->inserta();
        
        //actualiza saldo caja
        $this->_caja->idcaja=$datos_caja[0]['IDCAJA'];
        $this->_caja->saldo=$monto;
        $this->_caja->aumenta=1;
        $this->_caja->actualiza();

        echo "<script>
            if(confirm('¿Imprimir el comprobante de Venta?')){ }else { window.close(); }
            </script>";
        $this->imprimir($idventa, $idtipo_comprobante);
        //window.open('../../../reportes/ticket_boleta_venta/');
    }
    
    public function imprimir($idventa, $idtipo_comprobante){
        switch ($idtipo_comprobante){
            case 55:
                $this->redireccionar('reportes/ticket_boleta_venta/'.$idventa);
                break;
            case 56:
                $this->redireccionar('reportes/ticket_factura_venta/'.$idventa);
        }

    }
}   
    
?>