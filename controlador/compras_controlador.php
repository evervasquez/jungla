<?php

class compras_controlador extends controller{
    
    private $_compras;
    private $_proveedores;
    private $_tipo_transaccion;
    private $_productos;
    private $_detalle_compra;
    private $_cuota_pago;
    private $_alertas;

    public function __construct() {
        if (!$this->acceso(16)) {
            $this->redireccionar('error/access/5050');
        }
        parent::__construct();
        $this->_compras = $this->cargar_modelo('compras');
        $this->_proveedores = $this->cargar_modelo('proveedores');
        $this->_tipo_transaccion= $this->cargar_modelo('tipo_transaccion');
        $this->_productos= $this->cargar_modelo('productos');
        $this->_detalle_compra= $this->cargar_modelo('detalle_compra');
        $this->_cuota_pago = $this->cargar_modelo('cuota_pago');
        $this->_alertas = $this->cargar_modelo('alertas');
    }

    public function index() {
        $this->_vista->datos = $this->_compras->selecciona();
        $this->_vista->setJs(array('funcion'));
        $this->_vista->setCss(array('estilos'));
        $this->_vista->renderizar('index');
    }
    
    public function ver(){
        $this->_compras->idcompra=$_POST['idcompra'];
        echo json_encode($this->_compras->selecciona());
    }
    
    public function ver2(){
        $this->_detalle_compra->idcompra=$_POST['idcompra'];
        echo json_encode($this->_detalle_compra->selecciona());
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
            //inserta compra
            $this->_compras->fecha_compra = $_POST['fecha_compra'];
            $this->_compras->estado = 1;
            $this->_compras->observaciones = $_POST['observaciones'];
            $this->_compras->nro_comprobante = $_POST['nro_comprobante'];
            $this->_compras->importe = $_POST['importe'];
            $this->_compras->igv = $_POST['igv'];
            $this->_compras->idproveedor = $_POST['idproveedor'];
            $this->_compras->idtipo_transaccion = $_POST['tipo_transaccion'];
            $this->_compras->confirmacion = 0;
            $this->_alertas->idalerta = 2;
            $this->_alertas->activa_alerta();
            $dato_compra=$this->_compras->inserta();
            //inserta detalle compra
                for($i=0;$i<count($_POST['idprodutos']);$i++){
                $this->_detalle_compra->idcompra=$dato_compra[0]['IDCOMPRA'];
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
                    $this->_cuota_pago->idcompra=$dato_compra[0]['IDCOMPRA'];
                    $this->_cuota_pago->fecha_pago=$fecha_temp;
                    $this->_cuota_pago->monto_cuota=$cuota[$i];
                    $this->_cuota_pago->nro_cuota=$i;
                    $this->_cuota_pago->inserta();
                    $fecha_temp = date("d-m-Y", strtotime("$fecha_temp +$intervalo_dias day"));
                }
            }
            $this->redireccionar('compras');
        }
        $this->_vista->datos_proveedores = $this->_proveedores->selecciona();
        $this->_vista->datos_tipo_transaccion=$this->_tipo_transaccion->selecciona();
        $this->_vista->datos_productos = $this->_productos->selecciona();
        $this->_vista->titulo = 'Registrar Compra:';
        $this->_vista->action = BASE_URL . 'compras/nuevo';
        $this->_vista->setJs(array('funciones_form'));
        $this->_vista->setCss(array('estilos_form'));
        $this->_vista->renderizar('form');
    }
    
    public function editar($id){
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('compras');
        }
        
        if ($_POST['guardar'] == 1) {
//            echo '<pre>';
//            print_r($_POST);
//            echo '</pre>';
//            exit;
            //inserta compra
            $this->_compras->idcompra = $_POST['codigo'];
            $this->_compras->fecha_compra = $_POST['fecha_compra'];
            $this->_compras->estado = 1;
            $this->_compras->observaciones = $_POST['observaciones'];
            $this->_compras->nro_comprobante = $_POST['nro_comprobante'];
            $this->_compras->importe = $_POST['importe'];
            $this->_compras->igv = $_POST['igv'];
            $this->_compras->idproveedor = $_POST['idproveedor'];
            $this->_compras->idtipo_transaccion = $_POST['tipo_transaccion'];
            $this->_compras->confirmacion = 0;
            $this->_compras->actualiza();
            
            $this->_cuota_pago->idcompra=$_POST['codigo'];
            $this->_cuota_pago->elimina();
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
                    $this->_cuota_pago->idcompra=$_POST['codigo'];
                    $this->_cuota_pago->fecha_pago=$fecha_temp;
                    $this->_cuota_pago->monto_cuota=$cuota[$i];
                    $this->_cuota_pago->nro_cuota=$i;
                    $this->_cuota_pago->inserta();
                    $fecha_temp = date("d-m-Y", strtotime("$fecha_temp +$intervalo_dias day"));
                }
            }
            $this->redireccionar('compras');
            
        }
        $this->_compras->idcompra=$this->filtrarInt($id);
        $datos=$this->_compras->selecciona();
//        echo '<pre>';
//                print_r($datos);exit;
        if($datos[0]['IDTIPO_TRANSACCION']==2){
            echo '<script>alert("No puede editar las compras al credito")</script>';
            $this->redireccionar('compras');
        }
//        if($datos[0]['confirmacion']==1){
//            echo '<script>alert("No puede editar esta compra...\nYa fue ingresada al almacen")</script>';
//            $this->redireccionar('compras');
//        }
//        if($datos[0]['monto_pagado']!=0){
//            echo '<script>alert("No puede editar esta compra...\nYa fue amortizada")</script>';
//            $this->redireccionar('compras');
//        }
        $this->_vista->datos = $datos;
        $this->_detalle_compra->idcompra=$this->filtrarInt($id);
        $this->_vista->datos_detalle_compra=$this->_detalle_compra->selecciona();
        
        $this->_vista->datos_proveedores = $this->_proveedores->selecciona();
        
        $this->_vista->datos_tipo_transaccion=$this->_tipo_transaccion->selecciona();
        
        $this->_vista->datos_productos = $this->_productos->selecciona();
        
        $this->_vista->titulo = 'Actualizar Compra:';
        $this->_vista->setJs(array('funciones_editar'));
        $this->_vista->setCss(array('estilos_form'));
        $this->_vista->renderizar('form');
    }
    
    public function insertar_detalle_compra(){
        $this->_detalle_compra->idcompra=$_POST['idcompra'];
        $this->_detalle_compra->idproducto= $_POST['idprodutos'];
        $this->_detalle_compra->cantidad= $_POST['cantidad'];
        $this->_detalle_compra->precio= $_POST['precio'];
        $this->_detalle_compra->inserta();
    }
    
    public function eliminar_detalle_compra(){
        $this->_detalle_compra->idcompra=$_POST['idcompra'];
        $this->_detalle_compra->idproducto= $_POST['idprodutos'];
        $this->_detalle_compra->elimina();
    }
    
    public function eliminar($id){
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('compras');
        }
        $this->_compras->idcompra=$this->filtrarInt($id);
        $this->_compras->elimina();
        $this->_alertas->desactiva_alerta();
        $this->redireccionar('compras');
    }
}

?>
