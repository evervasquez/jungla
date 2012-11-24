<?php

class ventas_controlador extends controller {
    
    private $_ventas;
    private $_tipo_comprobante;
    private $_tipo_transaccion;
    private $_paquetes;
    private $_productos;

    public function __construct() {
        parent::__construct();
        $this->_ventas = $this->cargar_modelo('ventas');
        $this->_tipo_transaccion = $this->cargar_modelo('tipo_transaccion');
        $this->_tipo_comprobante = $this->cargar_modelo('tipo_comprobante');
        $this->_paquetes = $this->cargar_modelo('paquetes');
        $this->_productos = $this->cargar_modelo('productos');
    }
    
    public function index(){
        $this->_vista->datos=$this->_ventas->selecciona();
        $this->_vista->renderizar('index');
    }
    
    public function nuevo(){
        if ($_POST['guardar'] == 1) {
            echo '<pre>';
            print_r($_POST);
            echo '</pre>';
            exit;
            //inserta venta
            $this->_ventas->fecha_venta = $_POST['fecha_compra'];
            $this->_ventas->estado = 1;
            $this->_ventas->observaciones = '';
            $this->_ventas->idcliente = $_POST['nro_comprobante'];
            $this->_ventas->idempleado = $_POST['importe'];
            $this->_ventas->idtipo_transaccion = $_POST['tipo_transaccion'];
            $dato_venta=$this->_ventas->inserta();
            //inserta detalle venta
                for($i=0;$i<count($_POST['idprodutos']);$i++){
                $this->_detalle_compra->idcompra=$dato_venta['idventa'];
                $this->_detalle_compra->idproducto= $_POST['idprodutos'][$i];
                $this->_detalle_compra->cantidad= $_POST['cantidad'][$i];
                $this->_detalle_compra->precio= $_POST['precio'][$i];
                $this->_detalle_compra->inserta();
            }
            //inserta cronograma si es al credito
            if($_POST['tipo_transaccion']==2){
                $fecha=$_POST['fecha_compra'];
                $fecha_compra = date("Y-m-d",mktime(0,0,0,substr($fecha,3,2),substr($fecha,0,2),substr($fecha,6,4)));
                $fecha=$_POST['fecha_vencimiento'];
                $fecha_vencimiento = date("Y-m-d",mktime(0,0,0,substr($fecha,3,2),substr($fecha,0,2),substr($fecha,6,4)));
                $intervalo_dias = $_POST['intervalo_dias'];
                $monto = $_POST['total'];
                $c=0;
                $fecha_temp = $fecha_compra;
                $mayor = true;
                $cuota = array();
                while($mayor){
                    $c++;
                    $fecha_temp =  date("Y-m-d", strtotime("$fecha_temp +$intervalo_dias day"));
                    if(new DateTime($fecha_temp) >= new DateTime($fecha_vencimiento)){
                        $mayor = false;
                    }
                }
                if(new DateTime($fecha_temp) > new DateTime($fecha_vencimiento)){
                    $c=$c-1;
                }
                $monto_pagado = 0;
                $pago_mensual = (int)($monto / $c);

                for($i=1;$i<=$c;$i++){
                    $cuota[$i]=$pago_mensual;
                    $monto_pagado = $monto_pagado + $pago_mensual;
                }
                if($monto_pagado != $monto){
                    $cuota[$c]=	$cuota[$c] + ($monto- $monto_pagado);
                }
                $fecha_temp = date("d-m-Y", strtotime("$fecha_compra +$intervalo_dias day"));

                for($i=1;$i<=$c;$i++){
                    $this->_cuota_cobro->idcompra=$dato_venta['idcompra'];
                    $this->_cuota_cobro->fecha_pago=$fecha_temp;
                    $this->_cuota_cobro->monto_cuota=$cuota[$i];
                    $this->_cuota_cobro->nro_cuota=$i;
                    $this->_cuota_cobro->inserta();
                    $fecha_temp = date("d-m-Y", strtotime("$fecha_temp +$intervalo_dias day"));
                }
            }
            $this->redireccionar('compras');
        }
        $this->_vista->datos_tipo_comprobante=$this->_tipo_comprobante->selecciona();
        $this->_vista->datos_tipo_transaccion=$this->_tipo_transaccion->selecciona();
        $this->_vista->datos_paquetes=$this->_paquetes->selecciona();
        $this->_vista->datos_productos=$this->_productos->selecciona();
        $this->_vista->action = BASE_URL.'ventas/nuevo';
        $this->_vista->setCss(array('estilos_form'));
        $this->_vista->setJs(array('funciones_form'));
        $this->_vista->titulo = 'Registrar Venta';
        $this->_vista->renderizar('form');
    }
}

?>
