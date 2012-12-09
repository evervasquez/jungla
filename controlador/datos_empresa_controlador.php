<?php

class datos_empresa_controlador extends controller {
    
    private $_datos_empresa;

    public function __construct() {
        if (!$this->acceso(50)) {
            $this->redireccionar('error/access/5050');
        }
        parent::__construct();
        $this->_datos_empresa = $this->cargar_modelo('datos_empresa');
    }

    public function index() {
        $this->_vista->datos = $this->_datos_empresa->selecciona();
        $this->_vista->renderizar('index');
    }
    
    public function nuevo() {
        if ($_POST['guardar'] == 1) {
            $this->_datos_empresa->telefono = $_POST['telefono'];
            $this->_datos_empresa->movistar = $_POST['movistar'];
            $this->_datos_empresa->rpm = $_POST['rpm'];
            $this->_datos_empresa->rpc = $_POST['rpc'];
            $this->_datos_empresa->direccion = $_POST['direccion'];
            $this->_datos_empresa->e_mail = $_POST['e_mail'];
            $this->_datos_empresa->presentacion = $_POST['presentacion'];
            $this->_datos_empresa->mision = $_POST['mision'];
            $this->_datos_empresa->vision = $_POST['vision'];
            $this->_datos_empresa->inserta();
            $this->redireccionar('datos_empresa');
        }
        $this->_vista->titulo = 'Registrar Datos Empresa';
        $this->_vista->action = BASE_URL . 'datos_empresa/nuevo';
        $this->_vista->setJs(array('funciones_form'));
        $this->_vista->setCss(array('estilos_form'));
        $this->_vista->renderizar('form');
    }

    public function editar($id) {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('datos_empresa');
        }

        $this->_vista->datos = $this->_datos_empresa->selecciona();
        
        if ($_POST['guardar'] == 1) {
            $this->_datos_empresa->telefono = $_POST['telefono'];
            $this->_datos_empresa->movistar = $_POST['movistar'];
            $this->_datos_empresa->rpm = $_POST['rpm'];
            $this->_datos_empresa->rpc = $_POST['rpc'];
            $this->_datos_empresa->direccion = $_POST['direccion'];
            $this->_datos_empresa->e_mail = $_POST['e_mail'];
            $this->_datos_empresa->presentacion = $_POST['presentacion'];
            $this->_datos_empresa->mision = $_POST['mision'];
            $this->_datos_empresa->vision = $_POST['vision'];
            $this->_datos_empresa->actualiza();
            $this->redireccionar('datos_empresa');
        }
        $this->_vista->titulo = 'Actualizar Datos de la Empresa';
        $this->_vista->setJs(array('funciones_form'));
        $this->_vista->setCss(array('estilos_form'));
        $this->_vista->renderizar('form');
    }
    
}
?>
