<?php

class estadia_controlador extends controller{
    
    private $_estadia;
    private $_detalle_estadia;
    private $_paises;
    private $_membresia;
    private $_profesiones;
    private $_clientes;
    private $_ruta_huesped;
    

    public function __construct() {
        parent::__construct();
        $this->_estadia = $this->cargar_modelo('estadia');
        $this->_detalle_estadia = $this->cargar_modelo('detalle_estadia');
        $this->_paises = $this->cargar_modelo('paises');
        $this->_membresia = $this->cargar_modelo('membresia');
        $this->_profesiones = $this->cargar_modelo('profesiones');
        $this->_clientes = $this->cargar_modelo('clientes');
        $this->_ruta_huesped = $this->cargar_modelo('ruta_huesped');
    }

    public function index() {
        $this->_vista->datos =  $this->_estadia->selecciona();
        $this->_vista->renderizar('index');
    }
    
    public function confirmar($idventa){
        if($_POST['guardar']==1){
            echo '<pre>';print_r($_POST);exit;
            for($i=0;$i<count($_POST['idcliente']);$i++){
                //insertamos ruta_huesped
                $this->_ruta_huesped->idtipo_ruta=1;
                $this->_ruta_huesped->idubigeo=$_POST['ciudad'][$i];
                $this->_ruta_huesped->idcliente=$_POST['idcliente'][$i];
                $this->_ruta_huesped->inserta();
                
                //actualizamos detalle_estadia
                $this->_detalle_estadia->
                $this->_detalle_estadia->actualiza();
            }
        }
        $this->_estadia->idventa=$idventa;
        $this->_vista->datos =  $this->_estadia->selecciona();
        $this->_detalle_estadia->idventa=$idventa;
        $this->_vista->datos_detalle_estadia =  $this->_detalle_estadia->selecciona();
        $this->_vista->datos_paises = $this->_paises->selecciona();
        $this->_vista->datos_membresias= $this->_membresia->selecciona();
        $this->_vista->datos_profesiones = $this->_profesiones->selecciona();
        $this->_vista->setJs(array('funciones'));
        $this->_vista->renderizar('form');
    }
}

?>
