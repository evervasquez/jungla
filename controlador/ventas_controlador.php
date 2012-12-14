<?php

class ventas_controlador extends controller {
    
    private $_ventas;
    private $_tipo_comprobante;
    private $_tipo_transaccion;
    private $_paquetes;
    private $_productos;
    private $_detalle_venta;
    private $_cuota_cobro;
    private $_asientos;
    private $_clientes;

    public function __construct() {
        if (!$this->acceso(21)) {
            $this->redireccionar('error/access/5050');
        }
        parent::__construct();
        $this->_ventas = $this->cargar_modelo('ventas');
        $this->_tipo_transaccion = $this->cargar_modelo('tipo_transaccion');
        $this->_tipo_comprobante = $this->cargar_modelo('tipo_comprobante');
        $this->_paquetes = $this->cargar_modelo('paquetes');
        $this->_productos = $this->cargar_modelo('productos');
        $this->_detalle_venta= $this->cargar_modelo('detalle_venta');
        $this->_asientos= $this->cargar_modelo('asientos');
        $this->_cuota_cobro= $this->cargar_modelo('cuota_cobro');
        $this->_clientes= $this->cargar_modelo('clientes');
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
            $this->_ventas->nro_documento=$_POST['cadena'];
        }
        if($_POST['filtro']==1){
            $this->_ventas->cliente = $_POST['cadena'];
        }
        if($_POST['filtro']==2){
            $this->_ventas->empleado= $_POST['cadena'];
        }
        echo json_encode($this->_ventas->selecciona());
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
            $this->_ventas->descuento = $_POST['descuento'];
            $dato_venta=$this->_ventas->inserta();
            //inserta detalle venta
            $x=0;$y=0;
            for($i=0;$i<count($_POST['um']);$i++){
                $this->_detalle_venta->idventa=$dato_venta[0]['X_IDVENTA'];
                if($_POST['um'][$i]=='paquete'){
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
                    if(new DateTime($fecha_temp,new DateTimeZone('America/Lima')) >= new DateTime($fecha_vencimiento,new DateTimeZone('America/Lima'))){
                        $mayor = false;
                    }
                }
                if(new DateTime($fecha_temp,new DateTimeZone('America/Lima')) > new DateTime($fecha_vencimiento,new DateTimeZone('America/Lima'))){
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
                    $this->_cuota_cobro->idventa=$dato_venta[0]['X_IDVENTA'];
                    $this->_cuota_cobro->fecha_cobro=$fecha_temp;
                    $this->_cuota_cobro->nro_cobro=$i;
                    $this->_cuota_cobro->monto_cuota=$cuota[$i];
                    $this->_cuota_cobro->inserta();
                    $fecha_temp = date("d-m-Y", strtotime("$fecha_temp +$intervalo_dias day"));
                }
            }
            $this->_asientos->idventa=$dato_venta[0]['X_IDVENTA'];
            $this->_asientos->inserta();
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
    
    public function insertar_cliente_natural(){
        $this->_clientes->documento = $_POST['documento'];
        $this->_clientes->nombres = $_POST['nombres'];
        $this->_clientes->apellidos = $_POST['apellidos'];
        $this->_clientes->direccion = $_POST['direccion'];
        $this->_clientes->sexo = $_POST['sexo'];
        $this->_clientes->idprofesion = 67;
        $this->_clientes->idmembresia = 0;
        $this->_clientes->tipo = 'natural';
        $this->_clientes->idubigeo = 0;
        echo json_encode($this->_clientes->inserta());
    }
    
    public function eliminar($id){
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('ventas');
        }
        $this->_ventas->idventa=$this->filtrarInt($id);
        $this->_ventas->elimina();
        $this->redireccionar('ventas');
    }
}

?>
