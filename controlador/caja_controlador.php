<?php

class caja_controlador extends controller{
    
    private $_caja;

    public function __construct() {
        parent::__construct();
        $this->_caja = $this->cargar_modelo('caja');
    }

    public function index(){
        $datos=  $this->_caja->selecciona();
//        echo '<pre>';
//                print_r($datos);exit;
        if($datos[0]['ESTADO']==1){
            $this->_vista->lbl_boton = 'Cerrar';
            $this->_vista->action = 'cerrar/'.$datos[0]['IDCAJA'];
        }else{
            if(new DateTime($datos[0]['FECHA'])==new DateTime(date("d-m-Y"))){
                $this->_vista->lbl_boton = 'Reaperturar';
                $this->_vista->action = 'reaperturar/'.$datos[0]['IDCAJA'];
            }else{
                $this->_vista->lbl_boton = 'Aperturar';
                $this->_vista->action = 'aperturar';
            }
        }
        $this->_vista->datos=$datos;
        $this->_vista->setJs(array('funcion'));
        $this->_vista->renderizar('index');
    }
    
    public function buscador(){
        if($_POST['filtro']==0){
            $this->_caja->empleado=$_POST['descripcion'];
        }
        echo json_encode($this->_caja->selecciona());
    }
    
    public function aperturar(){
        $this->_caja->estado=1;
        $this->_caja->fecha=date("d-m-Y");
        $this->_caja->idempleado=session::get('idempleado');
        $this->_caja->inserta();
        $this->redireccionar('caja');
    }
    
    public function reaperturar($id){
        $this->_caja->idcaja=$id;
        $this->_caja->estado=1;
        $this->_caja->actualiza();
        $this->redireccionar('caja');
    }
    
    public function cerrar($id){
        $this->_caja->idcaja=$id;
        $this->_caja->estado=0;
        $this->_caja->actualiza();
        $this->redireccionar('caja');
    }
  
}

?>
