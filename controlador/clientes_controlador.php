<?php

class clientes_controlador extends controller {
    
    private $_clientes;
    private $_paises;
    private $_regiones;
    private $_provincias;
    private $_ubigeos;
    private $_membresias;
    private $_profesiones;
    
    public function __construct() {
        parent::__construct();
        $this->_clientes = $this->cargar_modelo('clientes');
        $this->_paises = $this->cargar_modelo('paises');
        $this->_regiones = $this->cargar_modelo('regiones');
        $this->_provincias = $this->cargar_modelo('provincias');
        $this->_ubigeos = $this->cargar_modelo('ubigeos');
        $this->_membresias= $this->cargar_modelo('membresia');
        $this->_profesiones = $this->cargar_modelo('profesiones');
    }
    
    public function index() {
        $this->_vista->renderizar('index');
    }
    
    public function nuevo(){
        if ($_POST['guardar'] == 1) {
            echo '<pre>';
            print_r($_POST);
            echo '</pre>';
            exit;
            $this->_clientes->idcliente = 0;
            $this->_clientes->nombres = $_POST['nombres'];
            $this->_clientes->apellidos = $_POST['apellidos'];
            $this->_clientes->documento = $_POST['documento'];
            $this->_clientes->fecha_nacimiento = $this->fecha_en($_POST['fecha_nacimiento']);
            $this->_clientes->sexo = $_POST['sexo'];
            $this->_clientes->telefono=$_POST['telefono'] ;
            $this->_clientes->email= $_POST['email'];
            $this->_clientes->estado_civil= $_POST['estado_civil'];
            $this->_clientes->idprofesion = $_POST['profesion'];
            $this->_clientes->idubigeo= $_POST['ubigeo'];
            $this->_clientes->idmembresia = $_POST['membresia'];
//            $this->_clientes->direccion = $_POST['direccion'];
            $this->_clientes->inserta();
            $this->redireccionar('clientes');
        }
        $this->_paises->idpais = 0;
        $this->_vista->datos_paises = $this->_paises->selecciona();
        $this->_membresias->idmembresia= 0;
        $this->_vista->datos_membresias= $this->_membresias->selecciona();
        $this->_profesiones->idprofesion = 0;
        $this->_vista->datos_profesiones = $this->_profesiones->selecciona();
        $this->_vista->titulo = 'Registrar Cliente';
        $this->_vista->action = BASE_URL . 'clientes/nuevo';
        $this->_vista->renderizar('form');
    }
    
    public function get_regiones() {
        $this->_regiones->codigo_region = 0;
        $this->_regiones->idpais = $_POST['idpais'];
        echo json_encode($this->_regiones->selecciona());
    }

    public function get_provincias() {
        $this->_provincias->codigo_provincia = 0;
        $this->_provincias->codigo_region = $_POST['idregion'];
        echo json_encode($this->_provincias->selecciona());
    }

    public function get_ciudades() {
        $this->_ubigeos->idubigeo = 0;
        $this->_ubigeos->codigo_provincia = $_POST['idprovincia'];
        echo json_encode($this->_ubigeos->selecciona());
    }
        
}

?>
