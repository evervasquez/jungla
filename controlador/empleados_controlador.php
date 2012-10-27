<?php

class empleados_controlador extends controller {
    
    private $_empleados;
    private $_ubigeos;
    private $_perfiles;
    private $_profesiones;

    public function __construct() {
        parent::__construct();
        $this->_empleados = $this->cargar_modelo('empleados');
        $this->_ubigeos = $this->cargar_modelo('ubigeos');
        $this->_perfiles = $this->cargar_modelo('perfiles');
        $this->_profesiones = $this->cargar_modelo('profesiones');
    }

    public function index() {
        $this->_empleados->idempleado = 0;
        $this->_vista->datos = $this->_empleados->selecciona();
        $this->_vista->renderizar('index');
    }

    public function nuevo() {
        if ($_POST['guardar'] == 1) {
            $this->_empleados->idempleado = 0;
            $this->_empleados->nombres = $_POST['nombres'];
            $this->_empleados->apellidos = $_POST['apellidos'];
            $this->_empleados->dni = $_POST['dni'];
            $this->_empleados->telefono = $_POST['telefono'];
            $this->_empleados->direccion = $_POST['direccion'];
            $this->_empleados->idubigeo = $_POST['ubigeo'];
            $this->_empleados->idprofesion = $_POST['profesion'];
            $this->_empleados->fecha_nacimiento = $this->fecha_en($_POST['fecha_nacimiento']);
            $this->_empleados->fecha_contratacion = $this->fecha_en($_POST['fecha_contratacion']);
            $this->_empleados->idperfil = $_POST['perfil'];
            $this->_empleados->usuario = $_POST['usuario'];
            $this->_empleados->clave = $_POST['clave'];
            $this->_empleados->estado = $_POST['estado'];
            $this->_empleados->inserta();
            $this->redireccionar('empleados');
        }
//        $this->_ubigeos->idubigeo=0;
//        $this->_vista->datos_ubigeos = $this->_ubigeos->selecciona();
        $this->_perfiles->idperfil=0;
        $this->_vista->datos_perfiles = $this->_perfiles->selecciona();
        $this->_profesiones->idprofesion=0;
        $this->_vista->datos_profesiones = $this->_profesiones->selecciona();
        $this->_vista->titulo = 'Registrar Empleado';
        $this->_vista->action = BASE_URL . 'empleados/nuevo';
        $this->_vista->renderizar('form');
    }

    public function editar($id) {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('empleados');
        }

        $this->_empleados->idempleado = $this->filtrarInt($id);
        $this->_vista->datos = $this->_empleados->selecciona();
        //        $this->_ubigeos->idubigeo=0;
//        $this->_vista->datos_ubigeos = $this->_ubigeos->selecciona();
        $this->_perfiles->idperfil=0;
        $this->_vista->datos_perfiles = $this->_perfiles->selecciona();
        $this->_profesiones->idprofesion=0;
        $this->_vista->datos_profesiones = $this->_profesiones->selecciona();

        if ($_POST['guardar'] == 1) {
            $this->_empleados->idempleado = $_POST['codigo'];
            $this->_empleados->nombres = $_POST['nombre'];
            $this->_empleados->apellidos = $_POST['apellidos'];
            $this->_empleados->dni = $_POST['dni'];
            $this->_empleados->telefono = $_POST['telefono'];
            $this->_empleados->direccion = $_POST['direccion'];
            $this->_empleados->idubigeo = $_POST['ubigeo'];
            $this->_empleados->idprofesion = $_POST['profesion'];
            $this->_empleados->fecha_nacimiento = $this->fecha_en($_POST['fecha_nacimiento']);
            $this->_empleados->fecha_contratacion = $this->fecha_en($_POST['fecha_contratacion']);
            $this->_empleados->idperfil = $_POST['perfil'];
            $this->_empleados->usuario = $_POST['usuario'];
            $this->_empleados->clave = $_POST['clave'];
            $this->_empleados->estado = $_POST['estado'];
            $this->_empleados->actualiza();
            $this->redireccionar('empleados');
        }
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
