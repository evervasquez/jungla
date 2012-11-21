<?php

class articulos_controlador extends controller {
    
    private $_articulos;

    public function __construct() {
        if (!$this->acceso(38)) {
            $this->redireccionar('error/access/5050');
        }
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
            $this->_articulos->titulo=$_POST['cadena'];
        }
        if($_POST['filtro']==1){
            $this->_articulos->descripcion=$_POST['cadena'];
        }
        echo json_encode($this->_articulos->selecciona());
    }
    
    public function nuevo(){
        $imagen = "";
        if(isset($_FILES['imagen']['name'])){
                $this->get_Libreria('upload' . DS . 'class.upload');
                $ruta = ROOT . 'lib' . DS . 'img' . DS . 'articulos' . DS;
                $upload = new upload($_FILES['imagen'], 'es_ES');
                $upload->allowed = array('image/*');
                $upload->file_new_name_body = 'upl_' . uniqid();
                $upload->process($ruta);
                
                if($upload->processed){
                    $imagen = $upload->file_dst_name;
                    $thumb = new upload($upload->file_dst_pathname);
                    $thumb->image_resize = true;
                    $thumb->image_x = 100;
                    $thumb->image_y = 50;
                    $thumb->file_name_body_pre = 'thumb_';
                    $thumb->process($ruta . 'thumb' . DS);
                }
                else{
                    $this->_view->assign('_error', $upload->error);
                    $this->_view->renderizar('form');
                    exit;
                }
            }
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
            $this->redireccionar('articulos');
        }

        $this->_articulos->idarticulo = $this->filtrarInt($id);
        $this->_vista->datos = $this->_articulos->selecciona();

        if ($_POST['guardar'] == 1) {
            $this->_articulos->idarticulo = $_POST['codigo'];
            $this->_articulos->titulo = $_POST['titulo'];
            $this->_articulos->descripcion = $_POST['descripcion'];
            $this->_articulos->imagen = $_POST['imagen'];
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
