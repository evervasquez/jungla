<?php
    
class cobros_controlador extends controller{
    
    private $_cobros;
    private $_cuota_cobro;
    private $_caja;
    
    public function __construct() {
        parent::__construct();
        $this->_cobros = $this->cargar_modelo('cobros');
        $this->_cuota_cobro = $this->cargar_modelo('cuota_pago');
        $this->_caja = $this->cargar_modelo('caja');
    }
    
    public function index(){
        $this->_vista->datos= $this->_cobros->selecciona();
        $this->_vista->renderizar('index');
    }    
    
    public function cronograma($idventa){
        $this->_cuota_cobro->idventa=$idventa;
        $this->_vista->datos=$this->_cuota_cobro->selecciona();
        $this->_vista->titulo = 'Cronograma de Cobros';
        $this->_vista->renderizar('cronograma');
    }
    
    public function amortizar(){
        $datos_caja=$this->_caja->selecciona();
        if($datos_caja[0]['estado']==0){
            echo '<script>alert("Aperture la caja antes de cualquier movimiento")</script>';
            $this->redireccionar('caja');
        }
        if(new DateTime($datos_caja[0]['fecha'])!=new DateTime(date('d-m-Y'))){
            echo '<script>alert("Cierre la caja de fecha pasada y aperture la caja para el dia de hoy")</script>';
            $this->redireccionar('caja');
        }
        $this->_vista->renderizar('amortizar');
    }
}   
    
?>