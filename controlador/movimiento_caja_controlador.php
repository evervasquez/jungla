<?php

class movimiento_caja_controlador extends controller{
    
    private $_movimiento_caja;
    private $_ventas;
    private $_caja;

    public function __construct() {
        parent::__construct();
        $this->_movimiento_caja=  $this->cargar_modelo('movimiento_caja');
        $this->_ventas=  $this->cargar_modelo('ventas');
        $this->_caja=  $this->cargar_modelo('caja');
    }

    public function index() {
        $this->_vista->datos_ventas=$this->_ventas->selecciona();
//        echo '<pre>';
//                print_r($this->_vista->datos_ventas);exit;
        $this->_vista->renderizar('index');
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
