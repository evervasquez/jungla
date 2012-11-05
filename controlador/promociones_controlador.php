<?php

class promociones_controlador extends controller{
    
    private $_promociones;

    public function __construct() {
        parent::__construct();
        $this->_promociones = $this->cargar_modelo('promociones');
    }

    public function index() {
        $this->_promociones->idpromocion= 0;
        $this->_promociones->descripcion = '';
        $this->_vista->datos = $this->_promociones->selecciona();
        $this->_vista->renderizar('index');
    }
    
    public function buscador(){
        $this->_promociones->idpromocion = 0;
        if($_POST['filtro']==0){
            $this->_promociones->descripcion=$_POST['descripcion'];
        }
        echo json_encode($this->_promociones->selecciona());
    }

    public function nuevo() {
        if ($_POST['guardar'] == 1) {
            $this->_promociones->idpromocion = 0;
            $this->_promociones->descripcion = $_POST['descripcion'];
            $this->_promociones->descuento = (double) $_POST['descuento'];
            $this->_promociones->fecha_inicio = $this->fecha_en($_POST['fecha_inicio']);
            $this->_promociones->fecha_final = $this->fecha_en($_POST['fecha_final']);
            $this->_promociones->inserta();
            $this->redireccionar('promociones');
        }
        $this->_vista->titulo = 'Registrar Promocion';
        $this->_vista->action = BASE_URL . 'promociones/nuevo';
        $this->_vista->renderizar('form');
    }

    public function editar($id) {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('promociones');
        }

        $this->_promociones->idpromocion = $this->filtrarInt($id);
        $this->_vista->datos = $this->_promociones->selecciona();

        if ($_POST['guardar'] == 1) {
            $this->_promociones->idpromocion = $_POST['codigo'];
            $this->_promociones->descripcion = $_POST['descripcion'];
            $this->_promociones->descuento = (double) $_POST['descuento'];
            $this->_promociones->fecha_inicio = $this->fecha_en($_POST['fecha_inicio']);
            $this->_promociones->fecha_final = $this->fecha_en($_POST['fecha_final']);
            $this->_promociones->actualiza();
            $this->redireccionar('promociones');
        }
        $this->_vista->titulo = 'Actualizar Promocion';
        $this->_vista->renderizar('form');
    }

    public function eliminar($id) {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('promociones');
        }
        $this->_promociones->idpromocion = $this->filtrarInt($id);
        $this->_promociones->elimina();
        $this->redireccionar('promociones');
    }
    
}
?>
