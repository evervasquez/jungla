<?php

class habitaciones_controlador extends controller {
    
    private $_habitaciones;
    private $_habitacion_especifica;
    private $_tipo_habitacion;

    public function __construct() {
        if (!$this->acceso(27)) {
            $this->redireccionar('error/access/5050');
        }
        parent::__construct();
        $this->_habitaciones = $this->cargar_modelo('habitaciones');
        $this->_habitacion_especifica= $this->cargar_modelo('habitacion_especifica');
        $this->_tipo_habitacion= $this->cargar_modelo('tipo_habitacion');
    }

    public function index() {
        $this->_habitaciones->idhabitacion = 0;
        $this->_vista->datos = $this->_habitaciones->selecciona();
        $this->_vista->setJs(array('funcion'));
        $this->_vista->setCss(array('estilos'));
        $this->_vista->renderizar('index');
    }
    public function buscador(){
        $this->_habitaciones->idhabitacion = 0;
        if($_POST['filtro']==0){
            $this->_habitaciones->nro_habitacion=$_POST['descripcion'];
        }
        echo json_encode($this->_habitaciones->selecciona());
    }
    
    public function ver(){
        $this->_habitaciones->idhabitacion=$_POST['idhabitacion'];
        echo json_encode($this->_habitaciones->selecciona());
                
    }
    
    public function ver2(){
        $this->_habitacion_especifica->idhabitacion=$_POST['idhabitacion'];
        echo json_encode($this->_habitacion_especifica->selecciona());
    }
    
    public function nuevo() {
        if ($_POST['guardar'] == 1) {
//            echo '<pre>';
//            print_r($_POST);
//            echo '</pre>';
//            exit;
            //inserta habitacion
            $this->_habitaciones->descripcion=$_POST['nro_habitacion'];
            $this->_habitaciones->nro_habitacion=$_POST['nro_habitacion'];
            $this->_habitaciones->ventilacion=$_POST['ventilacion'];
            $this->_habitaciones->estado=$_POST['estado'];
            $this->_habitaciones->tipo_habitacion_predet=$_POST['tipo_habitacion_predet'];
            $dato_habitacion=$this->_habitaciones->inserta();
            //inserta habitacion especifica
            for($i=0;$i<count($_POST['tipo_habitacion']);$i++){
                $this->_habitacion_especifica->idhabitacion=$dato_habitacion[0]['IDHABITACION'];
                $this->_habitacion_especifica->idtipo_habitacion= $_POST['tipo_habitacion'][$i];
                $this->_habitacion_especifica->costo= $_POST['costo'][$i];
                $this->_habitacion_especifica->observaciones= $_POST['observacion'][$i];
                $this->_habitacion_especifica->inserta();
            }
            $this->redireccionar('habitaciones');
            
        }
        $this->_vista->datos_tipo_habitacion=$this->_tipo_habitacion->selecciona();
        $this->_vista->titulo = 'Registrar Habitacion';
        $this->_vista->action = BASE_URL . 'habitaciones/nuevo';
        $this->_vista->setJs(array('funciones_form'));
        $this->_vista->renderizar('form');
    }
    
    public function editar($id){
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('habitaciones');
        }
        if ($_POST['guardar'] == 1) {
//            echo '<pre>';
//            print_r($_POST);
//            echo '</pre>';
//            exit;
            //inserta habitacion
            $this->_habitaciones->idhabitacion=$_POST['codigo'];
            $this->_habitaciones->descripcion=$_POST['nro_habitacion'];
            $this->_habitaciones->nro_habitacion=$_POST['nro_habitacion'];
            $this->_habitaciones->ventilacion=$_POST['ventilacion'];
            $this->_habitaciones->estado=$_POST['estado'];
            $this->_habitaciones->tipo_habitacion_predet=$_POST['tipo_habitacion_predet'];
            $this->_habitaciones->actualiza();
            $this->redireccionar('habitaciones');
            
        }
        $this->_habitaciones->idhabitacion=$this->filtrarInt($id);
        $this->_vista->datos=$this->_habitaciones->selecciona();
        $this->_habitacion_especifica->idhabitacion=$this->filtrarInt($id);
        $this->_vista->datos_habitacion_especifica=$this->_habitacion_especifica->selecciona();
//        echo '<pre>';
//                print_r($this->_vista->datos_habitacion_especifica);exit;
        $this->_vista->datos_tipo_habitacion=$this->_tipo_habitacion->selecciona();
        $this->_vista->titulo = 'Actualizar Habitacion';
        $this->_vista->setJs(array('funciones_form'));
        $this->_vista->renderizar('form');
    }
    
    public function eliminar($id) {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('habitaciones');
        }
        $this->_habitaciones->idhabitacion = $this->filtrarInt($id);
        $this->_habitaciones->elimina();
        $this->redireccionar('habitaciones');
    }
    
    public function eliminar_habitacion_especifica(){
        $this->_habitacion_especifica->idhabitacion=$_POST['idhabitacion'];
        $this->_habitacion_especifica->idtipo_habitacion=$_POST['idtipo_habitacion'];
        $this->_habitacion_especifica->elimina();
    }
    
    public function insertar_habitacion_especifica(){
        $this->_habitacion_especifica->idhabitacion=$_POST['idhabitacion'];
        $this->_habitacion_especifica->idtipo_habitacion=$_POST['idtipo_habitacion'];
        $this->_habitacion_especifica->costo=$_POST['costo'];
        $this->_habitacion_especifica->observaciones=$_POST['observaciones'];
        $this->_habitacion_especifica->inserta();
    }
    
}

?>
