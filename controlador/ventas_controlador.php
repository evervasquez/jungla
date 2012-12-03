<?php

class ventas_controlador extends controller {
    
    private $_ventas;
    private $_tipo_comprobante;
    private $_tipo_transaccion;
    private $_paquetes;
    private $_productos;
    private $_detalle_venta;
    private $_cuota_cobro;

    public function __construct() {
        parent::__construct();
        $this->_ventas = $this->cargar_modelo('ventas');
        $this->_tipo_transaccion = $this->cargar_modelo('tipo_transaccion');
        $this->_tipo_comprobante = $this->cargar_modelo('tipo_comprobante');
        $this->_paquetes = $this->cargar_modelo('paquetes');
        $this->_productos = $this->cargar_modelo('productos');
        $this->_detalle_venta= $this->cargar_modelo('detalle_venta');
        $this->_cuota_cobro= $this->cargar_modelo('cuota_cobro');
    }
    
    public function index(){
        $this->_vista->datos=$this->_ventas->selecciona();
        $this->_vista->setJs(array('funcion'));
        $this->_vista->SetCss(array('estilos'));
        $this->_vista->renderizar('index');
    }
    
    public function ver(){
        $this->_ventas->idventa=$_POST['idventa'];
        echo json_encode($this->_ventas->selecciona());
    }
    
    public function ver2(){
        $this->_detalle_venta->idventa=$_POST['idventa'];
        echo json_encode($this->_detalle_venta->selecciona());
    }
    
    public function buscador(){
        if($_POST['filtro']==0){
            $this->_compras->nro_comprobante=$_POST['cadena'];
        }
        if($_POST['filtro']==1){
            $this->_compras->proveedor = $_POST['cadena'];
        }
        echo json_encode($this->_compras->selecciona());
    }
    
    public function nuevo(){
        if ($_POST['guardar'] == 1) {
//            echo '<pre>';
//            print_r($_POST);
//            echo '</pre>';
//            exit; 
            //inserta venta
            $this->_ventas->estado = 1;
            $this->_ventas->observaciones = '';
            $this->_ventas->idtipo_comprobante = $_POST['tipo_comprobante'];
            $this->_ventas->idcliente = $_POST['idcliente'];
            $this->_ventas->idempleado = session::get('idempleado');
            $this->_ventas->idtipo_transaccion = $_POST['tipo_transaccion'];
            $this->_ventas->importe = $_POST['importe'];
            $this->_ventas->igv = $_POST['igv'];
            $this->_ventas->fecha_venta = $_POST['fecha_venta'];
            $this->_ventas->estado_pago = 0;
            $dato_venta=$this->_ventas->inserta();
            //inserta detalle venta
            $x=0;$y=0;
            for($i=0;$i<count($_POST['um']);$i++){
                $this->_detalle_venta->idventa=$dato_venta['idventa'];
                if($_POST['um'][$i]=='paquetes'){
                    $this->_detalle_venta->idpaquete= $_POST['idpaquete'][$x];
                    $this->_detalle_venta->idproducto= 0;
                    $x++;
                }else{
                    $this->_detalle_venta->idpaquete= 0;
                    $this->_detalle_venta->idproducto= $_POST['idproduto'][$y];
                    $y++;
                }
                $this->_detalle_venta->cantidad= $_POST['cantidad'][$i];
                $this->_detalle_venta->precio_venta= $_POST['precio'][$i];
                $this->_detalle_venta->inserta();
            }
            //inserta cronograma si es al credito
            if($_POST['tipo_transaccion']==2){
                $fecha=$_POST['fecha_venta'];
                $fecha_venta = date("Y-m-d",mktime(0,0,0,substr($fecha,3,2),substr($fecha,0,2),substr($fecha,6,4)));
                $fecha=$_POST['fecha_vencimiento'];
                $fecha_vencimiento = date("Y-m-d",mktime(0,0,0,substr($fecha,3,2),substr($fecha,0,2),substr($fecha,6,4)));
                $intervalo_dias = $_POST['intervalo_dias'];
                $monto = $_POST['total'];
                $c=0;
                $fecha_temp = $fecha_venta;
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
                $fecha_temp = date("d-m-Y", strtotime("$fecha_venta +$intervalo_dias day"));

                for($i=1;$i<=$c;$i++){
                    $this->_cuota_cobro->idventa=$dato_venta['idventa'];
                    $this->_cuota_cobro->fecha_cobro=$fecha_temp;
                    $this->_cuota_cobro->nro_cobro=$i;
                    $this->_cuota_cobro->monto_cuota=$cuota[$i];
                    $this->_cuota_cobro->inserta();
                    $fecha_temp = date("d-m-Y", strtotime("$fecha_temp +$intervalo_dias day"));
                }
            }
            $this->redireccionar('ventas');
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
    
//    public function editar($id){
//        if (!$this->filtrarInt($id)) {
//            $this->redireccionar('ventas');
//        }
//        
//        if ($_POST['guardar'] == 1) {
////            echo '<pre>';
////            print_r($_POST);
////            echo '</pre>';
////            exit;
//            //inserta venta
//            $this->_ventas->idventa = $_POST['codigo'];
//            $this->_ventas->estado = 1;
//            $this->_ventas->observaciones = '';
//            $this->_ventas->idtipo_comprobante = $_POST['tipo_comprobante'];
//            $this->_ventas->idcliente = $_POST['idcliente'];
//            $this->_ventas->idempleado = session::get('idempleado');
//            $this->_ventas->idtipo_transaccion = $_POST['tipo_transaccion'];
//            $this->_ventas->importe = $_POST['importe'];
//            $this->_ventas->igv = $_POST['igv'];
//            $this->_ventas->fecha_venta = $_POST['fecha_venta'];
//            $this->_ventas->actualiza();
//            
//            $this->_cuota_cobro->idventa=$_POST['codigo'];
//            $this->_cuota_cobro->elimina();
//            //inserta cronograma si es al credito
//            if($_POST['tipo_transaccion']==2){
//                $fecha=$_POST['fecha_venta'];
//                $fecha_venta = date("Y-m-d",mktime(0,0,0,substr($fecha,3,2),substr($fecha,0,2),substr($fecha,6,4)));
//                $fecha=$_POST['fecha_vencimiento'];
//                $fecha_vencimiento = date("Y-m-d",mktime(0,0,0,substr($fecha,3,2),substr($fecha,0,2),substr($fecha,6,4)));
//                $intervalo_dias = $_POST['intervalo_dias'];
//                $monto = $_POST['total'];
//                $c=0;
//                $fecha_temp = $fecha_venta;
//                $mayor = true;
//                $cuota = array();
//                while($mayor){
//                    $c++;
//                    $fecha_temp =  date("Y-m-d", strtotime("$fecha_temp +$intervalo_dias day"));
//                    if(new DateTime($fecha_temp) >= new DateTime($fecha_vencimiento)){
//                        $mayor = false;
//                    }
//                }
//                if(new DateTime($fecha_temp) > new DateTime($fecha_vencimiento)){
//                    $c=$c-1;
//                }
//                $monto_pagado = 0;
//                $pago_mensual = (int)($monto / $c);
//
//                for($i=1;$i<=$c;$i++){
//                    $cuota[$i]=$pago_mensual;
//                    $monto_pagado = $monto_pagado + $pago_mensual;
//                }
//                if($monto_pagado != $monto){
//                    $cuota[$c]=	$cuota[$c] + ($monto- $monto_pagado);
//                }
//                $fecha_temp = date("d-m-Y", strtotime("$fecha_venta +$intervalo_dias day"));
//
//                for($i=1;$i<=$c;$i++){
//                    $this->_cuota_cobro->idventa=$dato_venta['idventa'];
//                    $this->_cuota_cobro->fecha_cobro=$fecha_temp;
//                    $this->_cuota_cobro->nro_cobro=$i;
//                    $this->_cuota_cobro->monto_cuota=$cuota[$i];
//                    $this->_cuota_cobro->inserta();
//                    $fecha_temp = date("d-m-Y", strtotime("$fecha_temp +$intervalo_dias day"));
//                }
//            }
//            $this->redireccionar('ventas');
//        }
//        $this->_ventas->idventa=$this->filtrarInt($id);
//        $datos=$this->_ventas->selecciona();
//        if($datos[0]['monto_pagado']!=0){
//            echo '<script>alert("No puede editar esta venta...\nYa fue amortizada")</script>';
//            $this->redireccionar('compras');
//        }
//        $this->_vista->datos = $datos;
//        $this->_detalle_venta->idcompra=$this->filtrarInt($id);
//        $this->_vista->datos_detalle_venta=$this->_detalle_venta->selecciona();
//        
//        $this->_vista->datos_tipo_transaccion=$this->_tipo_transaccion->selecciona();
//        
//        $this->_vista->datos_productos = $this->_productos->selecciona();
//        $this->_vista->datos_paquetes = $this->_paquetes->selecciona();
//        
//        $this->_vista->titulo = 'Actualizar Venta:';
//        $this->_vista->setCss(array('estilos_form'));
//        $this->_vista->setJs(array('funciones_editar'));
//        $this->_vista->renderizar('form');
//    }
//    
//    public function insertar_detalle_compra(){
//        $this->_detalle_compra->idcompra=$_POST['idcompra'];
//        $this->_detalle_compra->idproducto= $_POST['idprodutos'];
//        $this->_detalle_compra->cantidad= $_POST['cantidad'];
//        $this->_detalle_compra->precio= $_POST['precio'];
//        $this->_detalle_compra->inserta();
//    }
//    
//    public function eliminar_detalle_compra(){
//        $this->_detalle_compra->idcompra=$_POST['idcompra'];
//        $this->_detalle_compra->idproducto= $_POST['idprodutos'];
//        $this->_detalle_compra->elimina();
//    }
    
    public function eliminar($id){
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('ventas');
        }
        $this->_ventas->idventa=$this->filtrarInt($id);
        $this->_ventas->elimina();
        $this->redireccionar('compras');
    }
}

?>
