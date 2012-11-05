<?php

class empleados_controlador extends controller {
    
    private $_empleados;
    private $_paises;
    private $_regiones;
    private $_provincias;
    private $_ubigeos;
    private $_perfiles;
    private $_profesiones;
    private $_actividades;
    private $_tipo_empleado;
    
    public function __construct() {
        if (!$this->acceso(session::get('perfil'), 'Empleados')) {
            $this->redireccionar('error/access/5050');
        }
        parent::__construct();
        $this->_empleados = $this->cargar_modelo('empleados');
        $this->_paises = $this->cargar_modelo('paises');
        $this->_regiones = $this->cargar_modelo('regiones');
        $this->_provincias = $this->cargar_modelo('provincias');
        $this->_ubigeos = $this->cargar_modelo('ubigeos');
        $this->_perfiles = $this->cargar_modelo('perfiles');
        $this->_profesiones = $this->cargar_modelo('profesiones');
        $this->_actividades = $this->cargar_modelo('actividades');
        $this->_tipo_empleado= $this->cargar_modelo('tipo_empleado');
    }

    public function index() {
        $this->_empleados->idempleado = 0;
        $this->_empleados->nombres = '';
        $this->_empleados->apellidos = '';
        $this->_empleados->perfil = '';
        $this->_empleados->ubigeo = '';
        $this->_vista->datos = $this->_empleados->selecciona();
        $this->_vista->renderizar('index');
    }
    
    public function buscador(){
        $this->_empleados->idempleado = 0;
        if($_POST['filtro']==0){
            $this->_empleados->nombres=$_POST['cadena'];
            $this->_empleados->apellidos = '';
            $this->_empleados->perfil = '';
            $this->_empleados->ubigeo = '';
        }
        if($_POST['filtro']==1){
            $this->_empleados->nombres = '';
            $this->_empleados->apellidos = $_POST['cadena'];
            $this->_empleados->perfil = '';
            $this->_empleados->ubigeo = '';
        }
        if($_POST['filtro']==2){
            $this->_empleados->nombres = '';
            $this->_empleados->apellidos = '';
            $this->_empleados->perfil = $_POST['cadena'];
            $this->_empleados->ubigeo = '';
        }
        if($_POST['filtro']==3){
            $this->_empleados->nombres = '';
            $this->_empleados->apellidos = '';
            $this->_empleados->perfil = '';
            $this->_empleados->ubigeo = $_POST['cadena'];
        }
        echo json_encode($this->_ubicaciones->selecciona());
    }
    
    public function nuevo() {
        if ($_POST['guardar'] == 1) {
//            echo '<pre>';
//            print_r($_POST);
//            echo '</pre>';
//            exit;
            $this->_empleados->idempleado = 0;
            $this->_empleados->nombres = $_POST['nombres'];
            $this->_empleados->apellidos = $_POST['apellidos'];
            $this->_empleados->dni = $_POST['dni'];
            $this->_empleados->telefono = $_POST['telefono'];
            $this->_empleados->direccion = $_POST['direccion'];
            $this->_empleados->fecha_nacimiento = $this->fecha_en($_POST['fecha_nacimiento']);
            $this->_empleados->fecha_contratacion = $this->fecha_en($_POST['fecha_contratacion']);
            $this->_empleados->idubigeo = $_POST['ubigeo'];
            $this->_empleados->idperfil = $_POST['perfil'];
            $this->_empleados->idprofesion = $_POST['profesion'];
            $this->_empleados->usuario = $_POST['usuario'];
            $this->_empleados->clave = $_POST['clave'];
            $this->_empleados->estado = $_POST['estado'];
            $this->_empleados->idactividad = $_POST['actividad'];
            $this->_empleados->idtipo_empleado = $_POST['tipo_empleado'];
            $this->_empleados->inserta();
            $this->redireccionar('empleados');
        }
        $this->_paises->idpais = 0;
        $this->_vista->datos_paises = $this->_paises->selecciona();        
        
        $this->_regiones->codigo_region = 0;
        $this->_regiones->idpais = 193;
        $this->_vista->datos_regiones =$this->_regiones->selecciona();
        
        $this->_provincias->codigo_provincia = 0;
        $this->_provincias->codigo_region = 1901;
        $this->_vista->datos_provincias = $this->_provincias->selecciona();
        
        $this->_ubigeos->idubigeo = 0;
        $this->_ubigeos->codigo_provincia = 1968;
         $this->_vista->datos_ubigeos = $this->_ubigeos->selecciona();
        
        $this->_perfiles->idperfil = 0;
        $this->_vista->datos_perfiles = $this->_perfiles->selecciona();
        
        $this->_profesiones->idprofesion = 0;
        $this->_vista->datos_profesiones = $this->_profesiones->selecciona();
        
        $this->_actividades->idactividad = 0;
        $this->_vista->datos_actividades = $this->_actividades->selecciona();
        
        $this->_tipo_empleado->idtipo_empleado = 0;
        $this->_vista->datos_tipo_empleado = $this->_tipo_empleado->selecciona();
        
        $this->_vista->titulo = 'Registrar Empleado';
        $this->_vista->action = BASE_URL . 'empleados/nuevo';
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

    public function valida_usuario() {
        $usuario = $this->_empleados->seleccionar($_POST['usuario'], '');
        if ($usuario[0]['usuario'] == '') {
            echo 'correcto';
        } else {
            echo 'incorrecto';
        }
    }

    public function editar($id) {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('empleados');
        }
        if ($_POST['guardar'] == 1) {
//            echo '<pre>';
//            print_r($_POST);
//            echo '</pre>';
//            exit;
            $this->_empleados->idempleado = $_POST['codigo'];
            $this->_empleados->nombres = $_POST['nombres'];
            $this->_empleados->apellidos = $_POST['apellidos'];
            $this->_empleados->dni = $_POST['dni'];
            $this->_empleados->telefono = $_POST['telefono'];
            $this->_empleados->direccion = $_POST['direccion'];
            $this->_empleados->fecha_nacimiento = $this->fecha_en($_POST['fecha_nacimiento']);
            $this->_empleados->fecha_contratacion = $this->fecha_en($_POST['fecha_contratacion']);
            $this->_empleados->idubigeo = $_POST['ubigeo'];
            $this->_empleados->idperfil = $_POST['perfil'];
            $this->_empleados->idprofesion = $_POST['profesion'];
            $this->_empleados->usuario = $_POST['usuario'];
            $this->_empleados->clave = $_POST['clave'];
            $this->_empleados->estado = $_POST['estado'];
            $this->_empleados->idactividad = $_POST['actividad'];
            $this->_empleados->idtipo_empleado = $_POST['tipo_empleado'];
            $this->_empleados->actualiza();
            $this->redireccionar('empleados');
        }

        $this->_empleados->idempleado = $this->filtrarInt($id);
        $datos = $this->_empleados->selecciona();
//        echo '<pre>';
//        print_r($datos);
//        echo '</pre>';
//        exit;
        //obtenemos todos los paises
        $this->_paises->idpais = 0;
        $this->_vista->datos_paises = $this->_paises->selecciona();
        //obtenemos todas las regiones que pertenecen al pais del empleado
        $this->_regiones->codigo_region = 0;
        $this->_regiones->idpais = $datos[0]['idpais'];
        $this->_vista->datos_regiones = $this->_regiones->selecciona();
//        echo '<pre>';
//        print_r($this->_vista->datos_regiones);
//        echo '</pre>';
//        exit;
        //obtenemos todas las provincias que pertenecen a la región del empleado
        $this->_provincias->codigo_provincia = 0;
        $this->_provincias->codigo_region = $datos[0]['idregion'];
        $this->_vista->datos_provincias = $this->_provincias->selecciona();
//        echo '<pre>';
//        print_r($this->_vista->datos_provincias);
//        echo '</pre>';
//        exit;
        //obtenemos todas las ciudades que pertenecen a la provincia del empleado
        $this->_ubigeos->idubigeo = 0;
        $this->_ubigeos->codigo_provincia = $datos[0]['idprovincia'];
        $this->_vista->datos_ubigeos = $this->_ubigeos->selecciona();

        $this->_vista->datos = $datos;
        $this->_perfiles->idperfil = 0;
        $this->_vista->datos_perfiles = $this->_perfiles->selecciona();
        
        $this->_profesiones->idprofesion = 0;
        $this->_vista->datos_profesiones = $this->_profesiones->selecciona();
        
        $this->_actividades->idactividad = 0;
        $this->_vista->datos_actividades = $this->_actividades->selecciona();
        
        $this->_tipo_empleado->idtipo_empleado = 0;
        $this->_vista->datos_tipo_empleado = $this->_tipo_empleado->selecciona();
        
        $this->_vista->titulo = 'Actualizar Empleado';
        $this->_vista->renderizar('form');
    }

    public function eliminar($id) {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('empleados');
        }
        $this->_empleados->idempleado = $this->filtrarInt($id);
        $this->_empleados->elimina();
        $this->redireccionar('empleados');
    }
    
}

?>
