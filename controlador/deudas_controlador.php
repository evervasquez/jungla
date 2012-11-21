<?php
    
class deudas_controlador extends controller{
    
    private $_deudas;
    private $_cuota_pago;
    
    public function __construct() {
        parent::__construct();
        $this->_deudas = $this->cargar_modelo('deudas');
        $this->_cuota_pago = $this->cargar_modelo('cuota_pago');
    }
    
    public function index(){
        $this->_vista->datos=  $this->_deudas->selecciona();
        $this->_vista->renderizar('index');
    }    
    
    public function cronograma($idcompra){
        $this->_cuota_pago->idcompra=$idcompra;
        $this->_vista->datos=$this->_cuota_pago->selecciona();
        $this->_vista->titulo = 'Cronograma de Pagos';
        $this->_vista->renderizar('cronograma');
    }
    
    public function amortizar(){
        $this->_vista->renderizar('amortizar');
    }
}   
    
?>