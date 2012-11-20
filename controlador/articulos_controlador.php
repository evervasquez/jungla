<?php

class articulos_controlador extends controller {
    
    private $_articulos;

    public function __construct() {
        parent::__construct();
        $this->_articulos = $this->cargar_modelo('articulos');
    }

    public function index() {
        $this->_vista->datos = $this->_articulos->selecciona();
        $this->_vista->setJs(array('funcion'));
        $this->_vista->renderizar('index');
    }
    
    public function buscador(){
        if($_POST['filtro']==0){
            $this->_articulos->titulo=$_POST['titulo'];
        }
        echo json_encode($this->_articulos->selecciona());
    }
    
    public function nuevo(){
        if ($_POST['guardar'] == 1) {
            $this->_articulos->titulo = $_POST['titulo'];
            $this->_articulos->descripcion = $_POST['descripcion'];
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
            $this->redireccionar('articulos');
        }

        $this->_articulos->idarticulo = $this->filtrarInt($id);
        $this->_vista->datos = $this->_articulos->selecciona();

        if ($_POST['guardar'] == 1) {
            $this->_articulos->idarticulo = $_POST['codigo'];
            $this->_articulos->titulo = $_POST['titulo'];
            $this->_articulos->descripcion = $_POST['descripcion'];
            $this->_articulos->actualiza();
            $this->redireccionar('articulos');
        }
        $this->_vista->titulo = 'Actualizar Articulo';
        $this->_vista->setJs(array('funciones_form'));
        $this->_vista->renderizar('form');
    }

    public function eliminar($id) {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('articulos');
        }
        $this->_articulos->idarticulo = $this->filtrarInt($id);
        $this->_articulos->elimina();
        $this->redireccionar('articulos');
    }
}
?>
