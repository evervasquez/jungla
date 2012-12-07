<?php

class reserva_controlador extends controller{
    
    private $_habitaciones;
    private $_ventas;
    private $_detalle_estadia;
    private $_habitacion_especifica;
    private $_paises;
    private $_membresia;
    private $_profesiones;
    private $_clientes;
    
    public function __construct() {
        parent::__construct();
        $this->_habitaciones = $this->cargar_modelo('habitaciones');
        $this->_ventas = $this->cargar_modelo('ventas');
        $this->_detalle_estadia = $this->cargar_modelo('detalle_estadia');
        $this->_habitacion_especifica = $this->cargar_modelo('habitacion_especifica');
        $this->_paises = $this->cargar_modelo('paises');
        $this->_membresia = $this->cargar_modelo('membresia');
        $this->_profesiones = $this->cargar_modelo('profesiones');
        $this->_clientes = $this->cargar_modelo('clientes');
    }

    public function index() {
        if($_POST['guardar']==1){
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
                $this->_detalle_estadia->idhabitacion_especifica=$_POST['IDHABITACION_ESPECIFICA'][$i];
                $this->_detalle_estadia->idcliente=$_POST['IDPASAJERO'][$i];
                $this->_detalle_estadia->idventa=$dato_venta['IDVENTA'];
                $this->_detalle_estadia->estado=0;
                $this->_detalle_estadia->fecha_ingreso=$_POST['FECHA_ENTRADA'];
                $this->_detalle_estadia->fecha_salida=$_POST['FECHA_SALIDA'];
                $this->_detalle_estadia->fecha_reserva=$_POST['FECHA_RESERVA'];
                $this->_detalle_estadia->inserta();
            }
            $this->redireccionar('estadia');
        }
        $this->_vista->datos_paises = $this->_paises->selecciona();
        $this->_vista->datos_membresias= $this->_membresia->selecciona();
        $this->_vista->datos_profesiones = $this->_profesiones->selecciona();
        
        $this->_vista->datos_habitaciones=  $this->_habitaciones->selecciona();
        $this->_vista->titulo = 'Registrar reserva';
        $this->_vista->action = BASE_URL.'reserva';
        $this->_vista->setJs(array('funciones','funciones_form_pasajeros'));
        $this->_vista->renderizar('index');
    }
    
    public function buscar_habitaciones_disponibles(){
        $this->_detalle_estadia->fecha_ingreso=$_POST['fecha_entrada'];
        $this->_detalle_estadia->fecha_salida=$_POST['fecha_salida'];
        echo json_encode($this->_detalle_estadia->selecciona());
    }
    
    public function busca_tipo_habitacionxhabitacion() {
        $this->_habitacion_especifica->idhabitacion=$_POST['idhabitacion'];
        echo json_encode($this->_habitacion_especifica->selecciona());
    }
    
    public function get_habitacion_especifica(){
        $this->_habitacion_especifica->idhabitacion=$_POST['idhabitacion'];
        $this->_habitacion_especifica->idtipo_habitacion=$_POST['idtipo_habitacion'];
        echo json_encode($this->_habitacion_especifica->selecciona());
    }
    
    public function inserta_pasajero(){
        $this->_clientes->nombres = $_POST['nombres'];
        $this->_clientes->apellidos = $_POST['apellidos'];
        $this->_clientes->documento = $_POST['documento'];
        $this->_clientes->fecha_nacimiento = $_POST['fecha_nacimiento'];
        $this->_clientes->sexo = $_POST['sexo'];
        $this->_clientes->telefono=$_POST['telefono'] ;
        $this->_clientes->email= $_POST['email'];
        $this->_clientes->estado_civil = $_POST['estado_civil'];
        if(isset ($_POST['profesion'])){
            $this->_clientes->idprofesion = $_POST['profesion'];
        }else{
            $this->_clientes->idprofesion = 67;
        }
        $this->_clientes->idubigeo = $_POST['ubigeo'];
        if(isset ($_POST['membresia'])){
            $this->_clientes->idmembresia = $_POST['membresia'];
        }else{
            $this->_clientes->idmembresia = 0;
        }
        $this->_clientes->direccion = $_POST['direccion'];
        $this->_clientes->tipo = $_POST['tipo_cliente'];
        echo json_encode($this->_clientes->inserta());
    }
    
}

?>
