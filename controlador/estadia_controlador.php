<?php

class estadia_controlador extends controller{
    
    private $_estadia;
    private $_detalle_estadia;
    private $_paises;
    private $_membresia;
    private $_profesiones;
    private $_clientes;
    private $_ruta_huesped;
    private $_detalle_venta;
    private $_tipo_comprobante;
    private $_habitaciones;
    private $_ventas;
    

    public function __construct() {
        parent::__construct();
        $this->_estadia = $this->cargar_modelo('estadia');
        $this->_detalle_estadia = $this->cargar_modelo('detalle_estadia');
        $this->_paises = $this->cargar_modelo('paises');
        $this->_membresia = $this->cargar_modelo('membresia');
        $this->_profesiones = $this->cargar_modelo('profesiones');
        $this->_clientes = $this->cargar_modelo('clientes');
        $this->_ruta_huesped = $this->cargar_modelo('ruta_huesped');
        $this->_detalle_venta = $this->cargar_modelo('detalle_venta');
        $this->_tipo_comprobante= $this->cargar_modelo('tipo_comprobante');
        $this->_habitaciones= $this->cargar_modelo('habitaciones');
        $this->_ventas = $this->cargar_modelo('ventas');
    }

    public function index() {
        $this->_vista->datos =  $this->_estadia->selecciona();
        $this->_vista->setJs(array('funciones_index'));
        $this->_vista->setCss(array('estilos_index'));
        $this->_vista->renderizar('index');
    }
    
    public function ver(){
        $this->_estadia->idventa=$_POST['idventa'];
        echo json_encode($this->_estadia->selecciona());
    }
    
    public function buscador(){
        if($_POST['filtro']==0){
            $this->_estadia->representante=$_POST['cadena'];
        }
        echo json_encode($this->_estadia->selecciona());
    }
    
    public function nuevo(){
        if($_POST['guardar']==1){
//            echo '<pre>';
//                        print_r($_POST);exit;
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
            
            for($i=0;$i<count($_POST['idpasajero']);$i++){
                //insertar detalle estadía
                $this->_detalle_estadia->idhabitacion_especifica=$_POST['idhabitacion_especifica'][$i];
                $this->_detalle_estadia->idcliente=$_POST['idpasajero'][$i];
                $this->_detalle_estadia->idventa=$dato_venta['IDVENTA'];
                $this->_detalle_estadia->estado=1;
                $this->_detalle_estadia->fecha_ingreso=date('d-m-Y H:i:s');
                $this->_detalle_estadia->fecha_salida=$_POST['fecha_salida'];
                $this->_detalle_estadia->inserta();
                
                //insertamos ruta_huesped
                $this->_ruta_huesped->idtipo_ruta=1;
                $this->_ruta_huesped->idubigeo=$_POST['ciudad'][$i];
                $this->_ruta_huesped->idcliente=$_POST['idpasajero'][$i];
                $this->_ruta_huesped->idventa=$dato_venta['IDVENTA'];
                $this->_ruta_huesped->inserta();
            }
            $this->redireccionar('estadia');
        }
        
        $this->_vista->datos_paises = $this->_paises->selecciona();
        $this->_vista->datos_membresias= $this->_membresia->selecciona();
        $this->_vista->datos_profesiones = $this->_profesiones->selecciona();
        $this->_vista->datos_habitaciones=  $this->_habitaciones->selecciona();
        $this->_vista->titulo = 'Registrar Estadia';
        $this->_vista->action = BASE_URL.'estadia/nuevo';
        $this->_vista->setCss(array('estilos_form'));
        $this->_vista->setJs(array('funciones_estadia','funciones_form_pasajeros'));
        $this->_vista->renderizar('form');
    }
    
    public function confirmar($idventa){
        if($_POST['guardar']==1){
//            echo '<pre>';print_r($_POST);exit;
            for($i=0;$i<count($_POST['idcliente']);$i++){
                //insertamos ruta_huesped
                $this->_ruta_huesped->idtipo_ruta=1;
                $this->_ruta_huesped->idubigeo=$_POST['ciudad'][$i];
                $this->_ruta_huesped->idcliente=$_POST['idcliente'][$i];
                $this->_ruta_huesped->idventa=$_POST['codigo'];
                $this->_ruta_huesped->inserta();
                
                //actualizamos detalle_estadia
                $this->_detalle_estadia->idcliente=$_POST['idcliente'][$i];
                $this->_detalle_estadia->idventa=$_POST['codigo'];
                $this->_detalle_estadia->estado=1;
                $this->_detalle_estadia->fecha_ingreso=date('d-m-Y H:i:s');
                $this->_detalle_estadia->fecha_salida=$_POST['fecha_salida'];
                $this->_detalle_estadia->actualiza();
            }
            $this->redireccionar('estadia');
        }
        $this->_estadia->idventa=$idventa;
        $this->_vista->datos = $this->_estadia->selecciona();
        $this->_detalle_estadia->idventa=$idventa;
        $this->_vista->datos_detalle_estadia =  $this->_detalle_estadia->selecciona();
        $this->_vista->datos_paises = $this->_paises->selecciona();
        $this->_vista->datos_membresias= $this->_membresia->selecciona();
        $this->_vista->datos_profesiones = $this->_profesiones->selecciona();
        $this->_vista->setJs(array('funciones_confirmar'));
        $this->_vista->setCss(array('estilos_confirmar'));
        $this->_vista->renderizar('confirmar');
    }
    
    public function consumo($id){
        if($_POST['guardar']==1){
//            echo '<pre>';
//                        print_r($_POST);exit;
            for($i=0;$i<count($_POST['idproduto']);$i++){
                $this->_detalle_venta->idventa=$id;
                $this->_detalle_venta->idpaquete=0;
                $this->_detalle_venta->idproducto=$_POST['idproduto'][$i];
                $this->_detalle_venta->cantidad=$_POST['cantidad'][$i];
                $this->_detalle_venta->precio_venta=$_POST['precio'][$i];
                $this->_detalle_venta->inserta();
            }
            $this->redireccionar('estadia');
        }
        $this->_vista->setJs(array('funciones_consumo'));
        $this->_vista->setCss(array('estilos_consumo'));
        $this->_vista->renderizar('consumo');
    }
    
    public function check_out($idventa){
        if($_POST['guardar']==1){
//            echo '<pre>';print_r($_POST);exit;
            for($i=0;$i<count($_POST['idpasajero']);$i++){
                //insertamos ruta_huesped
                $this->_ruta_huesped->idtipo_ruta=2;
                $this->_ruta_huesped->idubigeo=$_POST['ciudad'][$i];
                $this->_ruta_huesped->idcliente=$_POST['idpasajero'][$i];
                $this->_ruta_huesped->idventa=$_POST['codigo'];
                /*$this->_ruta_huesped->inserta();*/
                
                //actualizamos detalle_estadia
                $this->_detalle_estadia->idcliente=$_POST['idpasajero'][$i];
                $this->_detalle_estadia->idventa=$_POST['codigo'];
                $this->_detalle_estadia->estado=2;
                $this->_detalle_estadia->fecha_ingreso=$_POST['fecha_entrada'].' '.$_POST['hora_entrada'];
                $this->_detalle_estadia->fecha_salida=$_POST['fecha_salida'];
               /* $this->_detalle_estadia->actualiza();*/
                
            }
            //actualizamos venta
            $this->_ventas->idventa=$_POST['codigo'];
            $this->_ventas->idtipo_comprobante=$_POST['tipo_comprobante'];
            $this->_ventas->idcliente=$_POST['idcliente'];
            $this->_ventas->idempleado=session::get('idempleado');
            $this->_ventas->idtipo_transaccion=1;
            $this->_ventas->importe=$_POST['importe'];
            $this->_ventas->igv=$_POST['igv'];
            $this->_ventas->descuento=$_POST['descuento'];
            /*$this->_ventas->actualiza();*/
            echo "<script>
                if(confirm('¿Imprimir el comprobante de Venta?')){ }else { window.close(); }
                </script>";
            
            $this->imprimir($idventa, $this->_ventas->idtipo_comprobante);
            $this->redireccionar('estadia');
            
        }
        $this->_estadia->idventa=$idventa;
        $this->_vista->datos = $this->_estadia->selecciona();
        $this->_vista->datos_tipo_comprobante=$this->_tipo_comprobante->selecciona();
        $this->_detalle_venta->idventa=$idventa;
        $this->_vista->datos_detalle_venta=  $this->_detalle_venta->selecciona();
        $this->_detalle_estadia->idventa=$idventa;
        $this->_vista->datos_detalle_estadia =  $this->_detalle_estadia->selecciona();
        $this->_habitaciones->idventa=$idventa;
        $this->_vista->datos_habitaciones=  $this->_habitaciones->selecciona();
        $this->_vista->datos_paises = $this->_paises->selecciona();
        $this->_vista->setJs(array('funciones_confirmar','funciones_check_out'));
        $this->_vista->setCss(array('estilos_check_out'));
        $this->_vista->renderizar('check_out');
    }
    
    public function inserta_cliente_juridico(){
        $this->_clientes->nombres = $_POST['nombres'];
        $this->_clientes->documento = $_POST['documento'];
        $this->_clientes->direccion = $_POST['direccion'];
        $this->_clientes->idprofesion = 67;
        $this->_clientes->idmembresia = 0;
        $this->_clientes->tipo = 'juridico';
        $this->_clientes->idubigeo = 0;
        echo json_encode($this->_clientes->inserta());
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
    
    public function eliminar($id){
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('estadia');
        }
        $this->_estadia->idventa = $this->filtrarInt($id);
        $this->_estadia->elimina();
        $this->redireccionar('estadia');
    }
}

?>
