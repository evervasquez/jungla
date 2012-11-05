<?php

class categorias_controlador extends controller {
    
    private $_categorias;

    public function __construct() {
        parent::__construct();
        $this->_categorias = $this->cargar_modelo('categorias');
    }

    public function index() {
        $this->_categorias->idcategoria = 0;
        $this->_categorias->descripcion = '';
        $this->_vista->datos = $this->_categorias->selecciona();
        $this->_vista->renderizar('index');
    }
    
    public function buscador(){
        $this->_categorias->idcategoria = 0;
        if($_POST['filtro']==0){
            $this->_categorias->descripcion=$_POST['descripcion'];
        }
        echo json_encode($this->_categorias->selecciona());
    }

    public function nuevo() {
        if ($_POST['guardar'] == 1) {
            $this->_categorias->idcategoria = 0;
            $this->_categorias->descripcion = $_POST['descripcion'];
            $this->_categorias->nro_elemento = $_POST['nro_elemento'];
            $this->_categorias->inserta();
            $this->redireccionar('categorias');
        }
        $this->_vista->titulo = 'Registrar Categoria';
        $this->_vista->action = BASE_URL . 'categorias/nuevo';
        $this->_vista->renderizar('form');
    }

    public function editar($id) {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('categorias');
        }

        $this->_categorias->idcategoria = $this->filtrarInt($id);
        $this->_vista->datos = $this->_categorias->selecciona();

        if ($_POST['guardar'] == 1) {
            $this->_categorias->idcategoria = $_POST['codigo'];
            $this->_categorias->descripcion = $_POST['descripcion'];
            $this->_categorias->nro_elemento = $_POST['nro_elemento'];
            $this->_categorias->actualiza();
            $this->redireccionar('categorias');
        }
        $this->_vista->titulo = 'Actualizar Categoria';
        $this->_vista->renderizar('form');
    }

    public function eliminar($id) {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('categorias');
        }
        $this->_categorias->idcategoria = $this->filtrarInt($id);
        $this->_categorias->elimina();
        $this->redireccionar('categorias');
    }
}

?>
