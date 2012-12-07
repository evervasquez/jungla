<?php
    
class deudas_controlador extends controller{
    
    private $_deudas;
    private $_cuota_pago;
    private $_caja;
    
    public function __construct() {
        parent::__construct();
        $this->_deudas = $this->cargar_modelo('deudas');
        $this->_cuota_pago = $this->cargar_modelo('cuota_pago');
        $this->_caja = $this->cargar_modelo('caja');
    }
    
    public function index(){
        $this->_vista->datos=$this->_deudas->selecciona();
        $this->_vista->renderizar('index');
    }    
    
    public function cronograma($idcompra){
        $this->_cuota_pago->idcompra=$idcompra;
        $this->_vista->datos=$this->_cuota_pago->selecciona();
        $this->_vista->titulo = 'Cronograma de Pagos';
        $this->_vista->renderizar('cronograma');
    }
    
    public function amortizar(){
        $datos_caja=$this->_caja->selecciona();
        if($datos_caja[0]['ESTADO']==0){
            echo '<script>alert("Aperture la caja antes de cualquier movimiento")</script>';
            $this->redireccionar('caja');
        }
        if(new DateTime($datos_caja[0]['FECHA'])!=new DateTime(date('d-m-Y'))){
            echo '<script>alert("Cierre la caja de fecha pasada y aperture la caja para el dia de hoy")</script>';
            $this->redireccionar('caja');
        }
        $this->_vista->renderizar('amortizar');
    }
}   
    
?>