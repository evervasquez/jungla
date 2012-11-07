<?php

class tipo_producto_controlador extends controller {
    
 private $_tipo_producto;

    public function __construct() {
        parent::__construct();
        $this->_tipo_producto = $this->cargar_modelo('tipo_producto');
    }

    public function index() {
        $this->_tipo_producto->idtipo_producto = 0;
        $this->_vista->datos = $this->_tipo_producto->selecciona();
        $this->_vista->setJs(array('funcion'));
        $this->_vista->renderizar('index');
    }
    
    public function buscador(){
        $this->_tipo_producto->idtipo_producto = 0;
        if($_POST['filtro']==0){
            $this->_tipo_producto->descripcion=$_POST['descripcion'];
        }
        echo json_encode($this->_tipo_producto->selecciona());
    }
    
    public function nuevo() {
        if ($_POST['guardar'] == 1) {
            $this->_tipo_producto->idtipo_producto = 0;
            $this->_tipo_producto->descripcion = $_POST['descripcion'];
            $this->_tipo_producto->inserta();
            $this->redireccionar('tipo_producto');
        }
        $this->_vista->titulo = 'Registrar Tipo de Producto';
        $this->_vista->action = BASE_URL . 'tipo_producto/nuevo';
        $this->_vista->renderizar('form');
    }

    public function editar($id) {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('tipo_producto');
        }

        $this->_tipo_producto->idtipo_producto = $this->filtrarInt($id);
        $this->_vista->datos = $this->_tipo_producto->selecciona();

        if ($_POST['guardar'] == 1) {
            $this->_tipo_producto->idtipo_producto = $_POST['codigo'];
            $this->_tipo_producto->descripcion = $_POST['descripcion'];
            $this->_tipo_producto->actualiza();
            $this->redireccionar('tipo_producto');
        }
        $this->_vista->titulo = 'Actualizar Tipos de Producto';
        $this->_vista->renderizar('form');
    }

    public function eliminar($id) {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('tipo_producto');
        }
        $this->_tipo_producto->idtipo_producto = $this->filtrarInt($id);
        $this->_tipo_producto->elimina();
        $this->redireccionar('tipo_producto');
    }

}

?>
