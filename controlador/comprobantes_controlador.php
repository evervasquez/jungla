<?php

class comprobantes_controlador extends controller{
    
    private $_comprobantes;
    private $_tipo_comprobante;
    
    public function __construct() {
        parent::__construct();
        $this->_comprobantes=  $this->cargar_modelo('comprobantes');
        $this->_tipo_comprobante=  $this->cargar_modelo('tipo_comprobante');
    }
    
    public function index() {
        $this->_vista->datos = $this->_comprobantes->selecciona();
        $this->_vista->setJs(array('funcion'));
        $this->_vista->renderizar('index');
    }
    
    public function buscador(){
        if($_POST['filtro']==0){
            $this->_comprobantes->tipo=$_POST['cadena'];
        }
        echo json_encode($this->_comprobantes->selecciona());
    }
    
    public function nuevo() {        
        if ($_POST['guardar'] == 1) {
            $this->_comprobantes->idtipo_comprobante = $_POST['tipo_comprobante'];
            $this->_comprobantes->serie = $_POST['serie'];
            $this->_comprobantes->correlativo = $_POST['correlativo'];
            $this->_comprobantes->inserta();
            $this->redireccionar('comprobantes');
        }
        $this->_vista->datos_tipo_comprobante= $this->_tipo_comprobante->selecciona();
        $this->_vista->titulo = 'Registrar Comprobante de Pago';
        $this->_vista->action = BASE_URL.'comprobantes/nuevo';
        $this->_vista->setJs(array('funciones_form'));
        $this->_vista->renderizar('form');
    }

    public function editar($id) {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('comprobantes');
        }

        if ($_POST['guardar'] == 1) {
            $this->_comprobantes->idcomprobante = $_POST['codigo'];
            $this->_comprobantes->idtipo_comprobante = $_POST['tipo_comprobante'];
            $this->_comprobantes->serie = $_POST['serie'];
            $this->_comprobantes->correlativo = $_POST['correlativo'];
            $this->_comprobantes->actualiza();
            $this->redireccionar('comprobantes');
        }
        $this->_comprobantes->idcomprobante = $this->filtrarInt($id);
        $this->_vista->datos = $this->_comprobantes->selecciona();
        if($this->_vista->datos[0]['correlativo']>0){
            echo '<script>alert("No se puedo editar este comprobante")</script>';
            $this->redireccionar('comprobantes');
        }
        $this->_vista->datos_tipo_comprobante= $this->_tipo_comprobante->selecciona();
        $this->_vista->titulo = 'Actualizar Comprobante de Pago';
        $this->_vista->setJs(array('funciones_form'));
        $this->_vista->renderizar('form');
    }

    public function eliminar($id) {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('comprobantes');
        }
        $this->_comprobantes->idcomprobante= $this->filtrarInt($id);
        $this->_comprobantes->elimina();
        $this->redireccionar('comprobantes');
    }
}
?>
