<?php

class proveedores_controlador extends controller {

    private $_proveedores;
    private $_paises;
    private $_regiones;
    private $_provincias;
    private $_ubigeos;

    public function __construct() {
        if (!$this->acceso(17)) {
            $this->redireccionar('error/access/5050');
        }
        parent::__construct();
        $this->_proveedores = $this->cargar_modelo('proveedores');
        $this->_paises = $this->cargar_modelo('paises');
        $this->_regiones = $this->cargar_modelo('regiones');
        $this->_provincias = $this->cargar_modelo('provincias');
        $this->_ubigeos = $this->cargar_modelo('ubigeos');
    }

    public function index() {
        $this->_vista->datos = $this->_proveedores->selecciona();
        $this->_vista->setCss(array('estilos_index'));
        $this->_vista->setJs(array('funcion'));
        $this->_vista->renderizar('index');
    }
    
    public function buscador(){
        if($_POST['filtro']==0){
            $this->_proveedores->razon_social=$_POST['cadena'];
        }
        if($_POST['filtro']==1){
            $this->_proveedores->representante = $_POST['cadena'];
        }
        if($_POST['filtro']==2){
            $this->_proveedores->ruc = $_POST['cadena'];
        }
        echo json_encode($this->_proveedores->selecciona());
    }

    public function nuevo() {
        if ($_POST['guardar'] == 1) {
            $this->_proveedores->razon_social = $_POST['razon_social'];
            $this->_proveedores->representante = $_POST['representante'];
            $this->_proveedores->ruc = $_POST['ruc'];
            $this->_proveedores->telefono = $_POST['telefono'];
            $this->_proveedores->direccion = $_POST['direccion'];
            $this->_proveedores->email = $_POST['email'];
            $this->_proveedores->idubigeo = $_POST['ubigeo'];
            $this->_proveedores->inserta();
            $this->redireccionar('proveedores');
        }
      
        $this->_regiones->idpais = 193;
        $this->_vista->datos_regiones = $this->_regiones->selecciona();
        
        $this->_provincias->codigo_region = 1901;
        $this->_vista->datos_provincias = $this->_provincias->selecciona();
        
        $this->_ubigeos->codigo_provincia = 1968;
        $this->_vista->datos_ubigeos = $this->_ubigeos->selecciona();
        $this->_vista->titulo = 'Registrar Proveedor';
        $this->_vista->action = BASE_URL . 'proveedores/nuevo';
        $this->_vista->setJs(array('funciones_form'));
        $this->_vista->renderizar('form');
    }

//    public function get_regiones() {
//        $this->_regiones->codigo_region = 0;
//        $this->_regiones->idpais = $_POST['idpais'];
//        echo json_encode($this->_regiones->selecciona());
//    }

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

    public function editar($id) {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('proveedores');
        }

        if ($_POST['guardar'] == 1) {
//            echo '<pre>';
//            print_r($_POST);
//            echo '</pre>';
//            exit;
            $this->_proveedores->idproveedor = $_POST['codigo'];
            $this->_proveedores->razon_social = $_POST['razon_social'];
            $this->_proveedores->representante = $_POST['representante'];
            $this->_proveedores->ruc = $_POST['ruc'];
            $this->_proveedores->telefono = $_POST['telefono'];
            $this->_proveedores->direccion = $_POST['direccion'];
            $this->_proveedores->email = $_POST['email'];
            $this->_proveedores->idubigeo = $_POST['ubigeo'];
            $this->_proveedores->actualiza();
            $this->redireccionar('proveedores');
        }
        $this->_proveedores->idproveedor = $this->filtrarInt($id);
        $datos = $this->_proveedores->selecciona();
        //obtenemos todas las regiones que pertenecen al pais del proveedor
        $this->_regiones->idpais = $datos[0]['XPAIS'];
        $this->_vista->datos_regiones = $this->_regiones->selecciona();
        //obtenemos todas las provincias que pertenecen a la región del proveedor
        $this->_provincias->codigo_region = $datos[0]['IDREGION'];
        $this->_vista->datos_provincias = $this->_provincias->selecciona();
        //obtenemos todas las ciudades que pertenecen a la provincia del proveedor
        $this->_ubigeos->codigo_provincia = $datos[0]['IDPROVINCIA'];
        $this->_vista->datos_ubigeos = $this->_ubigeos->selecciona();

        $this->_vista->datos = $datos;
        $this->_vista->titulo = 'Actualizar Proveedor';
        $this->_vista->setJs(array('funciones_form'));
        $this->_vista->renderizar('form');
    }

    public function eliminar($id) {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('proveedores');
        }
        $this->_proveedores->idproveedor = $this->filtrarInt($id);
        $this->_proveedores->elimina();
        $this->redireccionar('proveedores');
    }
    
    public function ver(){
        $this->_proveedores->idproveedor=$_POST['idproveedor'];
        echo json_encode($this->_proveedores->selecciona());
    }
    
    public function valida_ruc() {
        $ruc = $this->_proveedores->selecciona_ruc($_POST['ruc']);
        if ($ruc['ruc'] == '') {
            echo '<a class="imgselect" title="Valido"></a><input type="hidden" id="val_ruc" value="1" />';
        } else {
            echo '<a class="imgdelete" title="En uso"></a><input type="hidden" id="val_ruc" value="0" />';
        }
    }
    
}

?>
