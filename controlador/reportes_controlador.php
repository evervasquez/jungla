<?php

class reportes_controlador extends controller {

    private $_reportes;
    private $_fpdf;

    public function __construct() {
        if (!$this->acceso(47)) {
            $this->redireccionar('error/access/5050');
        }
        parent::__construct();
        $this->get_Libreria('fpdf' . DS . 'fpdf');
        $this->_fpdf = new FPDF('P','mm','A4');
        $this->_reportes = $this->cargar_modelo('reportes');
        $this->_productos = $this->cargar_modelo('productos');
    }
    
    public function index() {
        $this->_vista->datos_productos=$this->_productos->selecciona();
        $this->_vista->setJs(array('funciones_index'));
        $this->_vista->setCss(array('estilos_index'));
        $this->_vista->renderizar('index');
    }
    
    public function obtener_stock_por_ubicacion($ubicacion) {
        $datos = $this->_reportes->selecciona_stock_total($ubicacion);
        $cabeceras = array('IDPRODUCTO', 'DESCRIPCION', 'PRECIO_UNITARIO', 'OBSERVACIONES', 'SERVICIO', 'TIPO_PRODUCTO', 'UNIDAD_MEDIDAD',
            'IDUBICACION', 'UBICACION', 'ALMACEN', 'PROMOCION', 'STOCK', 'PRECIO_COMPRA');
        $datos = $this->get_matriz($datos, $cabeceras);
        return $datos;
    }
    
    public function obtener_ubicaciones() {
        $datos = $this->_reportes->selecciona_ubicaciones();
        $cabeceras = array('IDUBICACION', 'DESCRIPCION');
        $datos = $this->get_matriz($datos, $cabeceras);
        return $datos;
    }
    
    public function obtener_descuento_venta($idventa){
        $datos =$this->_reportes->selecciona_ventas($idventa);
        $cabeceras = array ('IGV', 'DESCUENTO');
        $datos = $this->get_matriz($datos, $cabeceras);
        return $datos;
    }

    public function obtener_datos_empresa() {
        $datos =$this->_reportes->selecciona_datos_empresa();
        $cabeceras = array ('RAZON_SOCIAL','RUC','NOMBRE_COMERCIAL',
            'CLASE','CATEGORIA','NUMERO_CERTIFICADO',
            'DIRECCION','TELEFONO','FAX','REGION',
            'PROVINCIA','DISTRITO','PAGINA_WEB',
            'E_MAIL','REP_VENTA_1','REP_VENTA_2','REP_VENTA_3','REP_VENTA_4','REP_VENTA_5','REP_VENTA_6','REP_VENTA_7');
        $datos = $this->get_matriz($datos, $cabeceras);
        return $datos;
    }
    
    public function obtener_numero_arribos_x_tipo_habitacion($mesano) {
        $datos =$this->_reportes->selecciona_numero_arribos_x_tipo_habitacion($mesano);
        $cabeceras = array ('IDTIPO_HABITACION', 'DESCRIPCION', 'CANTIDAD');
        $datos = $this->get_matriz($datos, $cabeceras);
        return $datos;
    }
    
    public function obtener_numero_arribos_huesped_ubigeo_internacional($mesano) {
        $datos =$this->_reportes->selecciona_numero_arribos_huesped_ubigeo_internacional($mesano);
        if($mesano[2]==1){
            $cabeceras = array ('IDCONTINENTE', 'DESCRIPCION_CONTINENTE','CANTIDAD');
        } else {
            $cabeceras = array ('IDPAIS', 'DESCRIPCION', 'CANTIDAD');
        }
        $datos = $this->get_matriz($datos, $cabeceras);
        return $datos;
    }
    
    public function obtener_numero_arribos_huesped_dia_mes($mesano) {
        $datos =$this->_reportes->selecciona_numero_arribos_huesped_dia_mes($mesano);
        $cabeceras = array ('DIA', 'CANTIDAD');
        $datos = $this->get_matriz($datos, $cabeceras);
        return $datos;
    }
    
    public function obtener_numero_arribos_huesped_ubigeo_nacional($mesano) {
        $datos =$this->_reportes->selecciona_numero_arribos_huesped_ubigeo_nacional($mesano);
        if($mesano[2]==1){
            $cabeceras = array ('IDPAIS', 'DESCRIPCION', 'CODIGO_REGION','CODIGO_PROVINCIA','CANTIDAD');
        } else {
            $cabeceras = array ('IDPAIS', 'DESCRIPCION', 'CODIGO_REGION','CANTIDAD');
        }
        $datos = $this->get_matriz($datos, $cabeceras);
        return $datos;
    }
    
    public function obtener_numero_pernoctaciones_huesped_ubigeo_nacional($mesano) {
        $datos =$this->_reportes->selecciona_numero_pernoctaciones_huesped_ubigeo_nacional($mesano);
        if($mesano[2]==1){
            $cabeceras = array ('IDPAIS', 'DESCRIPCION', 'CODIGO_REGION','CODIGO_PROVINCIA','CANTIDAD');
        } else {
            $cabeceras = array ('IDPAIS', 'DESCRIPCION', 'CODIGO_REGION','CANTIDAD');
        }
        $datos = $this->get_matriz($datos, $cabeceras);
        return $datos;
    }
    
    public function obtener_cantidad_empleados_x_tipo_x_actividad() {
        $datos =$this->_reportes->selecciona_cantidad_empleados_x_tipo_x_actividad();
        $cabeceras = array ('IDACTIVIDAD', 'IDTIPO_EMPLEADO', 'CANTIDAD');
        $datos = controller::get_matriz($datos, $cabeceras);
        return $datos;
    }
    
    public function obtener_habitaciones_x_tipo_habitacion() {
        $datos =$this->_reportes->selecciona_habitaciones_x_tipo_habitacion();
        $cabeceras = array ('IDTIPO_HABITACION', 'DESCRIPCION', 'CANTIDAD');
        $datos = controller::get_matriz($datos, $cabeceras);
        return $datos;
    }
    
    public function obtener_numero_pernoctaciones_x_tipo_habitacion($mesano) {
        $datos =$this->_reportes->selecciona_numero_pernoctaciones_x_tipo_habitacion($mesano);
        $cabeceras = array ('IDTIPO_HABITACION', 'DESCRIPCION', 'PERNOCTACIONES', 'HABITACIONES_NOCHE');
        $datos = controller::get_matriz($datos, $cabeceras);
        return $datos;
    }
    
    public function obtener_datos_comprobante_venta($idventa) {
        $datos =$this->_reportes->selecciona_datos_comprobante_venta($idventa);
        $cabeceras = array ('IDVENTA', 'FECHA_VENTA', 'ESTADO', 'OBSERVACIONES', 'NRO_DOCUMENTO', 'IDTIPO_COMPROBANTE','SERIE','ABREVIATURA',
            'IDEMPLEADO', 'NOMBRES_EMPLEADO', 'APELLIDOS_EMPLEADO', 'IDTIPO_TRANSACCION', 'REGISTRO_VENTA',
            'IDCLIENTE', 'NOMBRES_CLIENTE', 'APELLIDOS_CLIENTE', 'DOCUMENTO', 'DIRECCION_CLIENTE', 'ESTADO_PAGO');
        $datos = controller::get_matriz($datos, $cabeceras);
        return $datos;
    }
    
    public function obtener_datos_detalle_comprobante_venta($idventa) {
        $datos =$this->_reportes->selecciona_datos_detalle_comprobante_venta($idventa);
        $cabeceras = array ('IDVENTA','IDPAQUETE','CANTIDAD','PRECIO_VENTA','IDPRODUCTO','DESCRIPCION','IDUNIDAD_MEDIDA','ABREVIATURA');
        $datos = controller::get_matriz($datos, $cabeceras);
        return $datos;
    }
    
    public function obtener_numero_pernoctaciones_huesped_ubigeo_internacional($mesano) {
        $datos =$this->_reportes->selecciona_numero_pernoctaciones_huesped_ubigeo_internacional($mesano);
        if($mesano[2]==1){
            $cabeceras = array ('IDCONTINENTE', 'DESCRIPCION_CONTINENTE','CANTIDAD');
        } else {
            $cabeceras = array ('IDPAIS', 'DESCRIPCION', 'CANTIDAD');
        }
        $datos = $this->get_matriz($datos, $cabeceras);
        return $datos;
    }
    
    public function obtener_stock_total() {
        $datos = $this->_reportes->selecciona_stock_total(0);
        $cabeceras = array('IDPRODUCTO', 'DESCRIPCION', 'PRECIO_UNITARIO', 'OBSERVACIONES', 'SERVICIO', 'TIPO_PRODUCTO', 'UNIDAD_MEDIDA', 'IDUBICACION', 'UBICACION', 'ALMACEN', 'PROMOCION', 'STOCK', 'PRECIO_COMPRA');
        $datos = $this->get_matriz($datos, $cabeceras);
        return $datos;
    }
    
    public function obtener_tipo_habitacion_total(){
        $datos = $this->_reportes->selecciona_tipo_habitacion_total();
        $cabeceras = array('IDTIPO_HABITACION', 'DESCRIPCION', 'COSTO', 'CAMAS');
        $datos = $this->get_matriz($datos, $cabeceras);
        return $datos;
    }
   
    public function obtener_ventas_x_producto($datos){
        $datos = $this->_reportes->selecciona_ventas_x_producto($datos);
        $cabeceras = array('IDPRODUCTO', 'FECHA_VENTA','TIPO_COMPROBANTE', 'NRO_DOCUMENTO', 'CLIENTE', 'DOCUMENTO','ABREVIATURA','CANTIDAD','PRECIO_VENTA',
            'SUB_TOTAL', 'CONFIRMACION');
        $datos = $this->get_matriz($datos, $cabeceras);
        return $datos;
    }
    
    public function obtener_productos_vendidos($datos){
        $datos = $this->_reportes->selecciona_productos_vendidos($datos);
        $cabeceras = array('IDPRODUCTO', 'DESCRIPCION');
        $datos = $this->get_matriz($datos, $cabeceras);
        return $datos;
    }
   
    public function obtener_compras_x_producto($datos){
        $datos = $this->_reportes->selecciona_compras_x_producto($datos);
        $cabeceras = array('IDPRODUCTO', 'FECHA_VENTA','NRO_COMPROBANTE', 'PROVEEDOR', 'RUC','ABREVIATURA','CANTIDAD','PRECIO','SUB_TOTAL');
        $datos = $this->get_matriz($datos, $cabeceras);
        return $datos;
    }
    
    public function obtener_productos_comprados($datos){
        $datos = $this->_reportes->selecciona_productos_comprados($datos);
        $cabeceras = array('IDPRODUCTO', 'DESCRIPCION');
        $datos = $this->get_matriz($datos, $cabeceras);
        return $datos;
    }
    
    public function obtener_compras_x_intervalo_fechas($datos){
        $datos = $this->_reportes->selecciona_compras_x_intervalo_fechas($datos);
        $cabeceras = array('IDCOMPRA', 'FECHA_COMPRA','NRO_COMPROBANTE','IMPORTE','IGV','IDPROVEEDOR','IDTIPO_TRANSACCION','CONFIRMACION','REGISTRO'
            ,'TIPO','PROVEEDOR','FECHA', 'RUC');
        $datos = $this->get_matriz($datos, $cabeceras);
        return $datos;
    }
    
    public function obtener_habitaciones_detalle_estadia($idventa){
        $datos = $this->_reportes->selecciona_habitaciones_detalle_estadia($idventa);
        $cabeceras = array('HABITACION', 'TIPO','COSTO','FECHA_INGRESO', 'VENTILACION');
        $datos = $this->get_matriz($datos, $cabeceras);
        return $datos;
    }
    
    public function obtener_detalle_estadia_x_huesped($idventa){
        $datos = $this->_reportes->selecciona_detalle_estadia_x_huesped($idventa);
        $cabeceras = array('FECHA_INGRESO','FECHA_SALIDA','NOMBRES_APELLIDOS','FECHA_NACIMIENTO','DIRECCION','TELEFONO','EMAIL',
            'XPROFESION','ESTADO_CIVIL','XPAIS','DOCUMENTO','NRO_HABITACION','COSTO','PROCEDENCIA','PROCEDENCIA','DESTINO');
        $datos = $this->get_matriz($datos, $cabeceras);
        return $datos;
    }

    public function stock_actual() {
        $datos = $this->obtener_stock_total();
        $datacount = count($datos);
        
        $Y_fields_name_position = 35;
        $Y_table_position = 41;
        $opp = 47;
        $contapag = 1;
        $contaobj = 0;

        for ($i = 0; $i < $datacount; $i++) {
            $c_codigo[$contapag] = $c_codigo[$contapag] . $datos[$i]['IDPRODUCTO'] . "\n";
            $c_descripcion[$contapag] = $c_descripcion[$contapag] . substr($datos[$i]['DESCRIPCION'], 0, 44) . "\n";
            $c_unidad_medida[$contapag] = $c_unidad_medida[$contapag] . substr($datos[$i]['UNIDAD_MEDIDA'], 0, 7) . "\n";
            $c_stock[$contapag] = $c_stock[$contapag] . $datos[$i]['STOCK'] . "0" . "\n";
            $contaobj = $contaobj + 1;
            if ($contaobj == $opp) {
                $contaobj = 0;
                $contapag = $contapag + 1;
            }
        }
        if ($contaobj == 0) {
            $contapag = $contapag - 1;
        }
        for ($i = 1; $i <= $contapag; $i++) {
            $this->_fpdf->AddPage();
            //ENCABEZADO DE REGISTRO
            $this->_fpdf->SetFont('Arial', 'B', 12);
            $this->_fpdf->SetY(25);
            $this->_fpdf->SetX(0);
            $this->_fpdf->Cell(210, 5, utf8_decode('REGISTRO DEL STOCK EN UNIDADES FÍSICAS'), 0, 0, 'C');
            $this->_fpdf->SetFillColor(232, 232, 232);
            $this->_fpdf->SetFont('Courier', 'B', 9);
            $this->_fpdf->SetY(35);
            $this->_fpdf->SetX(15);
            $this->_fpdf->Cell(25, 6, utf8_decode('Código'), 'BT', 0, 'L', 1);
            $this->_fpdf->SetX(40);
            $this->_fpdf->Cell(105, 6, utf8_decode('Producto'), 'BT', 0, 'L', 1);
            $this->_fpdf->SetX(145);
            $this->_fpdf->Cell(20, 6, utf8_decode('Unid.Med'), 'BT', 0, 'L', 1);
            $this->_fpdf->SetX(165);
            $this->_fpdf->Cell(30, 6, utf8_decode('Stock'), 'BT', 0, 'R', 1);
            //DATOS DE TABLA
            $this->_fpdf->SetFont('Courier', '', 9);
            $this->_fpdf->SetY($Y_table_position);
            $this->_fpdf->SetX(15);
            $this->_fpdf->MultiCell(25, 5, $c_codigo[$i], 1);
            $this->_fpdf->SetY($Y_table_position);
            $this->_fpdf->SetX(40);
            $this->_fpdf->MultiCell(105, 5, $c_descripcion[$i], 1);
            $this->_fpdf->SetY($Y_table_position);
            $this->_fpdf->SetX(145);
            $this->_fpdf->MultiCell(20, 5, $c_unidad_medida[$i], 1, 'C');
            $this->_fpdf->SetY($Y_table_position);
            $this->_fpdf->SetX(165);
            $this->_fpdf->MultiCell(30, 5, $c_stock[$i], 1, 'R');
        }
        $this->_fpdf->Output();
    }
    
    public function estadistica_mensual() {
        $mes = $_POST['estadistica_mes'];
        //$mes = 10;
        $ano = $_POST['estadistica_ano'];
        //$ano = 2012;

        switch ($mes) {
            case 1:$nmes = 'Enero';
                break;
            case 2:$nmes = 'Febrero';
                break;
            case 3:$nmes = 'Marzo';
                break;
            case 4:$nmes = 'Abril';
                break;
            case 5:$nmes = 'Mayo';
                break;
            case 6:$nmes = 'Junio';
                break;
            case 7:$nmes = 'Julio';
                break;
            case 8:$nmes = 'Agosto';
                break;
            case 9:$nmes = 'Setiembre';
                break;
            case 10:$nmes = 'Octubre';
                break;
            case 11:$nmes = 'Noviembre';
                break;
            case 12:$nmes = 'Diciembre';
                break;
            default:$mes = null;
                break;
        }
        if ($mes == null || $ano == null) {
            die('No se indicó mes o año de reporte o se indicó un dato erróneo.');
        }
        
        $this->_fpdf->SetAutoPageBreak(false);
        $datos = $this->obtener_datos_empresa();
        //$datacount = count($datos);
        
        $this->_fpdf->AddPage();
        $this->_fpdf->Image(ROOT . 'vista' . DS . 'reportes' . DS . 'img' . DS . 'estadistica_mensual.jpg', 0, 0, 210, 297, 'PNG');
//$this->_fpdf->SetFillColor(232,232,232);
//cell(ancho, alto, impresion, borde, salto de linea,
//alineac LCR, fondo truefalse, link)
//al final, reemplazar 0 por 0
        $this->_fpdf->SetFont('Arial', 'B', 12);
//Información del mes de
        $this->_fpdf->SetY(22);
        $this->_fpdf->SetX(116);
        $this->_fpdf->Cell(27.5, 7, utf8_decode($nmes), 0, 0, 'C');

        $this->_fpdf->SetFont('Arial', '', 11);
//Capitulo I, identificacion
//razon social de la empresa
        $this->_fpdf->SetY(41.7);
        $this->_fpdf->SetX(41.6);
        $this->_fpdf->Cell(101.3, 5.8, utf8_decode($datos[0]['RAZON_SOCIAL']), 0, 0, 'L');
//ruc
        $setx = 153.6;
        for ($i = 0; $i < 11; $i++) {
            $this->_fpdf->SetX($setx);
            $this->_fpdf->Cell(4.63, 5.8, substr($datos[0]['RUC'], $i, 1), 0, 0, 'C');
            $setx = $setx + 4.63;
        }
        $this->_fpdf->SetFont('Arial', '', 9);
//nombre comercial
        $this->_fpdf->SetY(47.6);
        $this->_fpdf->SetX(22.43);
        $this->_fpdf->Cell(54.56, 4.7, utf8_decode($datos[0]['NOMBRE_COMERCIAL']), 0, 0, 'L');
//clase
        $this->_fpdf->SetX(91.42);
        $this->_fpdf->Cell(16.67, 4.7, utf8_decode($datos[0]['CLASE']), 0, 0, 'R');
//categoria
        $this->_fpdf->SetX(122.19);
        $this->_fpdf->Cell(15.49, 4.7, utf8_decode($datos[0]['CATEGORIA']), 0, 0, 'R');
//nro certificado
        $this->_fpdf->SetX(172.19);
        $this->_fpdf->Cell(32.42, 4.7, utf8_decode($datos[0]['NUMERO_CERTIFICADO']), 0, 0, 'C');
//direccion
        $this->_fpdf->SetY(52.27);
        $this->_fpdf->SetX(22.43);
        $this->_fpdf->Cell(85.6, 4.13, utf8_decode($datos[0]['DIRECCION']), 0, 0, 'L');
//telefono
        $this->_fpdf->SetX(122.19);
        $this->_fpdf->Cell(31.63, 4.13, utf8_decode($datos[0]['TELEFONO']), 0, 0, 'L');
//fax
        $this->_fpdf->SetX(172.19);
        $this->_fpdf->Cell(32.53, 4.13, utf8_decode($datos[0]['FAX']), 0, 0, 'L');
//region
        $this->_fpdf->SetY(56.52);
        $this->_fpdf->SetX(17.61);
        $this->_fpdf->Cell(59.52, 4.13, utf8_decode($datos[0]['REGION']), 0, 0, 'L');
//provincia
        $this->_fpdf->SetX(91.45);
        $this->_fpdf->Cell(51.79, 4.13, utf8_decode($datos[0]['PROVINCIA']), 0, 0, 'L');
//distrito
        $this->_fpdf->SetX(158.45);
        $this->_fpdf->Cell(46.28, 4.13, utf8_decode($datos[0]['DISTRITO']), 0, 0, 'L');
//pagina web
        $this->_fpdf->SetY(60.88);
        $this->_fpdf->SetX(22.19);
        $this->_fpdf->Cell(85.61, 4.13, utf8_decode($datos[0]['PAGINA_WEB']), 0, 0, 'L');
//email para reservas
        $this->_fpdf->SetX(143.06);
        $this->_fpdf->Cell(61.69, 4.13, utf8_decode($datos[0]['E_MAIL']), 0, 0, 'L');

//CAPITULO 2 CAPACIDAD DE ALOJAMIENTO OFERTADA / UTILIZADA
//CON BAÑO
//        $setx = 36.45;
//        $sety = 94.80;
//        
        $datos = $this->obtener_habitaciones_x_tipo_habitacion();
        $datacount = count($datos);
        $setx = 36.45;
        $sety = 94.80;
        $habitacioncuenta = 1;
        $conteok = false;
        $total = 0;
        for ($i = 1; $i <= 6; $i++) {
            $this->_fpdf->SetY($sety);
            $this->_fpdf->SetX($setx);
            for ($j = 0; $j < $datacount; $j++) {
                $dato = $datos[$j]['CANTIDAD'];
                if ($datos[$j]['IDTIPO_HABITACION'] == $habitacioncuenta && $conteok == false) {
                    if($dato!=0){$this->_fpdf->Cell(21.05, 4.30, $dato, 0, 0, 'C');}
                    else{$this->_fpdf->Cell(21.05, 4.30, '-', 0, 0, 'C');}
                    $total = $total + $dato;
                    //siguiente habitacion:
                    $conteok = true;
                    switch ($habitacioncuenta) {
                        case 1: $habitacioncuenta = 2;
                            break;
                        case 2: $habitacioncuenta = 5;
                            break;
                        case 5: $habitacioncuenta = 3;
                            break;
                        case 3: $habitacioncuenta = 6;
                            break;
                        case 6: $habitacioncuenta = 0;
                            break;
                    }
                }
            }
            $conteok = false;
            $sety = $sety + 4.30;
        }
        $this->_fpdf->SetY($sety);
        $this->_fpdf->SetX($setx);
        $this->_fpdf->Cell(21.05, 4.30, $total, 0, 0, 'C');
//        for ($i = 0; $i <= 6; $i++) {
//            $this->_fpdf->SetY($sety);
//            $this->_fpdf->SetX($setx);
//            $this->_fpdf->Cell(21.05, 4.30, utf8_decode($i), 0, 0, 'C');
//            $sety = $sety + 4.30;
//        }
//SIN BAÑO (TODOS 0)
        $setx = $setx + 21.05;
        $sety = 94.80;
        for ($i = 0; $i <= 6; $i++) {
            $this->_fpdf->SetY($sety);
            $this->_fpdf->SetX($setx);
            if ($i != 2) {
                $this->_fpdf->Cell(21.05, 4.30, '-', 0, 0, 'C');
            }
            $sety = $sety + 4.30;
        }
//NUMERO DE PLAZAS CAMA
        $datos = $this->obtener_tipo_habitacion_total();
        $datacount = count($datos);
        $setx = $setx + 21.05;
        $sety = 94.80;
        $habitacioncuenta = 1;
        $conteok = false;
        for ($i = 1; $i <= 6; $i++) {
            $this->_fpdf->SetY($sety);
            $this->_fpdf->SetX($setx);
            for ($j = 0; $j < $datacount; $j++) {
                $dato = $datos[$j]['CAMAS'];
                if ($datos[$j]['IDTIPO_HABITACION'] == $habitacioncuenta && $conteok == false) {
                    if($dato!=0){$this->_fpdf->Cell(21.05, 4.30, $dato, 0, 0, 'C');}
                    else{$this->_fpdf->Cell(21.05, 4.30, '-', 0, 0, 'C');}
                    //siguiente habitacion:
                    $conteok = true;
                    switch ($habitacioncuenta) {
                        case 1: $habitacioncuenta = 2;
                            break;
                        case 2: $habitacioncuenta = 5;
                            break;
                        case 5: $habitacioncuenta = 3;
                            break;
                        case 3: $habitacioncuenta = 6;
                            break;
                        case 6: $habitacioncuenta = 0;
                            break;
                    }
                }
            }
            $conteok = false;
            $sety = $sety + 4.30;
        }
        $this->_fpdf->SetY($sety);
        $this->_fpdf->SetX($setx);
        $this->_fpdf->Cell(21.05, 4.30, '-', 0, 0, 'C');
        
//NUMERO DE ARRIBOS DE PERSONAS
        $setx = $setx + 21.05;
        $sety = 94.80;
        $mesano = array($mes, $ano);
        $datos= $this->obtener_numero_arribos_x_tipo_habitacion($mesano);
        $datacount = count($datos);
        $habitacioncuenta = 1;
        $conteok = false;
        $total = 0;
        for ($i = 1; $i <= 6; $i++) {
            $this->_fpdf->SetY($sety);
            $this->_fpdf->SetX($setx);
            for ($j = 0; $j < $datacount; $j++) {
                if ($datos[$j]['IDTIPO_HABITACION'] == $habitacioncuenta && $conteok == false) {
                    $this->_fpdf->Cell(21.05, 4.30, $datos[$j]['CANTIDAD'], 0, 0, 'C');
                    $total = $total + $datos[$j]['CANTIDAD'];
                    //siguiente habitacion:
                    $conteok = true;
                    switch ($habitacioncuenta) {
                        case 1: $habitacioncuenta = 2;
                            break;
                        case 2: $habitacioncuenta = 5;
                            break;
                        case 5: $habitacioncuenta = 3;
                            break;
                        case 3: $habitacioncuenta = 6;
                            break;
                        case 6: $habitacioncuenta = 0;
                            break;
                    }
                }
            }
            $conteok = false;
            $sety = $sety + 4.30;
        }
        $this->_fpdf->SetY($sety);
        $this->_fpdf->SetX($setx);
        $this->_fpdf->Cell(21.05, 4.30, $total, 0, 0, 'C');
//NUMERO DE HABITACIONES-NOCHE OCUPADAS
        $setx = $setx + 21.05;
        $sety = 94.80;
        $mesano = array($mes, $ano);
        //CORREGIDO DATEDIFF DATESUB EN MYSQL
        $datos= $this->obtener_numero_pernoctaciones_x_tipo_habitacion($mesano);
        $datacount = count($datos);
        $habitacioncuenta = 1;
        $conteok = false;
        $total = 0;
        for ($i = 1; $i <= 6; $i++) {
            $this->_fpdf->SetY($sety);
            $this->_fpdf->SetX($setx);
            for ($j = 0; $j < $datacount; $j++) {
                if ($datos[$j]['IDTIPO_HABITACION'] == $habitacioncuenta && $conteok == false) {
                    $this->_fpdf->Cell(21.05, 4.30, $datos[$j]['HABITACIONES_NOCHE'], 0, 0, 'C');
                    $total = $total + $datos[$j]['HABITACIONES_NOCHE'];
                    //siguiente habitacion:
                    $conteok = true;
                    switch ($habitacioncuenta) {
                        case 1: $habitacioncuenta = 2;
                            break;
                        case 2: $habitacioncuenta = 5;
                            break;
                        case 5: $habitacioncuenta = 3;
                            break;
                        case 3: $habitacioncuenta = 6;
                            break;
                        case 6: $habitacioncuenta = 0;
                            break;
                    }
                }
            }
            $conteok = false;
            $sety = $sety + 4.30;
        }
        $this->_fpdf->SetY($sety);
        $this->_fpdf->SetX($setx);
        $this->_fpdf->Cell(21.05, 4.30, $total, 0, 0, 'C');
//        $setx = $setx + 21.05;
//        $sety = 94.80;
//        for ($i = 0; $i <= 6; $i++) {
//            $this->_fpdf->SetY($sety);
//            $this->_fpdf->SetX($setx);
//            $this->_fpdf->Cell(21.05, 4.30, utf8_decode($i), 0, 0, 'C');
//            $sety = $sety + 4.30;
//        }
//NUMERO DE PERNOCTACIONES
        $setx = $setx + 21.05;
        $sety = 94.80;
        $mesano = array($mes, $ano);
        $datos= $this->obtener_numero_pernoctaciones_x_tipo_habitacion($mesano);
        $datacount = count($datos);
        $habitacioncuenta = 1;
        $conteok = false;
        $total = 0;
        for ($i = 1; $i <= 6; $i++) {
            $this->_fpdf->SetY($sety);
            $this->_fpdf->SetX($setx);
            for ($j = 0; $j < $datacount; $j++) {
                if ($datos[$j]['IDTIPO_HABITACION'] == $habitacioncuenta && $conteok == false) {
                    $this->_fpdf->Cell(21.05, 4.30, $datos[$j]['PERNOCTACIONES'], 0, 0, 'C');
                    $total = $total + $datos[$j]['PERNOCTACIONES'];
                    //siguiente habitacion:
                    $conteok = true;
                    switch ($habitacioncuenta) {
                        case 1: $habitacioncuenta = 2;
                            break;
                        case 2: $habitacioncuenta = 5;
                            break;
                        case 5: $habitacioncuenta = 3;
                            break;
                        case 3: $habitacioncuenta = 6;
                            break;
                        case 6: $habitacioncuenta = 0;
                            break;
                    }
                }
            }
            $conteok = false;
            $sety = $sety + 4.30;
        }
        $this->_fpdf->SetY($sety);
        $this->_fpdf->SetX($setx);
        $this->_fpdf->Cell(21.05, 4.30, $total, 0, 0, 'C');
        
//TARIFA CON BAÑO
        $datos = $this->obtener_tipo_habitacion_total();
        $datacount = count($datos);
        $setx = $setx + 21.05;
        $sety = 94.80;
        $habitacioncuenta = 1;
        $conteok = false;
        for ($i = 1; $i <= 6; $i++) {
            $this->_fpdf->SetY($sety);
            $this->_fpdf->SetX($setx);
            for ($j = 0; $j < $datacount; $j++) {
                $dato = $datos[$j]['COSTO'];
                if ($datos[$j]['IDTIPO_HABITACION'] == $habitacioncuenta && $conteok == false) {
                    if($dato!=0){$this->_fpdf->Cell(21.05, 4.30, 'S/.  '.$dato, 0, 0, 'C');}
                    else {$this->_fpdf->Cell(21.05, 4.30, '-', 0, 0, 'C');}
                    //siguiente habitacion:
                    $conteok = true;
                    switch ($habitacioncuenta) {
                        case 1: $habitacioncuenta = 2;
                            break;
                        case 2: $habitacioncuenta = 5;
                            break;
                        case 5: $habitacioncuenta = 3;
                            break;
                        case 3: $habitacioncuenta = 6;
                            break;
                        case 6: $habitacioncuenta = 0;
                            break;
                    }
                }
            }
            $conteok = false;
            $sety = $sety + 4.30;
        }
//        $setx = $setx + 21.05;
//        $sety = 94.80;
//        for ($i = 0; $i <= 5; $i++) {
//            $this->_fpdf->SetY($sety);
//            $this->_fpdf->SetX($setx);
//            $this->_fpdf->Cell(21.05, 4.30, utf8_decode($i), 0, 0, 'C');
//            $sety = $sety + 4.30;
//        }
//TARIFA SIN BAÑO
        $setx = $setx + 21.05;
        $sety = 94.80;
        for ($i = 0; $i <= 5; $i++) {
            $this->_fpdf->SetY($sety);
            $this->_fpdf->SetX($setx);
            if ($i != 2) {
                $this->_fpdf->Cell(21.05, 4.30, '-', 0, 0, 'C');
            }
            $sety = $sety + 4.30;
        }
        $setx = 18.43;
        $sety = 136;
        $contadorhuesped = 0;
//CAPITULO 3
//numero de arribos de huespedes por dia del mes
        $mesano = array($mes, $ano);
        $datos = $this->obtener_numero_arribos_huesped_dia_mes($mesano);
        $datacount=count($datos);
        $conforme = 0;
        for ($i = 1; $i <= 31; $i++) {
            $this->_fpdf->SetY($sety);
            $this->_fpdf->SetX($setx);
            if ($datos[$conforme]['DIA'] == $i) {
                $this->_fpdf->Cell(12.46, 4.65, $datos[$conforme]['CANTIDAD'], 0, 0, 'C');
                $contadorhuesped = $contadorhuesped + $datos[$conforme]['CANTIDAD'];
                $conforme = $conforme + 1;
            } else {
                $this->_fpdf->Cell(12.46, 4.65, '0', 0, 0, 'C');
            }
            $setx = $setx + 24.81;
            if ($i == 8 || $i == 16 || $i == 24) {
                $sety = $sety + 5.72;
                $setx = 18.43;
            }
        }
//total
        $this->_fpdf->SetY($sety);
        $this->_fpdf->SetX($setx);
        $this->_fpdf->Cell(12.46, 4.65, $contadorhuesped, 0, 0, 'C');

        $this->_fpdf->SetFont('Arial', '', 8);
//CAPITULO IV ARRIBOS Y PERNOCTACIONES SEGUN LUGAR DE PROCEDENCIA
//internacional arribos en el mes
        $setx = 43.99;
        $sety = 173.2;
        $mesano = array($mes, $ano, 0);
        $datos = $this->obtener_numero_arribos_huesped_ubigeo_internacional($mesano);
        $datacount = count($datos);
        /* COMIENZA CON ARGENTINA, CODIGO 28 */
        $paiscuenta = 28;
        $conteok = false;
        $internacionaltotal = 0;
        
        for ($i = 0; $i < 26; $i++) {
            if ($i == 4) {
                $sety = 188.35;
            }
            if ($i == 16) {
                $sety = 232.56;
            }
            $this->_fpdf->SetY($sety);
            $this->_fpdf->SetX($setx);
            for ($j = 0; $j < $datacount; $j++) {
                if ($datos[$j]['IDPAIS'] == $paiscuenta && $conteok == false) {
                    $this->_fpdf->Cell(26.33, 3.71, $datos[$j]['CANTIDAD'], '', 0, 'C');
                    $internacionaltotal = $internacionaltotal + $datos[$j]['CANTIDAD'];
                    //Siguiente país:
                    $conteok = true;
                }
            }
            switch ($paiscuenta) {
                case 28:$paiscuenta = 15;
                    break;
                case 15:$paiscuenta = 41;
                    break;
                case 41:$paiscuenta = 43;
                    break;
                case 43:$paiscuenta = 53;
                    break;
                case 53:$paiscuenta = 191;
                    break; /* panama */
                case 191:$paiscuenta = 58;
                    break;
                case 58:$paiscuenta = 70;
                    break;
                case 70:$paiscuenta = 77;
                    break;
                case 77:$paiscuenta = 85;
                    break;
                case 85:$paiscuenta = 82;
                    break;
                case 82:$paiscuenta = 91;
                    break;
                case 91:$paiscuenta = 115;
                    break;
                case 115:$paiscuenta = 126;
                    break;
                case 126:$paiscuenta = 127;
                    break;
                case 127:$paiscuenta = 130;
                    break;
                case 130:$paiscuenta = 62;
                    break;
                case 62:$paiscuenta = 63;
                    break;
                case 63:$paiscuenta = 163;
                    break;
                case 163:$paiscuenta = 192;
                    break;
                case 192:$paiscuenta = 200;
                    break;
                case 200:$paiscuenta = 71;
                    break;
                case 71:$paiscuenta = 227;
                    break;
                case 227:$paiscuenta = 72;
                    break;
                case 72:$paiscuenta = 257;
                    break;
                case 257:$paiscuenta = 259;
                    break;
                case 259:$paiscuenta = 0;
                    break;
            }
            $conteok = false;
            $sety = $sety + 3.706;
        }
        
        //CONTINENTES
        $mesano = array($mes, $ano, 1);
        $datos = $this->obtener_numero_arribos_huesped_ubigeo_internacional($mesano);
        $datacount = count($datos);
        /* COMIENZA CON AFRICA, CODIGO 4 */
        $continentecuenta = 4;
        $conteok = false;
        for ($i = 0; $i < 5; $i++) {
            $this->_fpdf->SetY($sety);
            $this->_fpdf->SetX($setx);
            for ($j = 0; $j < $datacount; $j++) {
                if ($datos[$j]['IDCONTINENTE'] == $continentecuenta && $conteok == false) {
                    $this->_fpdf->Cell(26.33, 3.71, $datos[$j]['CANTIDAD'], '', 0, 'C');
                    $internacionaltotal = $internacionaltotal + $datos[$j]['CANTIDAD'];
                    //Siguiente CONTINENTE:
                    $conteok = true;
                }
            }
            switch ($continentecuenta) {
                case 4:$continentecuenta = 5;
                    break;
                case 5:$continentecuenta = 1;
                    break;
                case 1:$continentecuenta = 3;
                    break;
                case 3:$continentecuenta = 2;
                    break;
                case 2:$continentecuenta = 0;
                    break;
            }
            $conteok = false;
            $sety = $sety + 3.706;
        }
        $this->_fpdf->SetY($sety-0.5);
        $this->_fpdf->SetX($setx);
        $this->_fpdf->Cell(26.33, 3.706, $internacionaltotal, '', 0, 'C');

//internacional PERNOCTACIONES en el mes
        $setx = 70.32;
        $sety = 173.2;
        $mesano = array($mes, $ano, 0);
        //CORREGIDO DATEDIFF DATESUB EN MYSQL
        $datos = $this->obtener_numero_pernoctaciones_huesped_ubigeo_internacional($mesano);
        $datacount = count($datos);
        /* COMIENZA CON ARGENTINA, CODIGO 28 */
        $paiscuenta = 28;
        $conteok = false;
        $internacionaltotal = 0;
        
        for ($i = 0; $i < 26; $i++) {
            if ($i == 4) {
                $sety = 188.35;
            }
            if ($i == 16) {
                $sety = 232.56;
            }
            $this->_fpdf->SetY($sety);
            $this->_fpdf->SetX($setx);
            for ($j = 0; $j < $datacount; $j++) {
                if ($datos[$j]['IDPAIS'] == $paiscuenta && $conteok == false) {
                    $this->_fpdf->Cell(26.33, 3.71, $datos[$j]['CANTIDAD'], '', 0, 'C');
                    $internacionaltotal = $internacionaltotal + $datos[$j]['CANTIDAD'];
                    //Siguiente país:
                    $conteok = true;
                }
            }
            switch ($paiscuenta) {
                case 28:$paiscuenta = 15;
                    break;
                case 15:$paiscuenta = 41;
                    break;
                case 41:$paiscuenta = 43;
                    break;
                case 43:$paiscuenta = 53;
                    break;
                case 53:$paiscuenta = 191;
                    break; /* panama */
                case 191:$paiscuenta = 58;
                    break;
                case 58:$paiscuenta = 70;
                    break;
                case 70:$paiscuenta = 77;
                    break;
                case 77:$paiscuenta = 85;
                    break;
                case 85:$paiscuenta = 82;
                    break;
                case 82:$paiscuenta = 91;
                    break;
                case 91:$paiscuenta = 115;
                    break;
                case 115:$paiscuenta = 126;
                    break;
                case 126:$paiscuenta = 127;
                    break;
                case 127:$paiscuenta = 130;
                    break;
                case 130:$paiscuenta = 62;
                    break;
                case 62:$paiscuenta = 63;
                    break;
                case 63:$paiscuenta = 163;
                    break;
                case 163:$paiscuenta = 192;
                    break;
                case 192:$paiscuenta = 200;
                    break;
                case 200:$paiscuenta = 71;
                    break;
                case 71:$paiscuenta = 227;
                    break;
                case 227:$paiscuenta = 72;
                    break;
                case 72:$paiscuenta = 257;
                    break;
                case 257:$paiscuenta = 259;
                    break;
                case 259:$paiscuenta = 0;
                    break;
            }
            $conteok = false;
            $sety = $sety + 3.706;
        }
        
        //CONTINENTES
        $mesano = array($mes, $ano, 1);
        //CORREGIDO DATEDIFF DATESUB EN MYSQL
        $datos = $this->obtener_numero_pernoctaciones_huesped_ubigeo_internacional($mesano);
        $datacount = count($datos);
        /* COMIENZA CON AFRICA, CODIGO 4 */
        $continentecuenta = 4;
        $conteok = false;
        for ($i = 0; $i < 5; $i++) {
            $this->_fpdf->SetY($sety);
            $this->_fpdf->SetX($setx);
            for ($j = 0; $j < $datacount; $j++) {
                if ($datos[$j]['IDCONTINENTE'] == $continentecuenta && $conteok == false) {
                    $this->_fpdf->Cell(26.33, 3.71, $datos[$j]['CANTIDAD'], '', 0, 'C');
                    $internacionaltotal = $internacionaltotal + $datos[$j]['CANTIDAD'];
                    //Siguiente CONTINENTE:
                    $conteok = true;
                }
            }
            switch ($continentecuenta) {
                case 4:$continentecuenta = 5;
                    break;
                case 5:$continentecuenta = 1;
                    break;
                case 1:$continentecuenta = 3;
                    break;
                case 3:$continentecuenta = 2;
                    break;
                case 2:$continentecuenta = 0;
                    break;
            }
            $conteok = false;
            $sety = $sety + 3.706;
        }
        $this->_fpdf->SetY($sety-0.5);
        $this->_fpdf->SetX($setx);
        $this->_fpdf->Cell(26.33, 3.706, $internacionaltotal, '', 0, 'C');

//nacional arribos en el mes
        $setx = 152.75;
        $sety = 173.30;

        $limametro = 0;
        $lima = 0;
        $nacionaltotal = 0;
//obtener datos
        $mesano = array($mes, $ano, 1);
        $datos = $this->obtener_numero_arribos_huesped_ubigeo_nacional($mesano);
        $datacount = count($datos);
        for ($i = 0; $i < $datacount; $i++) {
            if ($datos[$i]['CODIGO_REGION'] == 7) {
                $limametro = $limametro + $datos[$i]['CANTIDAD'];
            } else {
                if ($datos[$i]['CODIGO_PROVINCIA'] == 0 || $datos[$i]['CODIGO_PRPVINCIA'] == 1) {
                    $limametro = $limametro + $datos[$i]['CANTIDAD'];
                } else {
                    $lima = lima + $datos[$i]['CANTIDAD'];
                }
            }
        }
        $this->_fpdf->SetY($sety);
        $this->_fpdf->SetX($setx);
        if ($limametro != 0) {
            $this->_fpdf->Cell(25.90, 6.11, $limametro, 0, 0, 'C');
        }
        $sety = $sety + 6.11;
        $this->_fpdf->SetY($sety);
        $this->_fpdf->SetX($setx);
        if ($lima != 0) {
            $this->_fpdf->Cell(25.90, 10.13, $lima, 0, 0, 'C');
        }
        $nacionaltotal = $nacionaltotal + $limametro + $lima;

        $mesano = array($mes, $ano, 0);
        $datos = $this->obtener_numero_arribos_huesped_ubigeo_nacional($mesano);
        $datacount = count($datos);
        $sety = $sety + 10.13;
        $regioncount = 1;
        for ($i = 1; $i < 24; $i++) {
            $this->_fpdf->SetY($sety);
            $this->_fpdf->SetX($setx);
            for ($j = 0; $j <= $datacount; $j++) {
                if ($datos[$j]['CODIGO_REGION'] == $regioncount) {
                    $this->_fpdf->Cell(25.90, 3.63, $datos[$j]['CANTIDAD'], 1, 0, 'C');
                    $nacionaltotal = $nacionaltotal + $datos[$j]['CANTIDAD'];
                }
            }
            $sety = $sety + 3.63;
            if ($i == 6 || $i == 13) {
                $regioncount = $regioncount + 2;
            } else {
                $regioncount = $regioncount + 1;
            }
        }
//total
        $this->_fpdf->SetY($sety);
        $this->_fpdf->SetX($setx);
        $this->_fpdf->Cell(25.90, 17.41, $nacionaltotal, 1, 0, 'C');

//nacional pernoctaciones en el mes
        $setx = 178.65;
        $sety = 173.30;
        $limametro = 0;
        $lima = 0;
        $nacionaltotal = 0;
//obtener datos
        $mesano = array($mes, $ano, 1);
        $datos = $this->obtener_numero_pernoctaciones_huesped_ubigeo_nacional($mesano);
        $datacount = count($datos);
        for ($i = 0; $i < $datacount; $i++) {
            if ($datos[$i]['CODIGO_REGION'] == 7) {
                $limametro = $limametro + $datos[$i]['CANTIDAD'];
            } else {
                if ($datos[$i]['CODIGO_PROVINCIA'] == 0 || $datos[$i]['CODIGO_PROVINCIA'] == 1) {
                    $limametro = $limametro + $datos[$i]['CANTIDAD'];
                } else {
                    $lima = lima + $datos[$i]['CANTIDAD'];
                }
            }
        }
        $this->_fpdf->SetY($sety);
        $this->_fpdf->SetX($setx);
        if ($limametro != 0) {
            $this->_fpdf->Cell(25.90, 6.11, $limametro, 0, 0, 'C');
        }
        $sety = $sety + 6.11;
        $this->_fpdf->SetY($sety);
        $this->_fpdf->SetX($setx);
        if ($lima != 0) {
            $this->_fpdf->Cell(25.90, 10.13, $lima, 0, 0, 'C');
        }
        $nacionaltotal = $nacionaltotal + $limametro + $lima;

        $mesano = array($mes, $ano, 0);
        $datos = $this->obtener_numero_pernoctaciones_huesped_ubigeo_nacional($mesano);
        $datacount = count($datos);
        $sety = $sety + 10.13;
        $regioncount = 1;
        for ($i = 1; $i < 24; $i++) {
            $this->_fpdf->SetY($sety);
            $this->_fpdf->SetX($setx);
            for ($j = 0; $j <= $datacount; $j++) {
                if ($datos[$j]['CODIGO_REGION'] == $regioncount) {
                    $this->_fpdf->Cell(25.90, 3.63, $datos[$j]['CANTIDAD'], 1, 0, 'C');
                    $nacionaltotal = $nacionaltotal + $datos[$j]['CANTIDAD'];
                }
            }
            $sety = $sety + 3.63;
            if ($i == 6 || $i == 13) {
                $regioncount = $regioncount + 2;
            } else {
                $regioncount = $regioncount + 1;
            }
        }
//total
        $this->_fpdf->SetY($sety);
        $this->_fpdf->SetX($setx);
        $this->_fpdf->Cell(25.90, 17.41, $nacionaltotal, 1, 0, 'C');

        $this->_fpdf->AddPage();
        $this->_fpdf->Image(ROOT . 'vista' . DS . 'reportes' . DS . 'img' . DS . 'estadistica_mensual_back.jpg', 0, 0, 210, 297, 'PNG');


//CAPITULO 5 NUMERO DE PUESTOS DE TRABAJO
        $tact1 = 0;
        $tact2 = 0;
        $tact3 = 0;
        $tact4 = 0;
        $tact5 = 0;
        $tact6 = 0;
        $tact7 = 0;
        $ttipo1 = 0;
        $ttipo2 = 0;
        $ttipo3 = 0;
        $ttipo4 = 0;
        $ttipo5 = 0;
        $ttipo6 = 0;
//OBTIENE DATOS:
        $datos = $this->obtener_cantidad_empleados_x_tipo_x_actividad();
        $datacount = count($datos);
//ejecutivos y personal administrativo
        $setx = 66.262;
        $sety = 22.132;
        $this->_fpdf->SetY($sety);
        $this->_fpdf->SetX($setx);
        for ($i = 0; $i < 8; $i++) {
            $this->_fpdf->SetY($sety);
            $this->_fpdf->SetX($setx);
            $sety = $sety + 4.373;
            if ($i == 0) {
                $iconta = $i;
            } else {
                $iconta = $iconta + 1;
            }
            if ($i == 3) {
                $iconta = $iconta - 1;
            }
            if ($i == 1 || $i == 2 || $i == 4 || $i == 5 || $i == 6 || $i == 7) {
                for ($j = 0; $j < $datacount; $j++) {
                    if ($datos[$j]['IDTIPO_EMPLEADO'] == $iconta) {
                        if ($datos[$j]['IDACTIVIDAD'] == 1) {
                            $cant = $datos[$j]['CANTIDAD'];
                            switch ($iconta) {
                                case 1:$ttipo1 = $ttipo1 + $cant;
                                    break;
                                case 2:$ttipo2 = $ttipo2 + $cant;
                                    break;
                                case 3:$ttipo3 = $ttipo3 + $cant;
                                    break;
                                case 4:$ttipo4 = $ttipo4 + $cant;
                                    break;
                                case 5:$ttipo5 = $ttipo5 + $cant;
                                    break;
                                case 6:$ttipo6 = $ttipo6 + $cant;
                                    break;
                            }
                            $this->_fpdf->Cell(19.718, 4.373, $cant, 0, 0, 'C');
                            $tact1 = $tact1 + $cant;
                        } else {
                            $this->_fpdf->Cell(19.718, 4.373, '', 0, 0, 'C');
                        }
                    }
                }
            } else {
                $this->_fpdf->Cell(19.718, 4.373, '', 0, 0, 'C');
            }
        }
//recepcion
        $setx = 85.98;
        $sety = 22.132;
        $this->_fpdf->SetY($sety);
        $this->_fpdf->SetX($setx);
        for ($i = 0; $i < 8; $i++) {
            $this->_fpdf->SetY($sety);
            $this->_fpdf->SetX($setx);
            $sety = $sety + 4.373;
            if ($i == 0) {
                $iconta = $i;
            } else {
                $iconta = $iconta + 1;
            }
            if ($i == 3) {
                $iconta = $iconta - 1;
            }
            if ($i == 1 || $i == 2 || $i == 4 || $i == 5 || $i == 6 || $i == 7) {
                for ($j = 0; $j < $datacount; $j++) {
                    if ($datos[$j]['IDTIPO_EMPLEADO'] == $iconta) {
                        if ($datos[$j]['IDACTIVIDAD'] == /* CODIGO DE ACTIVIDAD */2) {
                            $cant = $datos[$j]['CANTIDAD'];
                            switch ($iconta) {
                                case 1:$ttipo1 = $ttipo1 + $cant;
                                    break;
                                case 2:$ttipo2 = $ttipo2 + $cant;
                                    break;
                                case 3:$ttipo3 = $ttipo3 + $cant;
                                    break;
                                case 4:$ttipo4 = $ttipo4 + $cant;
                                    break;
                                case 5:$ttipo5 = $ttipo5 + $cant;
                                    break;
                                case 6:$ttipo6 = $ttipo6 + $cant;
                                    break;
                            }
                            $this->_fpdf->Cell(19.718, 4.373, $cant, 0, 0, 'C');
                            $tact2 = $tact2 + $cant;
                        } else {
                            $this->_fpdf->Cell(19.718, 4.373, '', 0, 0, 'C');
                        }
                    }
                }
            } else {
                $this->_fpdf->Cell(19.718, 4.373, '', 0, 0, 'C');
            }
        }
//consejeria
        $setx = 105.698;
        $sety = 22.132;
        $this->_fpdf->SetY($sety);
        $this->_fpdf->SetX($setx);
        for ($i = 0; $i < 8; $i++) {
            $this->_fpdf->SetY($sety);
            $this->_fpdf->SetX($setx);
            $sety = $sety + 4.373;
            if ($i == 0) {
                $iconta = $i;
            } else {
                $iconta = $iconta + 1;
            }
            if ($i == 3) {
                $iconta = $iconta - 1;
            }
            if ($i == 1 || $i == 2 || $i == 4 || $i == 5 || $i == 6 || $i == 7) {
                for ($j = 0; $j < $datacount; $j++) {
                    if ($datos[$j]['IDTIPO_EMPLEADO'] == $iconta) {
                        if ($datos[$j]['IDACTIVIDAD'] == /* CODIGO DE ACTIVIDAD */3) {
                            $cant = $datos[$j]['CANTIDAD'];
                            switch ($iconta) {
                                case 1:$ttipo1 = $ttipo1 + $cant;
                                    break;
                                case 2:$ttipo2 = $ttipo2 + $cant;
                                    break;
                                case 3:$ttipo3 = $ttipo3 + $cant;
                                    break;
                                case 4:$ttipo4 = $ttipo4 + $cant;
                                    break;
                                case 5:$ttipo5 = $ttipo5 + $cant;
                                    break;
                                case 6:$ttipo6 = $ttipo6 + $cant;
                                    break;
                            }
                            $this->_fpdf->Cell(19.718, 4.373, $cant, 0, 0, 'C');
                            $tact3 = $tact3 + $cant;
                        } else {
                            $this->_fpdf->Cell(19.718, 4.373, '', 0, 0, 'C');
                        }
                    }
                }
            } else {
                $this->_fpdf->Cell(19.718, 4.373, '', 0, 0, 'C');
            }
        }
//limpieza
        $setx = 125.416;
        $sety = 22.132;
        $this->_fpdf->SetY($sety);
        $this->_fpdf->SetX($setx);
        for ($i = 0; $i < 8; $i++) {
            $this->_fpdf->SetY($sety);
            $this->_fpdf->SetX($setx);
            $sety = $sety + 4.373;
            if ($i == 0) {
                $iconta = $i;
            } else {
                $iconta = $iconta + 1;
            }
            if ($i == 3) {
                $iconta = $iconta - 1;
            }
            if ($i == 1 || $i == 2 || $i == 4 || $i == 5 || $i == 6 || $i == 7) {
                for ($j = 0; $j < $datacount; $j++) {
                    if ($datos[$j]['IDTIPO_EMPLEADO'] == $iconta) {
                        if ($datos[$j]['IDACTIVIDAD'] == /* CODIGO DE ACTIVIDAD */4) {
                            $cant = $datos[$j]['CANTIDAD'];
                            switch ($iconta) {
                                case 1:$ttipo1 = $ttipo1 + $cant;
                                    break;
                                case 2:$ttipo2 = $ttipo2 + $cant;
                                    break;
                                case 3:$ttipo3 = $ttipo3 + $cant;
                                    break;
                                case 4:$ttipo4 = $ttipo4 + $cant;
                                    break;
                                case 5:$ttipo5 = $ttipo5 + $cant;
                                    break;
                                case 6:$ttipo6 = $ttipo6 + $cant;
                                    break;
                            }
                            $this->_fpdf->Cell(19.718, 4.373, $cant, 0, 0, 'C');
                            $tact4 = $tact4 + $cant;
                        } else {
                            $this->_fpdf->Cell(19.718, 4.373, '', 0, 0, 'C');
                        }
                    }
                }
            } else {
                $this->_fpdf->Cell(19.718, 4.373, '', 0, 0, 'C');
            }
        }
//comedor y cafeteria
        $setx = 145.134;
        $sety = 22.132;
        $this->_fpdf->SetY($sety);
        $this->_fpdf->SetX($setx);
        for ($i = 0; $i < 8; $i++) {
            $this->_fpdf->SetY($sety);
            $this->_fpdf->SetX($setx);
            $sety = $sety + 4.373;
            if ($i == 0) {
                $iconta = $i;
            } else {
                $iconta = $iconta + 1;
            }
            if ($i == 3) {
                $iconta = $iconta - 1;
            }
            if ($i == 1 || $i == 2 || $i == 4 || $i == 5 || $i == 6 || $i == 7) {
                for ($j = 0; $j < $datacount; $j++) {
                    if ($datos[$j]['IDTIPO_EMPLEADO'] == $iconta) {
                        if ($datos[$j]['IDACTIVIDAD'] == /* CODIGO DE ACTIVIDAD */5) {
                            $cant = $datos[$j]['CANTIDAD'];
                            switch ($iconta) {
                                case 1:$ttipo1 = $ttipo1 + $cant;
                                    break;
                                case 2:$ttipo2 = $ttipo2 + $cant;
                                    break;
                                case 3:$ttipo3 = $ttipo3 + $cant;
                                    break;
                                case 4:$ttipo4 = $ttipo4 + $cant;
                                    break;
                                case 5:$ttipo5 = $ttipo5 + $cant;
                                    break;
                                case 6:$ttipo6 = $ttipo6 + $cant;
                                    break;
                            }
                            $this->_fpdf->Cell(19.718, 4.373, $cant, 0, 0, 'C');
                            $tact5 = $tact5 + $cant;
                        } else {
                            $this->_fpdf->Cell(19.718, 4.373, '', 0, 0, 'C');
                        }
                    }
                }
            } else {
                $this->_fpdf->Cell(19.718, 4.373, '', 0, 0, 'C');
            }
        }
//bar
        $setx = 164.852;
        $sety = 22.132;
        $this->_fpdf->SetY($sety);
        $this->_fpdf->SetX($setx);
        for ($i = 0; $i < 8; $i++) {
            $this->_fpdf->SetY($sety);
            $this->_fpdf->SetX($setx);
            $sety = $sety + 4.373;
            if ($i == 0) {
                $iconta = $i;
            } else {
                $iconta = $iconta + 1;
            }
            if ($i == 3) {
                $iconta = $iconta - 1;
            }
            if ($i == 1 || $i == 2 || $i == 4 || $i == 5 || $i == 6 || $i == 7) {
                for ($j = 0; $j < $datacount; $j++) {
                    if ($datos[$j]['IDTIPO_EMPLEADO'] == $iconta) {
                        if ($datos[$j]['IDACTIVIDAD'] == /* CODIGO DE ACTIVIDAD */6) {
                            $cant = $datos[$j]['CANTIDAD'];
                            switch ($iconta) {
                                case 1:$ttipo1 = $ttipo1 + $cant;
                                    break;
                                case 2:$ttipo2 = $ttipo2 + $cant;
                                    break;
                                case 3:$ttipo3 = $ttipo3 + $cant;
                                    break;
                                case 4:$ttipo4 = $ttipo4 + $cant;
                                    break;
                                case 5:$ttipo5 = $ttipo5 + $cant;
                                    break;
                                case 6:$ttipo6 = $ttipo6 + $cant;
                                    break;
                            }
                            $this->_fpdf->Cell(19.718, 4.373, $cant, 0, 0, 'C');
                            $tact6 = $tact6 + $cant;
                        } else {
                            $this->_fpdf->Cell(19.718, 4.373, '', 0, 0, 'C');
                        }
                    }
                }
            } else {
                $this->_fpdf->Cell(19.718, 4.373, '', 0, 0, 'C');
            }
        }
//los demas puestos de trabajo OTROS
        $setx = 184.57;
        $sety = 22.132;
        $this->_fpdf->SetY($sety);
        $this->_fpdf->SetX($setx);
        for ($i = 0; $i < 8; $i++) {
            $this->_fpdf->SetY($sety);
            $this->_fpdf->SetX($setx);
            $sety = $sety + 4.373;
            if ($i == 0) {
                $iconta = $i;
            } else {
                $iconta = $iconta + 1;
            }
            if ($i == 3) {
                $iconta = $iconta - 1;
            }
            if ($i == 1 || $i == 2 || $i == 4 || $i == 5 || $i == 6 || $i == 7) {
                for ($j = 0; $j < $datacount; $j++) {
                    if ($datos[$j]['IDTIPO_EMPLEADO'] == $iconta) {
                        if ($datos[$j]['IDACTIVIDAD'] == /* CODIGO DE ACTIVIDAD */7) {
                            $cant = $datos[$j]['CANTIDAD'];
                            switch ($iconta) {
                                case 1:$ttipo1 = $ttipo1 + $cant;
                                    break;
                                case 2:$ttipo2 = $ttipo2 + $cant;
                                    break;
                                case 3:$ttipo3 = $ttipo3 + $cant;
                                    break;
                                case 4:$ttipo4 = $ttipo4 + $cant;
                                    break;
                                case 5:$ttipo5 = $ttipo5 + $cant;
                                    break;
                                case 6:$ttipo6 = $ttipo6 + $cant;
                                    break;
                            }
                            $this->_fpdf->Cell(19.718, 4.373, $cant, 0, 0, 'C');
                            $tact7 = $tact7 + $cant;
                        } else {
                            $this->_fpdf->Cell(19.718, 4.373, '', 0, 0, 'C');
                        }
                    }
                }
            } else {
                $this->_fpdf->Cell(19.718, 4.373, '', 0, 0, 'C');
            }
        }

//TOTALES DE CAPITULO 5
        $this->_fpdf->SetFont('Arial', 'B', 8);
//total puestos de trabajo
        $ttipot = array($ttipo1, $ttipo2, $ttipo3, $ttipo4, $ttipo5, $ttipo6);
        $setx = 46.544;
        $sety = 22.132;
        $this->_fpdf->SetY($sety);
        $this->_fpdf->SetX($setx);
        for ($i = 0; $i < 8; $i++) {
            $this->_fpdf->SetY($sety);
            $this->_fpdf->SetX($setx);
            $sety = $sety + 4.373;
            if ($i == 0) {
                $iconta = $i;
            } else {
                $iconta = $iconta + 1;
            }
            if ($i == 3) {
                $iconta = $iconta - 1;
            }
            if ($i == 1 || $i == 2 || $i == 4 || $i == 5 || $i == 6 || $i == 7) {
                if ($ttipot[$iconta - 1] != 0) {
                    $this->_fpdf->Cell(19.718, 4.373, $ttipot[$iconta - 1], 0, 0, 'C');
                } else {
                    $this->_fpdf->Cell(19.718, 4.373, '', 0, 0, 'C');
                }
            } else {
                $this->_fpdf->Cell(19.718, 4.373, '', 0, 0, 'C');
            }
        }
//total actividades
        $tactt = array(($tact1 + $tact2 + $tact3 + $tact4 + $tact5 + $tact6 + $tact7), $tact1, $tact2, $tact3, $tact4, $tact5, $tact6, $tact7);

        for ($i = 0; $i < 8; $i++) {
            $this->_fpdf->SetY($sety);
            $this->_fpdf->SetX($setx);
            $setx = $setx + 19.718;
            $this->_fpdf->Cell(19.718, 4.373, $tactt[$i], 0, 0, 'C');
        }
        $this->_fpdf->Output();
    }
    
    public function stock_actual_ubicac(){
        $Y_table_position = 41;
        
        $ubicaciones = $this->obtener_ubicaciones();
        $n_ubicaciones = count($ubicaciones);
        
        $opp = 47;
        $contapag = 1;
        $abs = 1;
        for ($x = 0; $x < $n_ubicaciones; $x++) {
            $datos = $this->obtener_stock_por_ubicacion($ubicaciones[$x]['IDUBICACION']);
            $datacount = count($datos);
            $contaobj = 0;
            $c_codigo[$contapag] = "";
            $c_descripcion[$contapag] = "";
            $c_tipo_producto[$contapag] = "";
            $c_almacen[$contapag] = "";
            $c_unidad_medida[$contapag] = "";
            $c_stock[$contapag] = "";
            for ($i = 0; $i < $datacount; $i++) {
                $c_codigo[$contapag] = $c_codigo[$contapag] . $datos[$i]['IDPRODUCTO'] . "\n";
                $c_descripcion[$contapag] = $c_descripcion[$contapag] . $datos[$i]['DESCRIPCION'] . "\n";
                $c_tipo_producto[$contapag] = $c_tipo_producto[$contapag] . substr($datos[$i]['TIPO_PRODUCTO'], 0, 8) . "\n";
                $c_almacen[$contapag] = $c_almacen[$contapag] . substr($datos[$i]['ALMACEN'], 0, 10) . "\n";
                $c_unidad_medida[$contapag] = $c_unidad_medida[$contapag] . substr($datos[$i]['UNIDAD_MEDIDA'], 0, 6) . "\n";
                $c_stock[$contapag] = $c_stock[$contapag] . $datos[$i]['STOCK'] . "0" . "\n";
                $contaobj = $contaobj + 1;
                if ($contaobj == $opp) {
                    $contaobj = 0;
                    $contapag = $contapag + 1;
                }
            }
            if ($contaobj == 0) {
                $contapag = $contapag - 1;
            }
            for ($i = $abs; $i <= $contapag; $i++) {
                $this->_fpdf->AddPage();
                //ENCABEZADO TITULO DE REPORTE
                $this->_fpdf->SetFont('Arial','B',12);
                $this->_fpdf->SetY(24);
                $this->_fpdf->SetX(0);
                $this->_fpdf->Cell(210,5, utf8_decode('REGISTRO DEL STOCK EN UNIDADES FÍSICAS POR UBICACIÓN'),0,0,'C');
                $this->_fpdf->SetFillColor(232,232,232);
                $this->_fpdf->SetFont('Courier','B',9);
                $this->_fpdf->SetY(35);
                $this->_fpdf->SetX(15);
                $this->_fpdf->Cell(18,6,utf8_decode('Código'),'BT',0,'L',1);
                $this->_fpdf->SetX(33);
                $this->_fpdf->Cell(77,6,utf8_decode('Producto'),'BT',0,'L',1);
                $this->_fpdf->SetX(110);
                $this->_fpdf->Cell(20,6,utf8_decode('Tipo'),'BT',0,'L',1);
                $this->_fpdf->SetX(130);
                $this->_fpdf->Cell(25,6,utf8_decode('Almacén'),'BT',0,'L',1);
                $this->_fpdf->SetX(155);
                $this->_fpdf->Cell(15,6,utf8_decode('U.M.'),'BT',0,'C',1);
                $this->_fpdf->SetX(170);
                $this->_fpdf->Cell(25,6,utf8_decode('Stock'),'BT',0,'R',1);
                //MARGEN TOTAL: HASTA=195 (ULTIMO SETX + ANCHO DE ULTIMO CELL)
                //UBICACIÓN:
                $this->_fpdf->SetFont('Courier', '', 11);
                $this->_fpdf->SetFillColor(255, 255, 255);
                $this->_fpdf->SetY(29);
                $this->_fpdf->SetX(15);
                $this->_fpdf->Cell(30, 5, utf8_decode('Ubicación :   ' . $ubicaciones[$x]['DESCRIPCION'] . '     /   Código:  ' . $ubicaciones[$x]['IDUBICACION']), '', 0, 'L', 1);
                $this->_fpdf->SetFont('Courier', '', 9);
                $this->_fpdf->SetY($Y_table_position);
                $this->_fpdf->SetX(15);
                $this->_fpdf->MultiCell(18, 5, $c_codigo[$i], 1);
                $this->_fpdf->SetY($Y_table_position);
                $this->_fpdf->SetX(33);
                $this->_fpdf->MultiCell(77, 5, $c_descripcion[$i], 1);
                $this->_fpdf->SetY($Y_table_position);
                $this->_fpdf->SetX(110);
                $this->_fpdf->MultiCell(20, 5, $c_tipo_producto[$i], 1);
                $this->_fpdf->SetY($Y_table_position);
                $this->_fpdf->SetX(130);
                $this->_fpdf->MultiCell(25, 5, $c_almacen[$i], 1);
                $this->_fpdf->SetY($Y_table_position);
                $this->_fpdf->SetX(155);
                $this->_fpdf->MultiCell(15, 5, $c_unidad_medida[$i], 1, 'C');
                $this->_fpdf->SetY($Y_table_position);
                $this->_fpdf->SetX(170);
                $this->_fpdf->MultiCell(25, 5, $c_stock[$i], 1, 'R');
                $abs = $abs + 1;
            }
            $abs = 1;
            $contapag = 1;
        }
        $this->_fpdf->Output();
    }
    
    public function ventas_x_producto(){
        $producto=$_POST['idproducto'];
        $fecha_inicio = $_POST['fecha_inicio'];
        $fecha_fin = $_POST['fecha_fin'];
        if($producto=="" || $fecha_inicio=="" || $fecha_fin==""){
            echo "<script>alert('No se puede generar el reporte debido a datos erroneos o faltantes'); window.close();</script>";
            die();
        }
        $Y_table_position = 41;
        /*OBTENER LOS PRODUCTOS*/
        if($producto=='*'){
            $productos = $this->obtener_productos_vendidos(array(0, $fecha_inicio, $fecha_fin));
        } else {
            $productos = $this->obtener_productos_vendidos(array($producto, $fecha_inicio, $fecha_fin));
        }
        $n_productos = count($productos);
        
        /*Objetos Por pagina (opp)*/$opp = 47;
        $contapag = 1;
        $abs = 1;
            for ($x = 0; $x < $n_productos; $x++) {
                $datos = $this->obtener_ventas_x_producto(array($productos[$x]['IDPRODUCTO'], $fecha_inicio, $fecha_fin));
                $datacount = count($datos);
                $contaobj = 0;
                $contador[$contapag] = "";
                $c_fecha_venta[$contapag] = "";
                $c_nro_documento[$contapag] = "";
                $c_cliente[$contapag] = "";
                $c_documento[$contapag] = "";
                $c_abreviatura[$contapag] = "";
                $c_cantidad[$contapag] = "";
                $c_precio_venta[$contapag] = "";
                $c_sub_total[$contapag] = "";
                
                $total_cantidad = 0;
                $total_sub_total = 0;
                /*$horafecha = array(
            
            substr($datos[0]['fecha_venta'],11,2),
            substr($datos[0]['fecha_venta'],14,2),
            substr($datos[0]['fecha_venta'],17,2)
            );*/
                for ($i = 0; $i < $datacount; $i++) {
                    $contador[$contapag] = $contador[$contapag] . substr((($i+1)*$contapag),0,4)."\n";
                    $c_fecha_venta[$contapag] = $c_fecha_venta[$contapag] . substr($datos[0]['FECHA_VENTA'],8,2).'/'.substr($datos[0]['FECHA_VENTA'],5,2).
                            '/'.substr($datos[0]['FECHA_VENTA'],0,4) . "\n";
                    $c_nro_documento[$contapag] = $c_nro_documento[$contapag] .substr($datos[$i]['TIPO_COMPROBANTE'],0,2).'/' . 
                            substr($datos[$i]['NRO_DOCUMENTO'], 0, 8) . "\n";
                    $c_cliente[$contapag] = $c_cliente[$contapag] . substr(utf8_decode($datos[$i]['CLIENTE']), 0, 24) . "\n";
                    $c_documento[$contapag] = $c_documento[$contapag] . substr($datos[$i]['DOCUMENTO'], 0, 11) . "\n";
                    $c_abreviatura[$contapag] = $c_abreviatura[$contapag] . substr($datos[$i]['ABREVIATURA'],0,4) . "\n";
                    $c_cantidad[$contapag] = $c_cantidad[$contapag] . substr(number_format($datos[$i]['CANTIDAD'],3),0,9) . "\n";
                    /*contar total cantidades*/$total_cantidad = $total_cantidad + $datos[$i]['CANTIDAD'];
                    $c_precio_venta[$contapag] = $c_precio_venta[$contapag] . substr(number_format($datos[$i]['PRECIO_VENTA'],3),0,9) . "\n";
                    $c_sub_total[$contapag] = $c_sub_total[$contapag] . substr(number_format($datos[$i]['SUB_TOTAL'],2),0,9) . "\n";
                    /*contar total sub totales*/$total_sub_total = $total_sub_total + $datos[$i]['SUB_TOTAL'];
                    $contaobj = $contaobj + 1;
                    if ($contaobj == $opp) {
                        $contaobj = 0;
                        $contapag = $contapag + 1;
                    }
                }
                if ($contaobj == 0) {
                    $contapag = $contapag - 1;
                }
                for ($i = $abs; $i <= $contapag; $i++) {
                    $this->_fpdf->AddPage();
                    //ENCABEZADO TITULO DE REPORTE
                    $this->_fpdf->SetFont('Arial','B',12);
                    $this->_fpdf->SetY(24);
                    $this->_fpdf->SetX(0);
                    $this->_fpdf->Cell(210,5, utf8_decode('REGISTRO DE VENTAS DETALLADAS POR PRODUCTO'),0,0,'C');
                    $this->_fpdf->SetFillColor(232,232,232);
                    $this->_fpdf->SetFont('Courier','B',9);
                    $this->_fpdf->SetY(35);
                    $this->_fpdf->SetX(5);
                    $this->_fpdf->Cell(10,6,utf8_decode('Nro.'),'BT',0,'L',1);
                    $this->_fpdf->SetX(15);
                    $this->_fpdf->Cell(22,6,utf8_decode('Fec.Emis.'),'BT',0,'C',1);
                    $this->_fpdf->SetX(37);
                    $this->_fpdf->Cell(28,6,utf8_decode('Comprobante'),'BT',0,'L',1);
                    $this->_fpdf->SetX(65);
                    $this->_fpdf->Cell(49,6,utf8_decode('Cliente Ref.'),'BT',0,'L',1);
                    $this->_fpdf->SetX(114);
                    $this->_fpdf->Cell(23,6,utf8_decode('DNI/RUC'),'BT',0,'C',1);
                    $this->_fpdf->SetX(137);
                    $this->_fpdf->Cell(10,6,utf8_decode('U.M.'),'BT',0,'C',1);
                    $this->_fpdf->SetX(147);
                    $this->_fpdf->Cell(20,6,utf8_decode('Cantidad'),'BT',0,'C',1);
                    $this->_fpdf->SetX(167);
                    $this->_fpdf->Cell(20,6,utf8_decode('Precio'),'BT',0,'C',1);
                    $this->_fpdf->SetX(187);
                    $this->_fpdf->Cell(18,6,utf8_decode('SubTotal'),'BT',0,'R',1);
                    //MARGEN TOTAL: HASTA=195 (ULTIMO SETX + ANCHO DE ULTIMO CELL)
                    //UBICACIÓN:
                    $this->_fpdf->SetFont('Courier', '', 11);
                    $this->_fpdf->SetFillColor(255, 255, 255);
                    $this->_fpdf->SetY(29);
                    $this->_fpdf->SetX(15);
                    $this->_fpdf->Cell(30, 5, utf8_decode('Producto :   ' . $productos[$x]['DESCRIPCION'] . '     /   Código:  ' .
                            $productos[$x]['IDPRODUCTO']), '', 0, 'L', 1);
                    $this->_fpdf->SetFont('Courier', '', 9);
                    $this->_fpdf->SetY($Y_table_position);
                    $this->_fpdf->SetX(5);
                    $this->_fpdf->MultiCell(10, 5, $contador[$i], 1);
                    $this->_fpdf->SetY($Y_table_position);
                    $this->_fpdf->SetX(15);
                    $this->_fpdf->MultiCell(22, 5, $c_fecha_venta[$i], 1);
                    $this->_fpdf->SetY($Y_table_position);
                    $this->_fpdf->SetX(37);
                    $this->_fpdf->MultiCell(28, 5, $c_nro_documento[$i], 1);
                    $this->_fpdf->SetY($Y_table_position);
                    $this->_fpdf->SetX(65);
                    $this->_fpdf->MultiCell(49, 5, $c_cliente[$i], 1);
                    /*$this->_fpdf->SetY($Y_table_position);
                    $this->_fpdf->SetX(164);
                    $this->_fpdf->MultiCell(23, 5, $c_documento[$i], 1, 'C');
                     */
                    $this->_fpdf->SetY($Y_table_position);
                    $this->_fpdf->SetX(114);
                    $this->_fpdf->MultiCell(23, 5, $c_documento[$i], 1, 'C');
                    $this->_fpdf->SetY($Y_table_position);
                    $this->_fpdf->SetX(137);
                    $this->_fpdf->MultiCell(10, 5, $c_abreviatura[$i], 1, 'C');
                    $this->_fpdf->SetY($Y_table_position);
                    $this->_fpdf->SetX(147);
                    $this->_fpdf->MultiCell(20, 5, $c_cantidad[$i], 1, 'R');
                    $this->_fpdf->SetY($Y_table_position);
                    $this->_fpdf->SetX(167);
                    $this->_fpdf->MultiCell(20, 5, $c_precio_venta[$i], 1, 'R');
                    /*(---)*/
                    $this->_fpdf->SetFont('Courier', '', 8);
                    $this->_fpdf->SetY($Y_table_position);
                    $this->_fpdf->SetX(187);
                    $this->_fpdf->MultiCell(18, 5, $c_sub_total[$i], 1, 'R');
                    if($i==$contapag){
                        $this->_fpdf->SetFont('Courier', 'B', 10);
                        $this->_fpdf->SetY((5*$contaobj)+$Y_table_position+2);
                        $this->_fpdf->SetX(105);
                        $this->_fpdf->Cell(18,8,utf8_decode('TOTALES'),'BT',0,'L',1);
                        $this->_fpdf->SetX(123);
                        $this->_fpdf->Cell(44,8,substr(number_format($total_cantidad,3),0,15).' '.$datos[0]['ABREVIATURA'],'BTR',0,'R',1);
                        $this->_fpdf->SetFont('Courier', '', 9);
                        $this->_fpdf->SetX(167);
                        $this->_fpdf->Cell(9,8,utf8_decode('S/.'),'LBT',0,'R',1);
                        $this->_fpdf->SetFont('Courier', 'B', 10);
                        $this->_fpdf->SetX(176);
                        $this->_fpdf->Cell(29,8,substr(number_format($total_sub_total,2),0,13),'BT',0,'R',1);
                    }
                    
                    $abs = $abs + 1;
                }
                $abs = 1;
                $contapag = 1;
            }
        
        $this->_fpdf->Output();
    }
    
    public function compras_x_producto(){
        $producto=$_POST['idproducto'];
        $fecha_inicio = $_POST['fecha_inicio'];
        $fecha_fin = $_POST['fecha_fin'];
        if($producto=="" || $fecha_inicio=="" || $fecha_fin==""){
            echo "<script>alert('No se puede generar el reporte debido a datos erroneos o faltantes'); window.close();</script>";
            die();
        }
        $Y_table_position = 41;
        /*OBTENER LOS PRODUCTOS*/
        if($producto=='*'){
            $productos = $this->obtener_productos_comprados(array(0, $fecha_inicio, $fecha_fin));
        } else {
            $productos = $this->obtener_productos_comprados(array($producto, $fecha_inicio, $fecha_fin));
        }
        $n_productos = count($productos);
        
        /*Objetos Por pagina (opp)*/$opp = 47;
        $contapag = 1;
        $abs = 1;
            for ($x = 0; $x < $n_productos; $x++) {
                $datos = $this->obtener_compras_x_producto(array($productos[$x]['IDPRODUCTO'], $fecha_inicio, $fecha_fin));
                $datacount = count($datos);
                $contaobj = 0;
                $contador[$contapag] = "";
                $c_fecha_venta[$contapag] = "";
                $c_nro_comprobante[$contapag] = "";
                $c_proveedor[$contapag] = "";
                $c_ruc[$contapag] = "";
                $c_abreviatura[$contapag] = "";
                $c_cantidad[$contapag] = "";
                $c_precio[$contapag] = "";
                $c_sub_total[$contapag] = "";
                $c_confirmacion[$contapag] = "";
                
                $total_cantidad = 0;
                $total_sub_total = 0;
                /*$horafecha = array(
            
            substr($datos[0]['fecha_venta'],11,2),
            substr($datos[0]['fecha_venta'],14,2),
            substr($datos[0]['fecha_venta'],17,2)
            );*/
                for ($i = 0; $i < $datacount; $i++) {
                    $contador[$contapag] = $contador[$contapag] . substr((($i+1)*$contapag),0,4)."\n";
                    $c_fecha_venta[$contapag] = $c_fecha_venta[$contapag] . substr($datos[0]['FECHA_VENTA'],8,2).'/'.substr($datos[0]['FECHA_VENTA'],5,2).
                            '/'.substr($datos[0]['FECHA_VENTA'],0,4) . "\n";
                    $c_nro_comprobante[$contapag] = $c_nro_comprobante[$contapag] .'FC/' . substr($datos[$i]['NRO_COMPROBANTE'], 0, 8) . "\n";
                    $c_proveedor[$contapag] = $c_proveedor[$contapag] . substr(utf8_decode($datos[$i]['PROVEEDOR']), 0, 24) . "\n";
                    $c_ruc[$contapag] = $c_ruc[$contapag] . substr($datos[$i]['RUC'], 0, 11) . "\n";
                    $c_abreviatura[$contapag] = $c_abreviatura[$contapag] . substr($datos[$i]['ABREVIATURA'],0,4) . "\n";
                    $c_cantidad[$contapag] = $c_cantidad[$contapag] . substr(number_format($datos[$i]['CANTIDAD'],3),0,9) . "\n";
                    /*contar total cantidades*/$total_cantidad = $total_cantidad + $datos[$i]['CANTIDAD'];
                    $c_precio[$contapag] = $c_precio[$contapag] . substr(number_format($datos[$i]['PRECIO'],3),0,9) . "\n";
                    $c_sub_total[$contapag] = $c_sub_total[$contapag] . substr(number_format($datos[$i]['SUB_TOTAL'],2),0,9) . "\n";
                    $c_confirmacion[$contapag] = $c_confirmacion[$contapag] . $datos[$i]['CONFIRMACION'] . "\n";
                    /*contar total sub totales*/$total_sub_total = $total_sub_total + $datos[$i]['SUB_TOTAL'];
                    $contaobj = $contaobj + 1;
                    if ($contaobj == $opp) {
                        $contaobj = 0;
                        $contapag = $contapag + 1;
                    }
                }
                if ($contaobj == 0) {
                    $contapag = $contapag - 1;
                }
                for ($i = $abs; $i <= $contapag; $i++) {
                    $this->_fpdf->AddPage();
                    //ENCABEZADO TITULO DE REPORTE
                    $this->_fpdf->SetFont('Arial','B',12);
                    $this->_fpdf->SetY(24);
                    $this->_fpdf->SetX(0);
                    $this->_fpdf->Cell(210,5, utf8_decode('REGISTRO DE COMPRAS DETALLADAS POR PRODUCTO'),0,0,'C');
                    $this->_fpdf->SetFillColor(232,232,232);
                    $this->_fpdf->SetFont('Courier','B',9);
                    $this->_fpdf->SetY(35);
                    $this->_fpdf->SetX(5);
                    $this->_fpdf->Cell(10,6,utf8_decode('Nro.'),'BT',0,'L',1);
                    $this->_fpdf->SetX(15);
                    $this->_fpdf->Cell(22,6,utf8_decode('Fec.Fact.'),'BT',0,'C',1);
                    $this->_fpdf->SetX(37);
                    $this->_fpdf->Cell(28,6,utf8_decode('Factura'),'BT',0,'L',1);
                    $this->_fpdf->SetX(65);
                    $this->_fpdf->Cell(49,6,utf8_decode('Cliente Ref.'),'BT',0,'L',1);
                    $this->_fpdf->SetX(114);
                    $this->_fpdf->Cell(23,6,utf8_decode('DNI/RUC'),'BT',0,'C',1);
                    $this->_fpdf->SetX(137);
                    $this->_fpdf->Cell(10,6,utf8_decode('U.M.'),'BT',0,'C',1);
                    $this->_fpdf->SetX(147);
                    $this->_fpdf->Cell(20,6,utf8_decode('Cantidad'),'BT',0,'C',1);
                    $this->_fpdf->SetX(167);
                    $this->_fpdf->Cell(20,6,utf8_decode('Precio'),'BT',0,'C',1);
                    $this->_fpdf->SetX(187);
                    $this->_fpdf->Cell(18,6,utf8_decode('SubTotal'),'BT',0,'R',1);
                    //MARGEN TOTAL: HASTA=195 (ULTIMO SETX + ANCHO DE ULTIMO CELL)
                    //UBICACIÓN:
                    $this->_fpdf->SetFont('Courier', '', 11);
                    $this->_fpdf->SetFillColor(255, 255, 255);
                    $this->_fpdf->SetY(29);
                    $this->_fpdf->SetX(15);
                    $this->_fpdf->Cell(30, 5, utf8_decode('Producto :   ' . $productos[$x]['DESCRIPCION'] . '     /   Código:  ' .
                            $productos[$x]['IDPRODUCTO']), '', 0, 'L', 1);
                    $this->_fpdf->SetFont('Courier', '', 9);
                    $this->_fpdf->SetY($Y_table_position);
                    $this->_fpdf->SetX(5);
                    $this->_fpdf->MultiCell(10, 5, $contador[$i], 1);
                    $this->_fpdf->SetY($Y_table_position);
                    $this->_fpdf->SetX(15);
                    $this->_fpdf->MultiCell(22, 5, $c_fecha_venta[$i], 1);
                    $this->_fpdf->SetY($Y_table_position);
                    $this->_fpdf->SetX(37);
                    $this->_fpdf->MultiCell(28, 5, $c_nro_comprobante[$i], 1);
                    $this->_fpdf->SetY($Y_table_position);
                    $this->_fpdf->SetX(65);
                    $this->_fpdf->MultiCell(49, 5, $c_proveedor[$i], 1);
                    /*$this->_fpdf->SetY($Y_table_position);
                    $this->_fpdf->SetX(164);
                    $this->_fpdf->MultiCell(23, 5, $c_documento[$i], 1, 'C');
                     */
                    $this->_fpdf->SetY($Y_table_position);
                    $this->_fpdf->SetX(114);
                    $this->_fpdf->MultiCell(23, 5, $c_ruc[$i], 1, 'C');
                    $this->_fpdf->SetY($Y_table_position);
                    $this->_fpdf->SetX(137);
                    $this->_fpdf->MultiCell(10, 5, $c_abreviatura[$i], 1, 'C');
                    $this->_fpdf->SetY($Y_table_position);
                    $this->_fpdf->SetX(147);
                    $this->_fpdf->MultiCell(20, 5, $c_cantidad[$i], 1, 'R');
                    $this->_fpdf->SetY($Y_table_position);
                    $this->_fpdf->SetX(167);
                    $this->_fpdf->MultiCell(20, 5, $c_precio[$i], 1, 'R');
                    /*(---)*/
                    $this->_fpdf->SetFont('Courier', '', 8);
                    $this->_fpdf->SetY($Y_table_position);
                    $this->_fpdf->SetX(187);
                    $this->_fpdf->MultiCell(18, 5, $c_sub_total[$i], 1, 'R');
                    if($i==$contapag){
                        $this->_fpdf->SetFont('Courier', 'B', 10);
                        $this->_fpdf->SetY((5*$contaobj)+$Y_table_position+2);
                        $this->_fpdf->SetX(105);
                        $this->_fpdf->Cell(18,8,utf8_decode('TOTALES'),'BT',0,'L',1);
                        $this->_fpdf->SetX(123);
                        $this->_fpdf->Cell(44,8,substr(number_format($total_cantidad,3),0,15).' '.$datos[0]['ABREVIATURA'],'BTR',0,'R',1);
                        $this->_fpdf->SetFont('Courier', '', 9);
                        $this->_fpdf->SetX(167);
                        $this->_fpdf->Cell(9,8,utf8_decode('S/.'),'LBT',0,'R',1);
                        $this->_fpdf->SetFont('Courier', 'B', 10);
                        $this->_fpdf->SetX(176);
                        $this->_fpdf->Cell(29,8,substr(number_format($total_sub_total,2),0,13),'BT',0,'R',1);
                    }
                    
                    $abs = $abs + 1;
                }
                $abs = 1;
                $contapag = 1;
            }
        
        $this->_fpdf->Output();
    }
    
    public function compras(){
        $fecha_inicio = $_POST['fecha_inicio'];
        $fecha_fin = $_POST['fecha_fin'];
        if( $fecha_inicio=="" || $fecha_fin==""){
            echo "<script>alert('No se puede generar el reporte debido a datos erroneos o faltantes'); window.close();</script>";
            die();
        }
        $datos = $this->obtener_compras_x_intervalo_fechas(array($fecha_inicio, $fecha_fin));
        $datacount = count($datos);
        
        $Y_table_position = 41;
        $opp = 47;
        $contapag = 1;
        $contaobj = 0;

        for ($i = 0; $i < $datacount; $i++) {
            $contador[$contapag] = $contador[$contapag] . substr((($i+1)*$contapag),0,4)."\n";
            $c_fecha_compra[$contapag] = $c_fecha_compra[$contapag] . substr($datos[0]['FECHA_COMPRA'],8,2).'/'.substr($datos[0]['FECHA_COMPRA'],5,2).
                    '/'.substr($datos[0]['FECHA_COMPRA'],0,4) . "\n";
            if($datos[0]['FECHA']){
                $c_fecha_almacen[$contapag] = $c_fecha_almacen[$contapag] . substr($datos[0]['FECHA'],8,2).'/'.substr($datos[0]['FECHA'],5,2).
                     '/'.substr($datos[0]['FECHA'],0,4) . "\n";
            } else {
                $c_fecha_almacen[$contapag] = $c_fecha_almacen[$contapag] . "NO REGISTR" ."\n";
            }
            $c_nro_comprobante[$contapag] = $c_nro_comprobante[$contapag] .'FC/' . substr($datos[$i]['NRO_COMPROBANTE'], 0, 8) . "\n";
            $c_proveedor[$contapag] = $c_proveedor[$contapag] . substr(utf8_decode($datos[$i]['PROVEEDOR']), 0, 24) . "\n";
            $c_ruc[$contapag] = $c_ruc[$contapag] . substr($datos[$i]['ruc'], 0, 11) . "\n";
            $c_importe[$contapag] = $c_importe[$contapag] . substr(number_format($datos[$i]['IMPORTE'],3),0,9) . "\n";
            /*contar total importe*/$total_importe = $total_importe + $datos[$i]['IMPORTE'];
            $c_igv[$contapag] = $c_igv[$contapag] . substr(number_format($datos[$i]['IGV'],3),0,9) . "\n";
            $c_total[$contapag] = $c_total[$contapag] . substr(number_format($datos[$i]['IMPORTE']+$datos[$i]['IGV'],2),0,10) . "\n";
            /*contar total total*/$total_total = $total_total + $c_total[$contapag];
            $contaobj = $contaobj + 1;
            if ($contaobj == $opp) {
                $contaobj = 0;
                $contapag = $contapag + 1;
            }
        }
        if ($contaobj == 0) {
            $contapag = $contapag - 1;
        }
        for ($i = 1; $i <= $contapag; $i++) {
            $this->_fpdf->AddPage();
                    //ENCABEZADO TITULO DE REPORTE
                    $this->_fpdf->SetFont('Arial','B',12);
                    $this->_fpdf->SetY(24);
                    $this->_fpdf->SetX(0);
                    $this->_fpdf->Cell(210,5, utf8_decode('RESUMEN DE COMPRAS DESDE '.$fecha_inicio.' HASTA '.$fecha_fin),0,0,'C');
                    $this->_fpdf->SetFillColor(232,232,232);
                    $this->_fpdf->SetFont('Courier','B',9);
                    $this->_fpdf->SetY(35);
                    $this->_fpdf->SetX(5);
                    $this->_fpdf->Cell(10,6,utf8_decode('Nro.'),'BT',0,'L',1);
                    $this->_fpdf->SetX(15);
                    $this->_fpdf->Cell(19,6,utf8_decode('Fec.Fact.'),'BT',0,'C',1);
                    $this->_fpdf->SetX(34);
                    $this->_fpdf->Cell(19,6,utf8_decode('Fec.Almc.'),'BT',0,'L',1);
                    $this->_fpdf->SetX(53);
                    $this->_fpdf->Cell(24,6,utf8_decode('Comprobante'),'BT',0,'L',1);
                    $this->_fpdf->SetX(77);
                    $this->_fpdf->Cell(49,6,utf8_decode('Cliente Ref.'),'BT',0,'C',1);
                    $this->_fpdf->SetX(126);
                    $this->_fpdf->Cell(21,6,utf8_decode('U.M.'),'BT',0,'C',1);
                    $this->_fpdf->SetX(147);
                    $this->_fpdf->Cell(20,6,utf8_decode('Importe'),'BT',0,'C',1);
                    $this->_fpdf->SetX(167);
                    $this->_fpdf->Cell(20,6,utf8_decode('IGV'),'BT',0,'C',1);
                    $this->_fpdf->SetX(187);
                    $this->_fpdf->Cell(18,6,utf8_decode('Total'),'BT',0,'R',1);
                    //MARGEN TOTAL: HASTA=195 (ULTIMO SETX + ANCHO DE ULTIMO CELL)
                    $this->_fpdf->SetFillColor(255, 255, 255);
                    $this->_fpdf->SetFont('Courier', '', 8);
                    $this->_fpdf->SetY($Y_table_position);
                    $this->_fpdf->SetX(5);
                    $this->_fpdf->MultiCell(10, 5, $contador[$i], 1);
                    $this->_fpdf->SetY($Y_table_position);
                    $this->_fpdf->SetX(15);
                    $this->_fpdf->MultiCell(19, 5, $c_fecha_compra[$i], 1);
                    $this->_fpdf->SetY($Y_table_position);
                    $this->_fpdf->SetX(34);
                    $this->_fpdf->MultiCell(19, 5, $c_fecha_almacen[$i], 1);
                    $this->_fpdf->SetY($Y_table_position);
                    $this->_fpdf->SetX(53);
                    $this->_fpdf->MultiCell(24, 5, $c_nro_comprobante[$i], 1);
                    $this->_fpdf->SetY($Y_table_position);
                    $this->_fpdf->SetX(77);
                    $this->_fpdf->MultiCell(49, 5, $c_proveedor[$i], 1);
                    $this->_fpdf->SetY($Y_table_position);
                    $this->_fpdf->SetX(126);
                    $this->_fpdf->MultiCell(21, 5, $c_ruc[$i], 1, 'C');
                    $this->_fpdf->SetFont('Courier', '', 7);
                    $this->_fpdf->SetY($Y_table_position);
                    $this->_fpdf->SetX(147);
                    $this->_fpdf->MultiCell(20, 5, $c_importe[$i], 1, 'R');
                    $this->_fpdf->SetY($Y_table_position);
                    $this->_fpdf->SetX(167);
                    $this->_fpdf->MultiCell(20, 5, $c_igv[$i], 1, 'R');
                    /*(---)*/
                    $this->_fpdf->SetY($Y_table_position);
                    $this->_fpdf->SetX(187);
                    $this->_fpdf->MultiCell(18, 5, $c_total[$i], 1, 'R');
                    if($i==$contapag){
                        $this->_fpdf->SetFont('Courier', 'B', 10);
                        $this->_fpdf->SetY((5*$contaobj)+$Y_table_position+2);
                        $this->_fpdf->SetX(105);
                        $this->_fpdf->Cell(18,8,utf8_decode('TOTALES'),'BT',0,'L',1);
                        $this->_fpdf->SetX(123);
                        $this->_fpdf->Cell(44,8,substr(number_format($total_importe,3),0,15).' '.$datos[0]['ABREVIATURA'],'BTR',0,'R',1);
                        $this->_fpdf->SetFont('Courier', '', 9);
                        $this->_fpdf->SetX(167);
                        $this->_fpdf->Cell(9,8,utf8_decode('S/.'),'LBT',0,'R',1);
                        $this->_fpdf->SetFont('Courier', 'B', 10);
                        $this->_fpdf->SetX(176);
                        $this->_fpdf->Cell(29,8,substr(number_format($total_total,2),0,13),'BT',0,'R',1);
                    }
        }
        $this->_fpdf->Output();
    }

    public function ticket_boleta_venta($idventa){
        // DATOS QUE DEBE RECIBIR ESTE REPORTE: IDVENTA
        
        $estadias = $this->obtener_habitaciones_detalle_estadia($idventa);
        $itemsestadia = count($estadias);
        
        $igvdescuento = $this->obtener_descuento_venta($idventa);
        
        $idventa = array($idventa);
        //PRIMERO SE OBTIENE LA CANTIDAD DE ITEMS EN EL DETALLE PARA DETERMINAR EL ALTO DE PAGINA DEL TICKET
        $detalle = $this->obtener_datos_detalle_comprobante_venta($idventa);
        $items = count($detalle);
        // EL TAMAÑO INICIAL, ESDECIR, SIN ITEMS REGISTRADOS, ES DE VALOR: $alto=95;
        
        $ancho_celda_datos = 3.8;
        $alto = 92 + ($ancho_celda_datos*($items+$itemsestadia));
        $ancho = 73;
        $espac = 8;
        $this->_fpdf = new FPDF('P', 'mm', array($ancho, $alto));
        $this->_fpdf->SetAutoPageBreak(false);
        $this->_fpdf->AddPage();
        $this->_fpdf->SetFont('Courier', '', 9);
        $this->_fpdf->SetFillColor(255, 255, 255);
        // <editor-fold defaultstate="collapsed" desc="DATOS DE CABECERA DE EMPRESA Y CLIENTE ABAJO ->">
        $datos = $this->obtener_datos_empresa();

        
        $rep_venta = array('', $datos[0]['REP_VENTA_1'], $datos[0]['REP_VENTA_2'],
            $datos[0]['REP_VENTA_3'], $datos[0]['REP_VENTA_4'],
            $datos[0]['REP_VENTA_5'], $datos[0]['REP_VENTA_6'],
            $datos[0]['REP_VENTA_7']);
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho, $ancho_celda_datos, utf8_decode($rep_venta[1]), 0, 0, 'C', 1);
        $espac = $espac + $ancho_celda_datos;
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho, $ancho_celda_datos, utf8_decode($rep_venta[2]), 0, 0, 'C', 1);
        $espac = $espac + $ancho_celda_datos;
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho, $ancho_celda_datos, utf8_decode($rep_venta[3]), 0, 0, 'C', 1);
        $espac = $espac + $ancho_celda_datos;
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho, $ancho_celda_datos, utf8_decode($rep_venta[4]), 0, 0, 'C', 1);
        $espac = $espac + $ancho_celda_datos;
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho, $ancho_celda_datos, utf8_decode($rep_venta[5]), 0, 0, 'L', 1);
        $espac = $espac + $ancho_celda_datos;


        $datos = $this->obtener_datos_comprobante_venta($idventa);
        $horafecha = array(
            substr($datos[0]['FECHA_VENTA'], 8, 2),
            substr($datos[0]['FECHA_VENTA'], 5, 2),
            substr($datos[0]['FECHA_VENTA'], 0, 4),
            substr($datos[0]['FECHA_VENTA'], 11, 2),
            substr($datos[0]['FECHA_VENTA'], 14, 2),
            substr($datos[0]['FECHA_VENTA'], 17, 2)
        );


        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho, $ancho_celda_datos, utf8_decode('  FECHA:' . $horafecha[0] . '/' . $horafecha[1] . '/' . $horafecha[2] . '    ' .
                        'HORA:' . $horafecha[3] . ':' . $horafecha[4] . ':' . $horafecha[5]), 0, 0, 'L', 1);
        $espac = $espac + $ancho_celda_datos;
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho, $ancho_celda_datos, utf8_decode('  CLIENTE:           ' . $datos[0]['ABREVIATURA'] . '/' .
                        $datos[0]['NRO_DOCUMENTO']), 0, 0, 'L', 1);
        $espac = $espac + $ancho_celda_datos;
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho, $ancho_celda_datos, substr(utf8_decode('  ' . $datos[0]['NOMBRES_CLIENTE'] . ' ' .
                                $datos[0]['APELLIDOS_CLIENTE']), 0, 36), 0, 0, 'L', 1);


        $espac = $espac + $ancho_celda_datos + 2;


        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho, 1, utf8_decode('  ----------------------------------'), 0, 0, 'L', 1);
        $espac = $espac + $ancho_celda_datos - 2;
        $this->_fpdf->SetY($espac - 1);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho, $ancho_celda_datos, utf8_decode('  PRODUCTO                   IMPORTE'), 0, 0, 'L', 1);
        $espac = $espac + $ancho_celda_datos - 1;
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho, 1, utf8_decode('  ----------------------------------'), 0, 0, 'L', 1);
        $espac = $espac + 1; // </editor-fold>


        $sbtotal = 0;
        for($i=0;$i<$itemsestadia;$i++){
            $this->_fpdf->SetY($espac);
            $this->_fpdf->SetX(0);
            /*RESTAR DIAS*/
                    $datetime1 = new DateTime($estadias[$i]['FECHA_INGRESO']);
                    $datetime2 = new DateTime(date('d-m-Y'));
                    $intervalo = $datetime1->diff($datetime2);
                    $diasocupados = $intervalo->format('%d%');
            
            $this->_fpdf->Cell($ancho,$ancho_celda_datos,substr(utf8_decode('  '.$diasocupados.' DIAS HAB'.' '.$estadias[$i]['HABITACION'].' '.
                    $estadias[$i]['TIPO']),0,25),0,0,'L',1);
            $this->_fpdf->SetY($espac);
            $this->_fpdf->SetX(50);
            $this->_fpdf->Cell(10,$ancho_celda_datos,utf8_decode('S/.'),0,0,'L',1);
            //PARSEAR OBJETO NUMERIC HACIA DOUBLE CON 2 DECIMALES
            $prec = number_format($estadias[$i]['COSTO']*$diasocupados, 2);
            $this->_fpdf->SetY($espac);
            $this->_fpdf->SetX(55);
            $this->_fpdf->Cell(15.5,$ancho_celda_datos,utf8_decode(''.$prec),0,0,'R',1);
            //SUMAR LOS VALORES DEL PRECIO PARA OBTENER EL TOTAL:
            $sbtotal = $sbtotal + $prec;
            
            $espac = $espac + $ancho_celda_datos;
        }
        
        for($i=0;$i<$items;$i++){
            $this->_fpdf->SetY($espac);
            $this->_fpdf->SetX(0);
            if($detalle[$i]['IDPAQUETE']==0){//NO ES UN PAQUETE
                $this->_fpdf->Cell($ancho,$ancho_celda_datos,substr(utf8_decode('  '.$detalle[$i]['CANTIDAD'].$detalle[$i]['ABREVIATURA'].' '.
                        $detalle[$i]['DESCRIPCION']),0,25),0,0,'L',1);
            }
            if($detalle[$i]['IDPRODUCTO']==0){
                $this->_fpdf->Cell($ancho,$ancho_celda_datos,substr(utf8_decode('  '.$detalle[$i]['CANTIDAD'].'PQT'.' '.
                        $detalle[$i]['DESCRIPCION']),0,25),0,0,'L',1);
            }
            $this->_fpdf->SetY($espac);
            $this->_fpdf->SetX(50);
            $this->_fpdf->Cell(10,$ancho_celda_datos,utf8_decode('S/.'),0,0,'L',1);
            //PARSEAR OBJETO NUMERIC HACIA DOUBLE CON 2 DECIMALES
            $prec = number_format($detalle[$i]['PRECIO_VENTA']*$detalle[$i]['CANTIDAD'], 2);
            $this->_fpdf->SetY($espac);
            $this->_fpdf->SetX(55);
            $this->_fpdf->Cell(15.5,$ancho_celda_datos,utf8_decode(''.$prec),0,0,'R',1);
            //SUMAR LOS VALORES DEL PRECIO PARA OBTENER EL TOTAL:
            $sbtotal = $sbtotal + $prec;
            
            $espac = $espac + $ancho_celda_datos;
        }
        
        
        
        if($items==0 && $itemsestadia==0){
            $this->_fpdf->SetY($espac+1.2);
            $this->_fpdf->SetX(0);
            $this->_fpdf->Cell($ancho,1,utf8_decode('  >>NO SE REGISTRARON ITEMS'),0,0,'L',1);
            $espac = $espac + $ancho_celda_datos;
        }
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho,1,utf8_decode('  ----------------------------------'),0,0,'L',1);
        $espac = $espac + $ancho_celda_datos;
        
        $espac = $espac - 3;
        //IGV (CERO POR DEFECTO Y SIEMPRE)
        
         $igv = $igvdescuento[0]['IGV'];
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho,$ancho_celda_datos,utf8_decode('          *    V.VENTA  S/.'),0,0,'L',1);
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(55);
        $this->_fpdf->Cell(15.5,$ancho_celda_datos,utf8_decode(''.  number_format($sbtotal, 2)),0,0,'R',1);
        $espac = $espac + $ancho_celda_datos;
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho,$ancho_celda_datos,utf8_decode("          **   IGV(".  number_format($igv*100, 0)."%) S/."),0,0,'L',1);
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(55);
        //CALCULAR TOTAL SUMADO EL IGV:
        
        
        $this->_fpdf->Cell(15.5,$ancho_celda_datos,utf8_decode(''.  number_format(($igvdescuento[0]['IGV']*$sbtotal), 2)),0,0,'R',1);
        $espac = $espac + $ancho_celda_datos;
        $sbtotal = $sbtotal + ($igvdescuento[0]['IGV']*$sbtotal);
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho,$ancho_celda_datos,utf8_decode('          ***  DSCTO.   S/.'),0,0,'L',1);
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(55);
        $this->_fpdf->Cell(15.5,$ancho_celda_datos,utf8_decode(''.  number_format($igvdescuento[0]['DESCUENTO'], 2)),0,0,'R',1);
        $total = $sbtotal - $igvdescuento[0]['DESCUENTO'];
        $espac = $espac + $ancho_celda_datos;
        
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho,$ancho_celda_datos,utf8_decode('          **** TOTAL    S/.'),0,0,'L',1);
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(55);
        $this->_fpdf->Cell(15.5,$ancho_celda_datos,utf8_decode(''.  number_format($total, 2)),0,0,'R',1);
        $espac = $espac + $ancho_celda_datos;
        
        $espac = $espac + $ancho_celda_datos - 3;
        //necesito: vendedor, items, condicion (contado, credito), campo obsrevaciones (si estado = 0: observacion = anulado)
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho,$ancho_celda_datos,utf8_decode(' ITEMS: '.($items+$itemsestadia)),0,0,'L',1);
        $espac = $espac + $ancho_celda_datos;
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho,$ancho_celda_datos,substr(utf8_decode(' VENDEDOR: '.$datos[0]['IDEMPLEADO'].'/'.$datos[0]['NOMBRES_EMPLEADO'].' '.
                $datos[0]['APELLIDOS_EMPLEADO']),0,36),0,0,'L',1);
        $espac = $espac + $ancho_celda_datos;
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        /*DETERMINAR EL TIPO DE TRANSACCION*/
        if($datos[0]['IDTIPO_TRANSACCION']==1){
            $datos[0]['IDTIPO_TRANSACCION']='CONTADO';
        } else{
            if($datos[0]['ESTADO_PAGO']==0){
                $datos[0]['IDTIPO_TRANSACCION']='CREDITO, * SIN PAGAR *';
            } else{
                $datos[0]['IDTIPO_TRANSACCION']='CREDITO, * CANCELADO *';
            }
            
        }
        $this->_fpdf->Cell($ancho,$ancho_celda_datos,substr(utf8_decode(' CONDICION: '.$datos[0]['IDTIPO_TRANSACCION']),0,36),0,0,'L',1);
        $espac = $espac + $ancho_celda_datos;
        /*DETERMINAR LA OBSERVACION O SI ESTUVIERA VENTA ANULADA*/
        if($datos[0]['ESTADO']==0){
            $this->_fpdf->SetY($espac);
            $this->_fpdf->SetX(0);
            $this->_fpdf->Cell($ancho,$ancho_celda_datos,substr(utf8_decode('*** ANULADO ***'),0,36),0,0,'L',1);
            $espac = $espac + $ancho_celda_datos;
        }
        
        $espac = $espac + 3;
        
        //PIE DE PÁGINA
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho,$ancho_celda_datos,utf8_decode($rep_venta[6]),0,0,'C',1);
        $espac = $espac + $ancho_celda_datos;
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho,$ancho_celda_datos,utf8_decode($rep_venta[7]),0,0,'C',1);
        $espac = $espac + $ancho_celda_datos;
        
        $this->_fpdf->Output();
    }
    
    public function ticket_factura_venta($idventa){
        $estadias = $this->obtener_habitaciones_detalle_estadia($idventa);
        $itemsestadia = count($estadias);
        
        $igvdescuento = $this->obtener_descuento_venta($idventa);
        // DATOS QUE DEBE RECIBIR ESTE REPORTE: IDVENTA 
        $idventa = array($idventa);
        
        //PRIMERO SE OBTIENE LA CANTIDAD DE ITEMS EN EL DETALLE PARA DETERMINAR EL ALTO DE PAGINA DEL TICKET
        $detalle = $this->obtener_datos_detalle_comprobante_venta($idventa);
        $items = count($detalle);
        // EL TAMAÑO INICIAL, ESDECIR, SIN ITEMS REGISTRADOS, ES DE VALOR: $alto=112;
        
        $ancho_celda_datos = 3.8;
        $alto = 112 + ($ancho_celda_datos*($items+$itemsestadia));
        $ancho = 73;
        $espac = 8;
        $this->_fpdf = new FPDF('P', 'mm', array($ancho, $alto));
        $this->_fpdf->SetAutoPageBreak(false);
        $this->_fpdf->AddPage();
        $this->_fpdf->SetFont('Courier', '', 9);
        $this->_fpdf->SetFillColor(255, 255, 255);
        $datos = $this->obtener_datos_empresa();
        $rep_venta = array('',$datos[0]['REP_VENTA_1'], $datos[0]['REP_VENTA_2'],
            $datos[0]['REP_VENTA_3'],$datos[0]['REP_VENTA_4'],
            $datos[0]['REP_VENTA_5'],$datos[0]['REP_VENTA_6'],
            $datos[0]['REP_VENTA_7']);
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho,$ancho_celda_datos,utf8_decode($rep_venta[1]),0,0,'C',1);
        $espac = $espac + $ancho_celda_datos;
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho,$ancho_celda_datos,utf8_decode($rep_venta[2]),0,0,'C',1);
        $espac = $espac + $ancho_celda_datos;
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho,$ancho_celda_datos,utf8_decode($rep_venta[3]),0,0,'C',1);
        $espac = $espac + $ancho_celda_datos;
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho,$ancho_celda_datos,utf8_decode($rep_venta[4]),0,0,'C',1);
        $espac = $espac + $ancho_celda_datos;
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho,$ancho_celda_datos,utf8_decode($rep_venta[5]),0,0,'L',1);
        $espac = $espac + $ancho_celda_datos;
        
        $datos = $this->obtener_datos_comprobante_venta($idventa);
        $horafecha = array(
            substr($datos[0]['FECHA_VENTA'],8,2),
            substr($datos[0]['FECHA_VENTA'],5,2),
            substr($datos[0]['FECHA_VENTA'],0,4),
            substr($datos[0]['FECHA_VENTA'],11,2),
            substr($datos[0]['FECHA_VENTA'],14,2),
            substr($datos[0]['FECHA_VENTA'],17,2)
            );
        
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho,$ancho_celda_datos,utf8_decode('  FECHA:'.$horafecha[0].'/'.$horafecha[1].'/'.$horafecha[2].'    '.'HORA:'.
                $horafecha[3].':'.$horafecha[4].':'.$horafecha[5]),0,0,'L',1);
        $espac = $espac + $ancho_celda_datos;
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho,$ancho_celda_datos,utf8_decode('*** TICKET FACTURA ***'),0,0,'C',1);
        $espac = $espac + $ancho_celda_datos;
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        //$this->_fpdf->Cell($ancho,$ancho_celda_datos,utf8_decode('  CLIENTE:           '.$datos[0]['abreviatura'].'/'.$datos[0]['serie'].'-'.$datos[0]['nro_documento']),0,0,'L',1);
        $this->_fpdf->Cell($ancho,$ancho_celda_datos,utf8_decode($datos[0]['ABREVIATURA'].'/'.$datos[0]['NRO_DOCUMENTO']),0,0,'C',1);
        $espac = $espac + $ancho_celda_datos + 2;
        
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho,1,utf8_decode('  ----------------------------------'),0,0,'L',1);
        $espac = $espac + $ancho_celda_datos-2;
        $this->_fpdf->SetY($espac-1);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho,$ancho_celda_datos,utf8_decode('  PRODUCTO                   IMPORTE'),0,0,'L',1);
        $espac = $espac + $ancho_celda_datos-1;
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho,1,utf8_decode('  ----------------------------------'),0,0,'L',1);
        $espac = $espac  + 1;
        
        $sbtotal = 0;
        for($i=0;$i<$itemsestadia;$i++){
            $this->_fpdf->SetY($espac);
            $this->_fpdf->SetX(0);
            /*RESTAR DIAS*/
                    $datetime1 = new DateTime($estadias[$i]['FECHA_INGRESO']);
                    $datetime2 = new DateTime(date('d-m-Y'));
                    $intervalo = $datetime1->diff($datetime2);
                    $diasocupados = $intervalo->format('%d%');
            
            $this->_fpdf->Cell($ancho,$ancho_celda_datos,substr(utf8_decode('  '.$diasocupados.' DIAS HAB'.' '.$estadias[$i]['HABITACION'].' '.
                    $estadias[$i]['TIPO']),0,25),0,0,'L',1);
            $this->_fpdf->SetY($espac);
            $this->_fpdf->SetX(50);
            $this->_fpdf->Cell(10,$ancho_celda_datos,utf8_decode('S/.'),0,0,'L',1);
            //PARSEAR OBJETO NUMERIC HACIA DOUBLE CON 2 DECIMALES
            $prec = number_format($estadias[$i]['COSTO']*$diasocupados, 2);
            $this->_fpdf->SetY($espac);
            $this->_fpdf->SetX(55);
            $this->_fpdf->Cell(15.5,$ancho_celda_datos,utf8_decode(''.$prec),0,0,'R',1);
            //SUMAR LOS VALORES DEL PRECIO PARA OBTENER EL TOTAL:
            $sbtotal = $sbtotal + $prec;
            
            $espac = $espac + $ancho_celda_datos;
        }
        
        for($i=0;$i<$items;$i++){
            $this->_fpdf->SetY($espac);
            $this->_fpdf->SetX(0);
            if($detalle[$i]['IDPAQUETE']==0){//NO ES UN PAQUETE
                $this->_fpdf->Cell($ancho,$ancho_celda_datos,substr(utf8_decode('  '.$detalle[$i]['CANTIDAD'].$detalle[$i]['ABREVIATURA'].' '.
                        $detalle[$i]['DESCRIPCION']),0,25),0,0,'L',1);
            }
            if($detalle[$i]['IDPRODUCTO']==0){
                $this->_fpdf->Cell($ancho,$ancho_celda_datos,substr(utf8_decode('  '.$detalle[$i]['CANTIDAD'].'PQT'.' '.
                        $detalle[$i]['DESCRIPCION']),0,25),0,0,'L',1);
            }
            $this->_fpdf->SetY($espac);
            $this->_fpdf->SetX(50);
            $this->_fpdf->Cell(10,$ancho_celda_datos,utf8_decode('S/.'),0,0,'L',1);
            //PARSEAR OBJETO NUMERIC HACIA DOUBLE CON 2 DECIMALES
            $prec = number_format($detalle[$i]['PRECIO_VENTA']*$detalle[$i]['CANTIDAD'], 2);
            $this->_fpdf->SetY($espac);
            $this->_fpdf->SetX(55);
            $this->_fpdf->Cell(15.5,$ancho_celda_datos,utf8_decode(''.$prec),0,0,'R',1);
            //SUMAR LOS VALORES DEL PRECIO PARA OBTENER EL TOTAL:
            $sbtotal = $sbtotal + $prec;
            
            $espac = $espac + $ancho_celda_datos;
        }
        
        if($items==0 && $itemsestadia==0){
            $this->_fpdf->SetY($espac+1.2);
            $this->_fpdf->SetX(0);
            $this->_fpdf->Cell($ancho,1,utf8_decode('  >>NO SE REGISTRARON ITEMS'),0,0,'L',1);
            $espac = $espac + $ancho_celda_datos;
        }
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho,1,utf8_decode('  ----------------------------------'),0,0,'L',1);
        $espac = $espac + $ancho_celda_datos;
        
        $espac = $espac - 3;
        //IGV (CERO POR DEFECTO Y SIEMPRE)
        $igv = $igvdescuento[0]['IGV'];
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho,$ancho_celda_datos,utf8_decode('          *    V.VENTA  S/.'),0,0,'L',1);
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(55);
        $this->_fpdf->Cell(15.5,$ancho_celda_datos,utf8_decode(''.  number_format($sbtotal, 2)),0,0,'R',1);
        $espac = $espac + $ancho_celda_datos;
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho,$ancho_celda_datos,utf8_decode("          **   IGV(".  number_format($igv*100, 0)."%) S/."),0,0,'L',1);
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(55);
        //CALCULAR TOTAL SUMADO EL IGV:
        
        
        $this->_fpdf->Cell(15.5,$ancho_celda_datos,utf8_decode(''.  number_format(($igvdescuento[0]['IGV']*$sbtotal), 2)),0,0,'R',1);
        $espac = $espac + $ancho_celda_datos;
        $sbtotal = $sbtotal + ($igvdescuento[0]['IGV']*$sbtotal);
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho,$ancho_celda_datos,utf8_decode('          ***  DSCTO.   S/.'),0,0,'L',1);
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(55);
        $this->_fpdf->Cell(15.5,$ancho_celda_datos,utf8_decode(''.  number_format($igvdescuento[0]['DESCUENTO'], 2)),0,0,'R',1);
        $total = $sbtotal - $igvdescuento[0]['DESCUENTO'];
        $espac = $espac + $ancho_celda_datos;
        
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho,$ancho_celda_datos,utf8_decode('          **** TOTAL    S/.'),0,0,'L',1);
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(55);
        $this->_fpdf->Cell(15.5,$ancho_celda_datos,utf8_decode(''.  number_format($total, 2)),0,0,'R',1);
        $espac = $espac + $ancho_celda_datos;
        
        $espac = $espac + $ancho_celda_datos - 3;
        //necesito: vendedor, items, condicion (contado, credito), campo obsrevaciones (si estado = 0: observacion = anulado)
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho,$ancho_celda_datos,utf8_decode(' ITEMS: '.($items+$itemsestadia)),0,0,'L',1);
        $espac = $espac + $ancho_celda_datos;
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho,$ancho_celda_datos,substr(utf8_decode(' RAZON SOCIAL: '),0,36),0,0,'L',1);
        $espac = $espac + $ancho_celda_datos;
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho,$ancho_celda_datos,substr(utf8_decode(' '.$datos[0]['NOMBRES_CLIENTE']),0,36),0,0,'L',1);
        $espac = $espac + $ancho_celda_datos;
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho,$ancho_celda_datos,substr(utf8_decode(' DIRECCION: '),0,36),0,0,'L',1);
        $espac = $espac + $ancho_celda_datos;
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho,$ancho_celda_datos,substr(utf8_decode(' '.$datos[0]['DIRECCION_CLIENTE']),0,36),0,0,'L',1);
        $espac = $espac + $ancho_celda_datos;
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho,$ancho_celda_datos,substr(utf8_decode(' RUC: '.$datos[0]['DOCUMENTO']),0,36),0,0,'L',1);
        $espac = $espac + $ancho_celda_datos;
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho,$ancho_celda_datos,substr(utf8_decode(' VENDEDOR: '.$datos[0]['IDEMPLEADO'].'/'.$datos[0]['NOMBRES_EMPLEADO'].' '.
                $datos[0]['APELLIDOS_EMPLEADO']),0,36),0,0,'L',1);
        $espac = $espac + $ancho_celda_datos;
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        /*DETERMINAR EL TIPO DE TRANSACCION*/
        if($datos[0]['IDTIPO_TRANSACCION']==1){
            $datos[0]['IDTIPO_TRANSACCION']='CONTADO';
        } else{
            if($datos[0]['ESTADO_PAGO']==0){
                $datos[0]['IDTIPO_TRANSACCION']='CREDITO, * SIN PAGAR *';
            } else{
                $datos[0]['IDTIPO_TRANSACCION']='CREDITO, * CANCELADO *';
            }
            
        }
        $this->_fpdf->Cell($ancho,$ancho_celda_datos,substr(utf8_decode(' CONDICION: '.$datos[0]['IDTIPO_TRANSACCION']),0,36),0,0,'L',1);
        $espac = $espac + $ancho_celda_datos;
        /*DETERMINAR LA OBSERVACION O SI ESTUVIERA VENTA ANULADA*/
        if($datos[0]['ESTADO'] == 0){
            $this->_fpdf->SetY($espac);
            $this->_fpdf->SetX(0);
            $this->_fpdf->Cell($ancho,$ancho_celda_datos,substr(utf8_decode('*** ANULADO ***'),0,36),0,0,'C',1);
            $espac = $espac + $ancho_celda_datos;
        }
        
        $espac = $espac + 3;
        
        //PIE DE PÁGINA
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho,$ancho_celda_datos,utf8_decode($rep_venta[6]),0,0,'C',1);
        $espac = $espac + $ancho_celda_datos;
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho,$ancho_celda_datos,utf8_decode($rep_venta[7]),0,0,'C',1);
        $espac = $espac + $ancho_celda_datos;
        
        $this->_fpdf->Output();
    }
    
    public function detalle_estadia($idventa){
        // DATOS QUE DEBE RECIBIR ESTE REPORTE: IDVENTA 
        $datos = $this->obtener_detalle_estadia_x_huesped($idventa);
        $datacount = count($datos);
        
        $idventa = array($idventa);
        //PRIMERO SE OBTIENE LA CANTIDAD DE ITEMS EN EL DETALLE PARA DETERMINAR EL ALTO DE PAGINA DEL TICKET
        //$detalle = $this->obtener_datos_detalle_comprobante_venta($idventa);
        //$items = count($detalle);
        // EL TAMAÑO INICIAL, ESDECIR, SIN ITEMS REGISTRADOS, ES DE VALOR: $alto=112;
        
        $ancho_celda_datos = 5;
        $alto = 122;
        $ancho = 182;
        $espac = 8;
        $this->_fpdf = new FPDF('L', 'mm', array($ancho, $alto));
        $this->_fpdf->SetAutoPageBreak(false);
        
        for($i = 0; $i<$datacount;$i++){
            $this->_fpdf->AddPage();

            //$this->_fpdf->Image(ROOT . 'vista' . DS . 'reportes' . DS . 'img' . DS . '7.png', 0, 0, 182, 120, 'PNG');
            $this->_fpdf->SetFillColor(255, 255, 255);

            $this->_fpdf->SetY(0);
            $this->_fpdf->SetX(0);
            $this->_fpdf->Cell(182, 120,"", 0, 0, "", 1);


            $this->_fpdf->Image(ROOT . 'vista' . DS . 'reportes' . DS . 'img' . DS . 'log.png', 5, 5, 47.008, 11.196, 'PNG');

            $this->_fpdf->SetFont('Arial', '', 7);
            //LLEGADA ARRIVAL
            $this->_fpdf->SetY(18);
            $this->_fpdf->SetX(56);
            $this->_fpdf->MultiCell(9,$ancho_celda_datos/2,"Fecha\nDate",'0',0,'L',0);
            $this->_fpdf->SetY(18);
            $this->_fpdf->SetX(93);
            $this->_fpdf->MultiCell(17,$ancho_celda_datos/2,"Procedencia\nComing From",'0',0,'L',0);
            $this->_fpdf->SetY(18);
            $this->_fpdf->SetX(141.5);
            $this->_fpdf->MultiCell(18,$ancho_celda_datos/2,"Hora llegada\nTime Arrival",'0',0,'L',0);
            //TITULOS
            $this->_fpdf->SetFont('Arial', 'B', 13);
            $this->_fpdf->SetY(5.5);
            $this->_fpdf->SetX(100);
            $this->_fpdf->Cell(36,$ancho_celda_datos,  utf8_decode("INGRESO"),'0',0,'C',0);
            $this->_fpdf->SetFont('Arial', 'BU', 9);
            $this->_fpdf->SetY(13);
            $this->_fpdf->SetX(100);
            $this->_fpdf->Cell(36,$ancho_celda_datos,  utf8_decode("LLEGADA / ARRIVAL"),'0',0,'C',0);
            $this->_fpdf->SetY(24.5);
            $this->_fpdf->SetX(100);
            $this->_fpdf->Cell(36,$ancho_celda_datos,  utf8_decode("SALIDA / DEPARTURE"),'0',0,'C',0);
            $this->_fpdf->SetY(35.6);
            $this->_fpdf->SetX(71.3);
            $this->_fpdf->Cell(36,$ancho_celda_datos,  utf8_decode("HOSPEDAJE / LODGING"),'0',0,'C',0);

            //SALIDA DEPARTURE
            $this->_fpdf->SetFont('Arial', '', 7);

            $this->_fpdf->SetY(29.3);
            $this->_fpdf->SetX(56);
            $this->_fpdf->MultiCell(9,$ancho_celda_datos/2,"Fecha\nDate",'0',0,'L',0);
            $this->_fpdf->SetY(29.3);
            $this->_fpdf->SetX(93);
            $this->_fpdf->MultiCell(17,$ancho_celda_datos/2,"Destino\nDestination",'0',0,'L',0);
            $this->_fpdf->SetY(29.3);
            $this->_fpdf->SetX(139.5);
            $this->_fpdf->MultiCell(20,$ancho_celda_datos/2,"Hora partida\nTime Departure",'0',0,'L',0);
            //HOSPEDAJE LODGING
            $this->_fpdf->SetY(40.6);
            $this->_fpdf->SetX(37);
            $this->_fpdf->MultiCell(18,$ancho_celda_datos/2, utf8_decode('Habitación(es)')."\n".utf8_decode('Room(s)'),'0',0,'L',0);
            $this->_fpdf->SetY(40.6);
            $this->_fpdf->SetX(88.8);
            $this->_fpdf->MultiCell(18,$ancho_celda_datos/2, "Tarifa\nTariff",'0',0,'L',0);
            $this->_fpdf->SetY(48);
            $this->_fpdf->SetX(0);
            $this->_fpdf->Cell($ancho,$ancho_celda_datos/2, "--------------------------------------------------------------------------------------------".
                    "--------------------------------------------------------------------------------------------------------------------",'0',0,'C',0);
            //DATOS
            $this->_fpdf->SetY(51.6);
            $this->_fpdf->SetX(2);
            $this->_fpdf->MultiCell(14,$ancho_celda_datos/2, "Nombre\nName",'0',0,'L',0);
            $this->_fpdf->SetY(51.6);
            $this->_fpdf->SetX(104);
            $this->_fpdf->MultiCell(14,$ancho_celda_datos/2, "Edad\nAge",'0',0,'L',0);
            $this->_fpdf->SetY(51.6);
            $this->_fpdf->SetX(134);
            $this->_fpdf->MultiCell(17,$ancho_celda_datos/2, "FechaNacim.\nDateOfBirth",'0',0,'L',0);
            $this->_fpdf->SetY(60.2);
            $this->_fpdf->SetX(2);
            $this->_fpdf->MultiCell(14,$ancho_celda_datos/2, "Domicilio\nAddress",'0',0,'L',0);
            $this->_fpdf->SetY(60.2);
            $this->_fpdf->SetX(109.4);
            $this->_fpdf->MultiCell(14,$ancho_celda_datos/2, utf8_decode("Teléfonos")."\n".("Phones"),'0',0,'L',0);
            $this->_fpdf->SetY(70.4);
            $this->_fpdf->SetX(1.9);
            $this->_fpdf->MultiCell(23,$ancho_celda_datos/2, utf8_decode("Correo Electrónico")."\n".utf8_decode("e-mail"),'0',0,'L',0);
            $this->_fpdf->SetY(80.5);
            $this->_fpdf->SetX(1);
            $this->_fpdf->MultiCell(15,$ancho_celda_datos/2, utf8_decode("Profesión")."\n".utf8_decode("Ocupación"),'0',0,'L',0);
            $this->_fpdf->SetY(80.5);
            $this->_fpdf->SetX(56);
            $this->_fpdf->MultiCell(20,$ancho_celda_datos/2, utf8_decode("Estado Civil")."\n".utf8_decode("Marital Status"),'0',0,'L',0);
            $this->_fpdf->SetFont('Arial', '', 6);
            $this->_fpdf->SetY(80.5);
            $this->_fpdf->SetX(95);
            $this->_fpdf->MultiCell(17,$ancho_celda_datos/2, utf8_decode("Nacionalidad")."\n".utf8_decode("Nacionality"),'0',0,'L',0);
            $this->_fpdf->SetY(80.5);
            $this->_fpdf->SetX(132);
            $this->_fpdf->MultiCell(18,$ancho_celda_datos/2, utf8_decode("Doc.Identidad")."\n".utf8_decode("Id.Card"),'0',0,'L',0);
            $this->_fpdf->SetFont('Arial', '', 7);
            $this->_fpdf->SetY(87);
            $this->_fpdf->SetX(0);
            $this->_fpdf->Cell($ancho,$ancho_celda_datos/2, "--------------------------------------------------------------------------------------------".
                    "--------------------------------------------------------------------------------------------------------------------",'0',0,'C',0);
            $this->_fpdf->SetY(98);
            $this->_fpdf->SetX(0);
            $this->_fpdf->Cell($ancho,$ancho_celda_datos/2, "--------------------------------------------------------------------------------------------".
                    "--------------------------------------------------------------------------------------------------------------------",'0',0,'C',0);
            $this->_fpdf->SetY(101);
            $this->_fpdf->SetX(0);
            $this->_fpdf->MultiCell($ancho,$ancho_celda_datos/2, utf8_decode("PARA SU CONVENIENCIA Y PROTECCIÓN, FAVOR DEPOSITAR SUS VALORES EN LAS CAJAS DE SEGURIDAD UBICADAS EN RECEPCIÓN")."\n". 
            utf8_decode("EL ALBERGUE NO SE RESPONSABILIZA POR PÉRDIDAS EN LAS HABITACIONES U OTRAS DEPENDENCIAS")."\n"."\n".
            utf8_decode("FOR YOUR CONVENIENCE AND PROTECTION, PLEASE DEPOSIT YOUR VALUES IN THE LOCATED BOXES OF SECURITY IN RECEPTION")."\n".
                    utf8_decode("THE HOTEL DOESN'T TAKE THE RESPONSABILITY HAD LOST IN THE ROOMS OR OTHER DEPENDENCES"),0,'C',0);
            $this->_fpdf->SetFont('Arial', '', 7);
            $this->_fpdf->SetY(114.5);
            $this->_fpdf->SetX(0);
            $this->_fpdf->MultiCell($ancho,$ancho_celda_datos/2, utf8_decode("Este documento constituye el contrado de hospedaje reglamentado por D.S. 006 73 IC/DS de 29-3-73")."\n".
                    utf8_decode("This document constitutes the Contract of Lodging regulation for D.S 006 79 IC/DS de 29-3-73"),0,'C',0);

            $this->_fpdf->SetFont('Arial', '', 9);
            
            //LLEGADA ARRIVAL
            $horafecha = array(
                substr($datos[$i]['FECHA_INGRESO'], 8, 2),
                substr($datos[$i]['FECHA_INGRESO'], 5, 2),
                substr($datos[$i]['FECHA_INGRESO'], 0, 4),
                substr($datos[$i]['FECHA_INGRESO'], 11, 2),
                substr($datos[$i]['FECHA_INGRESO'], 14, 2),
                substr($datos[$i]['FECHA_INGRESO'], 17, 2)
            );
            $this->_fpdf->SetY(18.2);
            $this->_fpdf->SetX(65);
            $this->_fpdf->Cell(18,$ancho_celda_datos,utf8_decode($horafecha[0] . '/' . $horafecha[1] . '/' . $horafecha[2]),'1',0,'C',0);
            $this->_fpdf->SetY(18.2);
            $this->_fpdf->SetX(110.1);
            $this->_fpdf->Cell(22,$ancho_celda_datos, substr(utf8_decode($datos[$i]['PROCEDENCIA']),0,12),'1',0,'C',0);
            $this->_fpdf->SetY(18.2);
            $this->_fpdf->SetX(159.6);
            $this->_fpdf->Cell(18,$ancho_celda_datos,utf8_decode($horafecha[3] . ':' . $horafecha[4]),'1',0,'C',0);
            //SALIDA DEPARTURE
            $horafecha = array(
                substr($datos[$i]['FECHA_SALIDA'], 8, 2),
                substr($datos[$i]['FECHA_SALIDA'], 5, 2),
                substr($datos[$i]['FECHA_SALIDA'], 0, 4),
                substr($datos[$i]['FECHA_SALIDA'], 11, 2),
                substr($datos[$i]['FECHA_SALIDA'], 14, 2),
                substr($datos[$i]['FECHA_SALIDA'], 17, 2)
            );
            $this->_fpdf->SetY(29.5);
            $this->_fpdf->SetX(65);
            $this->_fpdf->Cell(18,$ancho_celda_datos,utf8_decode($horafecha[0] . '/' . $horafecha[1] . '/' . $horafecha[2]),'1',0,'C',0);
            $this->_fpdf->SetY(29.5);
            $this->_fpdf->SetX(110.1);
            $this->_fpdf->Cell(22,$ancho_celda_datos, substr(utf8_decode($datos[$i]['DESTINO']),0,12),'1',0,'C',0);
            $this->_fpdf->SetY(29.5);
            $this->_fpdf->SetX(159.6);
            $this->_fpdf->Cell(18,$ancho_celda_datos,utf8_decode($horafecha[3] . ':' . $horafecha[4]),'1',0,'C',0);
            //HOSPEDAJE LODGING
            $this->_fpdf->SetY(40.8);
            $this->_fpdf->SetX(54.8);
            $this->_fpdf->Cell(41,$ancho_celda_datos,utf8_decode($datos[$i]['NRO_HABITACION']),'1',0,'C',0);
            $this->_fpdf->SetY(40.8);
            $this->_fpdf->SetX(106.8);
            $this->_fpdf->Cell(41,$ancho_celda_datos, substr(utf8_decode(number_format($datos[$i]['COSTO'], 2)),0,27),'1',0,'C',0);
            //DATOS
            $this->_fpdf->SetY(51.6);
            $this->_fpdf->SetX(16.1);
            $this->_fpdf->Cell(90,$ancho_celda_datos,substr(utf8_decode($datos[$i]['NOMBRES_APELLIDOS']),0,60),'1',0,'L',0);
            $horafecha = array(
                substr($datos[$i]['FECHA_NACIMIENTO'], 8, 2),
                substr($datos[$i]['FECHA_NACIMIENTO'], 5, 2),
                substr($datos[$i]['FECHA_NACIMIENTO'], 0, 4),
                substr($datos[$i]['FECHA_NACIMIENTO'], 11, 2),
                substr($datos[$i]['FECHA_NACIMIENTO'], 14, 2),
                substr($datos[$i]['FECHA_NACIMIENTO'], 17, 2)
            );
            $datetime2 = date('Y');
            $this->_fpdf->SetY(51.6);
            $this->_fpdf->SetX(118);
            $this->_fpdf->Cell(14.4,$ancho_celda_datos,substr(utf8_decode($datetime2 - $horafecha[2]),0,60),'1',0,'C',0);
            $this->_fpdf->SetY(51.6);
            $this->_fpdf->SetX(151);
            $this->_fpdf->Cell(24.3,$ancho_celda_datos,substr(utf8_decode($horafecha[0] . '/' . $horafecha[1] . '/' . $horafecha[2]),0,60),'1',0,'C',0);
            $this->_fpdf->SetY(60.2);
            $this->_fpdf->SetX(16.1);
            $this->_fpdf->Cell(90,$ancho_celda_datos, substr(utf8_decode($datos[$i]['DIRECCION']),0,60),'1',0,'L',0);
            $this->_fpdf->SetY(60.2);
            $this->_fpdf->SetX(123.4);
            $this->_fpdf->Cell(51.9,$ancho_celda_datos, substr(utf8_decode($datos[$i]['TELEFONO']),0,60),'1',0,'L',0);
            $this->_fpdf->SetY(70.4);
            $this->_fpdf->SetX(24.9);
            $this->_fpdf->Cell(150.4,$ancho_celda_datos, substr(utf8_decode($datos[$i]['EMAIL']),0,75),'1',0,'L',0);
            $this->_fpdf->SetY(80.5);
            $this->_fpdf->SetX(16.1);
            $this->_fpdf->Cell(43,$ancho_celda_datos, substr(utf8_decode($datos[$i]['XPROFESION']),0,25),'1',0,'L',0);
            $this->_fpdf->SetY(80.5);
            $this->_fpdf->SetX(76);
            $this->_fpdf->Cell(21,$ancho_celda_datos, substr(utf8_decode($datos[$i]['ESTADO_CIVIL']),0,14),'1',0,'L',0);
            $this->_fpdf->SetY(80.5);
            $this->_fpdf->SetX(111.4);
            $this->_fpdf->Cell(22,$ancho_celda_datos, substr(utf8_decode($datos[$i]['XPAIS']),0,10),'1',0,'L',0);
            $this->_fpdf->SetY(80.5);
            $this->_fpdf->SetX(150.3);
            $this->_fpdf->Cell(25,$ancho_celda_datos, substr(utf8_decode($datos[$i]['DOCUMENTO']),0,11),'1',0,'C',0);

            $this->_fpdf->SetFont('Arial', '', 7);        
            $this->_fpdf->SetY(95);
            $this->_fpdf->SetX(0);
            $this->_fpdf->Cell($ancho,$ancho_celda_datos, substr(utf8_decode('FIRMA'),0,11),'0',0,'C',0);
            $this->_fpdf->SetY(19);
            $this->_fpdf->SetX(0);
            $this->_fpdf->MultiCell(60,$ancho_celda_datos-2.4,utf8_decode('Psje. Abelardo Ramírez 263')."\n".
                    utf8_decode('La Banda de Shilcayo - San Martín')."\n".utf8_decode('e-mail: lajungla_convenciones@hotmail.com')."\n".
                    utf8_decode('fb.com/lajungla.tarapoto'),0,'C',0);
            $this->_fpdf->SetFont('Arial', '', 6);        
            $this->_fpdf->SetY(31);
            $this->_fpdf->SetX(0);
            $this->_fpdf->MultiCell(60,$ancho_celda_datos-2.4,utf8_decode('Cómodas habitaciones con agua caliente,')."\n".
                    utf8_decode('circuito cerrado, frigobar, bebidas exóticas, piscina, restaurante, sauna, telefono y fax.'),0,'C',0);

        
        
        
        }
        $this->_fpdf->Output();
        
    }
}

?>
