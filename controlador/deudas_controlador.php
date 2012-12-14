<?php

class deudas_controlador extends controller {

    private $_deudas;
    private $_cuota_pago;
    private $_caja;
    private $_amortizacion_pago;
    private $_movimiento_caja;
    private $_compras;
    private $_asientos;

    public function __construct() {
        if (!$this->acceso(19)) {
            $this->redireccionar('error/access/5050');
        }
        parent::__construct();
        $this->_deudas = $this->cargar_modelo('deudas');
        $this->_cuota_pago = $this->cargar_modelo('cuota_pago');
        $this->_caja = $this->cargar_modelo('caja');
        $this->_asientos = $this->cargar_modelo('asientos');
        $this->_amortizacion_pago = $this->cargar_modelo('amortizacion_pago');
        $this->_movimiento_caja = $this->cargar_modelo('movimiento_caja');
        $this->_compras = $this->cargar_modelo('compras');
    }

    public function index() {
        $this->_vista->datos = $this->_deudas->selecciona();
        $this->_vista->datos_compras = $this->_compras->selecciona();
        $this->_vista->setJs(array('funciones_index'));
        $this->_vista->renderizar('index');
    }
    
    public function buscador_c(){
        if($_POST['filtro']==0){
            $this->_compras->proveedor=$_POST['cadena'];
        }
        echo json_encode($this->_compras->selecciona());
    }
    
    public function buscador_d(){
        if($_POST['filtro']==0){
            $this->_deudas->proveedor=$_POST['cadena'];
        }
        echo json_encode($this->_deudas->selecciona());
    }

    public function cronograma($idcompra, $monto_restante) {
        $this->_cuota_pago->idcompra = $idcompra;
        $this->_vista->datos = $this->_cuota_pago->selecciona();
        $this->_vista->titulo = 'Cronograma de Pagos';
        $this->_vista->btn_action = BASE_URL . 'deudas/amortizar/' . $idcompra . '/' . $monto_restante;
        $this->_vista->setJs(array('funciones_cronograma'));
        $this->_vista->renderizar('cronograma');
    }

    public function amortizar($idcompra, $monto_restante) {
        $datos_caja = $this->_caja->selecciona();
        if ($datos_caja[0]['ESTADO'] == 0) {
            echo '<script>alert("Aperture la caja antes de cualquier movimiento")</script>';
            $this->redireccionar('caja');
        }
        if (new DateTime($datos_caja[0]['C_FECHA']) != new DateTime(date('d-m-Y'))) {
            echo '<script>alert("Cierre la caja de fecha pasada y aperture la caja para el dia de hoy")</script>';
            $this->redireccionar('caja');
        }

        if ($_POST['guardar'] == 1) {
            if ($datos_caja[0]['SALDO'] < $_POST['monto']) {
                echo '<script>alert("No hay suficiente saldo para ejecutar el pago")</script>';
                $this->redireccionar('caja');
            }
//            echo '<pre>';print_r($_POST);exit;
            //insertar movimiento caja
            $this->_movimiento_caja->idconcepto_movimiento = 1;
            $this->_movimiento_caja->idcaja = $datos_caja[0]['IDCAJA'];
            $this->_movimiento_caja->monto = $_POST['monto'];
            $this->_movimiento_caja->idcompra = $idcompra;
            $this->_movimiento_caja->idventa = 0;
            $dato_movimiento_caja = $this->_movimiento_caja->inserta();

            $this->_cuota_pago->idcompra = $idcompra;
            $datos_cuota_pago = $this->_cuota_pago->selecciona();

            $monto_amortizado = $_POST['monto'];
            for ($i = 0; $i < count($datos_cuota_pago); $i++) {
                if ($datos_cuota_pago[$i]['MONTO_CUOTA'] > $datos_cuota_pago[$i]['MONTO_PAGADO']) {
                    $monto_restantexcuota = $datos_cuota_pago[$i]['MONTO_CUOTA'] - $datos_cuota_pago[$i]['MONTO_PAGADO'];
                    if ($monto_amortizado != 0) {
                        if ($monto_restantexcuota >= $monto_amortizado) {
                            //actualiza monto_pagado en cuota_pago
                            $this->_cuota_pago->idcuota_pago = $datos_cuota_pago[$i]['IDCUOTA_PAGO'];
                            $this->_cuota_pago->monto_pagado = $monto_amortizado + $datos_cuota_pago[$i]['MONTO_PAGADO'];
                            $this->_cuota_pago->actualiza();

                            //inserta amortizacion_pago
                            $this->_amortizacion_pago->idcuota_pago = $datos_cuota_pago[$i]['IDCUOTA_PAGO'];
                            $this->_amortizacion_pago->idmovimiento_caja = $dato_movimiento_caja[0]['X_IDMOVIMIENTO_CAJA'];
                            $this->_amortizacion_pago->fecha = $_POST['fecha_pago'];
                            $this->_amortizacion_pago->monto = $monto_amortizado;
                            $this->_amortizacion_pago->inserta();

                            $monto_amortizado = 0;
                        } else {
                            //actualiza monto_pagado en cuota_pago
                            $this->_cuota_pago->idcuota_pago = $datos_cuota_pago[$i]['IDCUOTA_PAGO'];
                            $this->_cuota_pago->monto_pagado = $datos_cuota_pago[$i]['MONTO_CUOTA'];
                            $this->_cuota_pago->actualiza();

                            //inserta amortizacion_pago
                            $this->_amortizacion_pago->idcuota_pago = $datos_cuota_pago[$i]['IDCUOTA_PAGO'];
                            $this->_amortizacion_pago->idmovimiento_caja = $dato_movimiento_caja[0]['X_IDMOVIMIENTO_CAJA'];
                            $this->_amortizacion_pago->fecha = $_POST['fecha_pago'];
                            $this->_amortizacion_pago->monto = $monto_restantexcuota;
                            $this->_amortizacion_pago->inserta();

                            $monto_amortizado = $monto_amortizado - $monto_restantexcuota;
                        }
                    }
                }
            }

            //actualiza saldo caja
            $this->_caja->idcaja = $datos_caja[0]['IDCAJA'];
            $this->_caja->saldo = $_POST['monto'];
            $this->_caja->aumenta = 0;
            $this->_caja->actualiza();

            //inserta asiento
            $this->_asientos->idcompra_deuda = $idcompra;
            $this->_asientos->monto_amortizado = $_POST['monto'];
            $this->_asientos->inserta();

            $this->redireccionar('deudas');
        }

        $this->_vista->monto_restante=$monto_restante;
        $this->_vista->setJs(array('funciones_amortizar'));
        $this->_vista->action = BASE_URL . 'deudas/amortizar/' . $idcompra . '/' . $monto_restante;
        $this->_vista->renderizar('amortizar');
    }

    public function pagar($idcompra, $monto) {
        $datos_caja = $this->_caja->selecciona();
        if ($datos_caja[0]['ESTADO'] == 0) {
            echo '<script>alert("Aperture la caja antes de cualquier movimiento")</script>';
            $this->redireccionar('caja');
        }

        if (new DateTime($datos_caja[0]['C_FECHA']) != new DateTime(date('d-m-Y'))) {
            echo '<script>alert("Cierre la caja de fecha pasada y aperture la caja para el dia de hoy")</script>';
            $this->redireccionar('caja');
        }

        if ($datos_caja[0]['SALDO'] < $monto) {
            echo '<script>alert("No hay suficiente saldo para ejecutar el pago")</script>';
            $this->redireccionar('caja');
        }
        //insertar movimiento caja
        $this->_movimiento_caja->idconcepto_movimiento = 1;
        $this->_movimiento_caja->idcaja = $datos_caja[0]['IDCAJA'];
        $this->_movimiento_caja->monto = $monto;
        $this->_movimiento_caja->idcompra = $idcompra;
        $this->_movimiento_caja->idventa = 0;
        $this->_movimiento_caja->inserta();

        //actualizar el estado de compra a pagado
        $this->_compras->idcompra = $idcompra;
        $this->_compras->estado_pago = 1;
        $this->_compras->actualiza();

        //inserta asiento pagar
        $this->_asientos->idcompra_deuda = $idcompra;
        $this->_asientos->inserta();

        //actualiza saldo caja
        $this->_caja->idcaja = $datos_caja[0]['IDCAJA'];
        $this->_caja->saldo = $monto;
        $this->_caja->aumenta = 0;
        $this->_caja->actualiza();
        $this->redireccionar('deudas');
    }

}

?>