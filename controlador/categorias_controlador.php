<?php

class categorias_controlador extends controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function grilla() {
        $objCategorias = new categorias();
        $objCategorias->idcategoria = 0;
        $stmt = $objCategorias->selecciona();
        return $stmt;
    }

    public function selecciona($id) {
        $objCategorias = new categorias();
        $objCategorias->idcategoria = $id;
        $stmt = $objCategorias->selecciona();
        return $stmt;
    }

    public function elimina($id) {
        $objCategorias = new categorias();
        $objCategorias->idcategoria = $id;
        $error = $objCategorias->elimina();
        return $error;
    }

    public function inserta($datos) {
        $objCategorias = new categorias();
        $objCategorias->idcategoria = $datos[0];
        $objCategorias->descripcion = $datos[1];
        $objCategorias->nroelemento = $datos[2];
        $error = $objCategorias->inserta();
        return $error;
    }

    public function actualiza($datos) {
        $objCategorias = new categorias();
        $objCategorias->idcategoria = $datos[0];
        $objCategorias->descripcion = $datos[1];
        $objCategorias->nroelemento = $datos[2];
        $error = $objCategorias->actualiza();
        return $error;
    }
    
    public function index() {
        $this->_vista->renderizar('index');
    }
    
    public function nuevo(){
        $this->_vista->renderizar('form');
    }
}

?>
