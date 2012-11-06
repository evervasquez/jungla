<?php

class habitaciones_controlador extends controller {
    
    private $_habitaciones;
    private $_habitacion_especifica;
    private $_tipo_habitacion;

    public function __construct() {
        parent::__construct();
        $this->_habitaciones = $this->cargar_modelo('habitaciones');
        $this->_habitacion_especifica= $this->cargar_modelo('habitacion_especifica');
        $this->_tipo_habitacion= $this->cargar_modelo('tipo_habitacion');
    }

    public function index() {
        $this->_habitaciones->idhabitacion = 0;
        $this->_vista->datos = $this->_habitaciones->selecciona();
        $this->_vista->renderizar('index');
    }
    
    public function nuevo() {
        if ($_POST['guardar'] == 1) {
//            echo '<pre>';
//            print_r($_POST);
//            echo '</pre>';
//            exit;
            $this->_habitaciones->idhabitacion=0;
            $this->_habitaciones->descripcion=$_POST['descripcion'];
            $this->_habitaciones->nro_habitacion=$_POST['nro_habitacion'];
            $this->_habitaciones->ventilacion=$_POST['ventilacion'];
            $this->_habitaciones->estado=$_POST['estado'];
        }
        $this->_tipo_habitacion->idtipo_habitacion=0;
        $this->_vista->datos_tipo_habitacion=$this->_tipo_habitacion->selecciona();
        $this->_vista->titulo = 'Registrar Habitacion';
        $this->_vista->action = BASE_URL . 'habitaciones/nuevo';
        $this->_vista->renderizar('form');
    }
    
    public function inserta_tmphabitacion(){
        $this->_tmp_habitacion->idtmp_habitacion=$POST['idtmp_habitacion'];
        $this->_tmp_habitacion->idtipo_habitacion=$POST['idtipo_habitacion'];
        $this->_tmp_habitacion->costo=$POST['costo'];   
        $this->_tmp_habitacion->observacion=$POST['observacion'];   
    }
    
}

?>
