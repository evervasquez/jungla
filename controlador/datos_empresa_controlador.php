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
    
    public function nuevo(){
        if ($_POST['guardar'] == 1) {
            $this->_articulos->titulo = $_POST['titulo'];
            $this->_articulos->descripcion = $_POST['descripcion'];
            $this->_articulos->imagen = $imagen;
            $this->_articulos->inserta();
            $this->redireccionar('articulos');
        }
        $this->_vista->titulo = 'Registrar Articulo';
        $this->_vista->action = BASE_URL . 'articulos/nuevo';
        $this->_vista->setJs(array('funciones_form'));
        $this->_vista->renderizar('form');
    }

    public function editar($id) {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('datos_empresa');
        }

        $this->_vista->datos = $this->_datos_empresa->selecciona();
        
        if ($_POST['guardar'] == 1) {
            $this->_articulos->idarticulo = $_POST['codigo'];
            $this->_articulos->titulo = $_POST['titulo'];
            $this->_articulos->descripcion = $_POST['descripcion'];
            $this->_articulos->imagen = $imagen;
            $this->_articulos->actualiza();
            $this->redireccionar('articulos');
        }
        $this->_vista->titulo = 'Actualizar Datos de la Empresa';
        $this->_vista->setJs(array('funciones_form'));
        $this->_vista->setCss(array('estilos_form'));
        $this->_vista->renderizar('form');
    }
    
}
?>
