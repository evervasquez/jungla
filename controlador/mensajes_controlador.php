<?php

class mensajes_controlador extends controller {
    
    private $_mensajes;
    private $_alertas;

    public function __construct() {
        parent::__construct();
        $this->_mensajes = $this->cargar_modelo('mensajes');
        $this->_alertas = $this->cargar_modelo('alertas');
    }

    public function index() {
        if (!$this->acceso(39)) {
            $this->redireccionar('error/access/5050');
        }
        $this->_vista->datos = $this->_mensajes->selecciona();
        $this->_vista->setJs(array('funcion'));
        $this->_vista->setCss(array('estilos'));
        $this->_vista->renderizar('index');
    }
    
    public function ver(){
        $this->_mensajes->idmensaje=$_POST['idmensaje'];
        $this->_mensajes->estado();
        echo json_encode($this->_mensajes->selecciona());
    }
    
    public function elimina_alerta(){
        @$this->_alertas->desactiva_alerta();
    }
    
    public function buscador(){
        if($_POST['filtro']==0){
            $this->_mensajes->nombre=$_POST['cadena'];
        }
        if($_POST['filtro']==1){
            $this->_mensajes->email = $_POST['cadena'];
        }
        echo json_encode($this->_mensajes->selecciona());
    }
        
    public function nuevo(){
        $this->_mensajes->nombre = $_POST['nombreContacto'];
        $this->_mensajes->email = $_POST['emailContacto'];
        $this->_mensajes->telefono = $_POST['telefonoContacto'];
        $this->_mensajes->mensaje = $_POST['mensaje'];
        $this->_mensajes->fecha = date("d-m-Y H:i:s");
        $this->_mensajes->estado = 0;
        $this->_mensajes->inserta();
        $this->_alertas->idalerta = 1;
        $this->_alertas->activa_alerta();
        echo "<script>alert('Mensaje enviado')</script>";
        $this->redireccionar ('web/contactenos');
    }

    public function eliminar($id) {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('mensajes');
        }
        $this->_mensajes->idmensaje = $this->filtrarInt($id);
        $this->_mensajes->elimina();
        @$this->_alertas->desactiva_alerta();
        $this->redireccionar('mensajes');
    }
}
?>
