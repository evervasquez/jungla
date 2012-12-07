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
        if (!$this->acceso(2)) {
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
        $this->_vista->datos = $this->_empleados->selecciona();
        $this->_vista->setJs(array('funcion'));
        $this->_vista->setCss(array('estilos_index'));
        $this->_vista->renderizar('index');
    }
        
    public function buscador(){
        if($_POST['filtro']==0){
            $this->_empleados->nombres=$_POST['cadena'];
        }
        if($_POST['filtro']==1){
            $this->_empleados->apellidos = $_POST['cadena'];
        }
        if($_POST['filtro']==2){
            $this->_empleados->perfil = $_POST['cadena'];
        }
        echo json_encode($this->_empleados->selecciona());
    }
    
    public function nuevo() {
        if ($_POST['guardar'] == 1) {
            $this->_empleados->nombres = $_POST['nombres'];
            $this->_empleados->apellidos = $_POST['apellidos'];
            $this->_empleados->dni = $_POST['dni'];
            $this->_empleados->telefono = $_POST['telefono'];
            $this->_empleados->direccion = $_POST['direccion'];
//            $this->_empleados->fecha_nacimiento = $this->fecha_en($_POST['fecha_nacimiento']);
            $this->_empleados->fecha_nacimiento = $_POST['fecha_nacimiento'];
            $this->_empleados->fecha_contratacion = $_POST['fecha_contratacion'];
//            $this->_empleados->fecha_contratacion = $this->fecha_en($_POST['fecha_contratacion']);
            $this->_empleados->idubigeo = $_POST['ubigeo'];
            $this->_empleados->idperfil = $_POST['perfil'];
            $this->_empleados->idprofesion = $_POST['profesion'];
            $this->_empleados->usuario = $_POST['usuario'];
            $this->_empleados->clave = $_POST['clave'];
            $this->_empleados->estado = 1;
            $this->_empleados->idactividad = $_POST['actividad'];
            $this->_empleados->idtipo_empleado = $_POST['tipo_empleado'];
            $this->_empleados->inserta();
            $this->redireccionar('empleados');
        }        
        $this->_provincias->codigo_region = 1901;
        $this->_vista->datos_provincias = $this->_provincias->selecciona();
        
        $this->_ubigeos->codigo_provincia = 1968;
         $this->_vista->datos_ubigeos = $this->_ubigeos->selecciona();
        
        $this->_vista->datos_perfiles = $this->_perfiles->selecciona();
        
        $this->_vista->datos_profesiones = $this->_profesiones->selecciona();
        
        $this->_vista->datos_actividades = $this->_actividades->selecciona();
        
        $this->_vista->datos_tipo_empleado = $this->_tipo_empleado->selecciona();
        
        $this->_vista->titulo = 'Registrar Empleado';
        $this->_vista->action = BASE_URL . 'empleados/nuevo';
        $this->_vista->setJs(array('funciones_form'));
        $this->_vista->renderizar('form');
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
        if ($usuario['usuario'] == '') {
            echo '<a class="imgselect" title="Valido"></a><input type="hidden" id="val_usuario" value="1" />';
        } else {
            echo '<a class="imgdelete" title="En uso"></a><input type="hidden" id="val_usuario" value="0" />';
        }
    }
    
    public function ver(){
        $this->_empleados->idempleado=$_POST['idempleado'];
       echo json_encode($this->_empleados->selecciona());
    }

    public function editar($id) {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('empleados');
        }
        if($this->filtrarInt($id)!=session::get('idempleado')){
            echo "<script>alert('No puede editar los datos de otro empleado')</script>";
            $this->redireccionar('empleados');
        }
        if ($_POST['guardar'] == 1) {
            $this->_empleados->idempleado = $_POST['codigo'];
            $this->_empleados->nombres = $_POST['nombres'];
            $this->_empleados->apellidos = $_POST['apellidos'];
            $this->_empleados->dni = $_POST['dni'];
            $this->_empleados->telefono = $_POST['telefono'];
            $this->_empleados->direccion = $_POST['direccion'];
//            $this->_empleados->fecha_nacimiento = $this->fecha_en($_POST['fecha_nacimiento']);
            $this->_empleados->fecha_nacimiento = $_POST['fecha_nacimiento'];
            $this->_empleados->fecha_contratacion = $_POST['fecha_contratacion'];
//            $this->_empleados->fecha_contratacion = $this->fecha_en($_POST['fecha_contratacion']);
            $this->_empleados->idubigeo = $_POST['ubigeo'];
            $this->_empleados->idperfil = $_POST['perfil'];
            $this->_empleados->idprofesion = $_POST['profesion'];
            $this->_empleados->usuario = $_POST['usuario'];
            $this->_empleados->clave = $_POST['clave'];
            $this->_empleados->estado = 1;
            $this->_empleados->idactividad = $_POST['actividad'];
            $this->_empleados->idtipo_empleado = $_POST['tipo_empleado'];
            $this->_empleados->actualiza();
            $this->redireccionar('empleados');
        }

        $this->_empleados->idempleado = $this->filtrarInt($id);
        $datos = $this->_empleados->selecciona();
//        echo '<pre>';
//        print_r($datos);exit;
        //obtenemos todas las provincias que pertenecen a la región del empleado
        $this->_provincias->codigo_region = 1901;
        $this->_vista->datos_provincias = $this->_provincias->selecciona();
        //obtenemos todas las ciudades que pertenecen a la provincia del empleado
        $this->_ubigeos->codigo_provincia = $datos[0]['IDPROVINCIA'];
        $this->_vista->datos_ubigeos = $this->_ubigeos->selecciona();

        $this->_vista->datos = $datos;
        $this->_vista->datos_perfiles = $this->_perfiles->selecciona();
        
        $this->_vista->datos_profesiones = $this->_profesiones->selecciona();
        
        $this->_vista->datos_actividades = $this->_actividades->selecciona();
        
        $this->_vista->datos_tipo_empleado = $this->_tipo_empleado->selecciona();
        
        $this->_vista->titulo = 'Actualizar Empleado';
        $this->_vista->setJs(array('funciones_form'));
        $this->_vista->renderizar('form');
    }

    public function eliminar($id) {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('empleados');
        }
        if($this->filtrarInt($id)!=session::get('idempleado')){
            echo "<script>alert('No puede eliminar los datos de otro empleado')</script>";
            $this->redireccionar('empleados');
        }
        $this->_empleados->idempleado = $this->filtrarInt($id);
        $this->_empleados->elimina();
        $this->redireccionar('empleados');
    }
    
}

?>
