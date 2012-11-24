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
        $this->_fpdf = new FPDF();
        $this->_reportes = $this->cargar_modelo('reportes');
    }

    public function index() {
        $this->_vista->renderizar('index');
    }
    
    public function obtener_stock_por_ubicacion($ubicacion) {
        $datos = $this->_reportes->selecciona_stock_total($ubicacion);
        $cabeceras = array('idproducto', 'descripcion', 'precio_unitario', 'observaciones', 'servicio', 'tipo_producto', 'unidad_medida', 'idubicacion', 'ubicacion', 'almacen', 'promocion', 'stock', 'precio_compra');
        $datos = $this->get_matriz($datos, $cabeceras);
        return $datos;
    }
    
    public function obtener_ubicaciones() {
        $datos = $this->_reportes->selecciona_ubicaciones();
        $cabeceras = array('idubicacion', 'descripcion');
        $datos = $this->get_matriz($datos, $cabeceras);
        return $datos;
    }

    public function obtener_datos_empresa() {
        $datos =$this->_reportes->selecciona_datos_empresa();
        $cabeceras = array ('razon_social','ruc','nombre_comercial',
            'clase','categoria','numero_certificado',
            'direccion','telefono','fax','region',
            'provincia','distrito','pagina_web',
            'e_mail','rep_venta_1','rep_venta_2','rep_venta_3','rep_venta_4','rep_venta_5','rep_venta_6','rep_venta_7');
        $datos = $this->get_matriz($datos, $cabeceras);
        return $datos;
    }
    
    public function obtener_numero_arribos_x_tipo_habitacion($mesano) {
        $datos =$this->_reportes->selecciona_numero_arribos_x_tipo_habitacion($mesano);
        $cabeceras = array ('idtipo_habitacion', 'descripcion', 'cantidad');
        $datos = $this->get_matriz($datos, $cabeceras);
        return $datos;
    }
    
    public function obtener_numero_arribos_huesped_ubigeo_internacional($mesano) {
        $datos =$this->_reportes->selecciona_numero_arribos_huesped_ubigeo_internacional($mesano);
        if($mesano[2]==1){
            $cabeceras = array ('idcontinente', 'descripcion_continente','cantidad');
        } else {
            $cabeceras = array ('idpais', 'descripcion', 'cantidad');
        }
        $datos = $this->get_matriz($datos, $cabeceras);
        return $datos;
    }
    
    public function obtener_numero_arribos_huesped_dia_mes($mesano) {
        $datos =$this->_reportes->selecciona_numero_arribos_huesped_dia_mes($mesano);
        $cabeceras = array ('dia', 'cantidad');
        $datos = $this->get_matriz($datos, $cabeceras);
        return $datos;
    }
    
    public function obtener_numero_arribos_huesped_ubigeo_nacional($mesano) {
        $datos =$this->_reportes->selecciona_numero_arribos_huesped_ubigeo_nacional($mesano);
        if($mesano[2]==1){
            $cabeceras = array ('idpais', 'descripcion', 'codigo_region','codigo_provincia','cantidad');
        } else {
            $cabeceras = array ('idpais', 'descripcion', 'codigo_region','cantidad');
        }
        $datos = $this->get_matriz($datos, $cabeceras);
        return $datos;
    }
    
    public function obtener_numero_pernoctaciones_huesped_ubigeo_nacional($mesano) {
        $datos =$this->_reportes->selecciona_numero_pernoctaciones_huesped_ubigeo_nacional($mesano);
        if($mesano[2]==1){
            $cabeceras = array ('idpais', 'descripcion', 'codigo_region','codigo_provincia','cantidad');
        } else {
            $cabeceras = array ('idpais', 'descripcion', 'codigo_region','cantidad');
        }
        $datos = $this->get_matriz($datos, $cabeceras);
        return $datos;
    }
    
    public function obtener_cantidad_empleados_x_tipo_x_actividad() {
        $datos =$this->_reportes->selecciona_cantidad_empleados_x_tipo_x_actividad();
        $cabeceras = array ('idactividad', 'idtipo_empleado', 'cantidad');
        $datos = controller::get_matriz($datos, $cabeceras);
        return $datos;
    }
    
    public function obtener_habitaciones_x_tipo_habitacion() {
        $datos =$this->_reportes->selecciona_habitaciones_x_tipo_habitacion();
        $cabeceras = array ('idtipo_habitacion', 'descripcion', 'cantidad');
        $datos = controller::get_matriz($datos, $cabeceras);
        return $datos;
    }
    
    public function obtener_numero_pernoctaciones_x_tipo_habitacion($mesano) {
        $datos =$this->_reportes->selecciona_numero_pernoctaciones_x_tipo_habitacion($mesano);
        $cabeceras = array ('idtipo_habitacion', 'descripcion', 'pernoctaciones', 'habitaciones_noche');
        $datos = controller::get_matriz($datos, $cabeceras);
        return $datos;
    }
    
    public function obtener_datos_comprobante_venta($idventa) {
        $datos =$this->_reportes->selecciona_datos_comprobante_venta($idventa);
        $cabeceras = array ('idventa', 'fecha_venta', 'estado', 'observaciones', 'nro_documento', 'idtipo_comprobante','serie','abreviatura', 'idempleado', 'nombres_empleado', 'apellidos_empleado', 'idtipo_transaccion', 'registro_venta', 'idcliente', 'nombres_cliente', 'apellidos_cliente', 'documento', 'direccion_cliente');
        $datos = controller::get_matriz($datos, $cabeceras);
        return $datos;
    }
    
    public function obtener_datos_detalle_comprobante_venta($idventa) {
        $datos =$this->_reportes->selecciona_datos_detalle_comprobante_venta($idventa);
        $cabeceras = array ('idventa','idpaquete','cantidad','precio_venta','idproducto','descripcion','idunidad_medida','abreviatura');
        $datos = controller::get_matriz($datos, $cabeceras);
        return $datos;
    }
    
    public function obtener_numero_pernoctaciones_huesped_ubigeo_internacional($mesano) {
        $datos =$this->_reportes->selecciona_numero_pernoctaciones_huesped_ubigeo_internacional($mesano);
        if($mesano[2]==1){
            $cabeceras = array ('idcontinente', 'descripcion_continente','cantidad');
        } else {
            $cabeceras = array ('idpais', 'descripcion', 'cantidad');
        }
        $datos = $this->get_matriz($datos, $cabeceras);
        return $datos;
    }
    
    public function obtener_stock_total() {
        $datos = $this->_reportes->selecciona_stock_total(0);
        $cabeceras = array('idproducto', 'descripcion', 'precio_unitario', 'observaciones', 'servicio', 'tipo_producto', 'unidad_medida', 'idubicacion', 'ubicacion', 'almacen', 'promocion', 'stock', 'precio_compra');
        $datos = $this->get_matriz($datos, $cabeceras);
        return $datos;
    }
    
    public function obtener_tipo_habitacion_total(){
        $datos = $this->_reportes->selecciona_tipo_habitacion_total();
        $cabeceras = array('idtipo_habitacion', 'descripcion', 'costo', 'camas');
        $datos = $this->get_matriz($datos, $cabeceras);
        return $datos;
    }

    public function promociones_todo() {
        $datos = $this->_reportes->promociones_todo();
        $cabeceras = array('idpromocion', 'descripcion', 'descuento', 'fecha_inicio', 'fecha_final');
        $datos = $this->get_matriz($datos, $cabeceras);
        $datacount = count($datos);
        for ($i = 0; $i < $datacount; $i++) {
            $c_codigo = $c_codigo . $datos[$i]['idpromocion'] . "\n";
            $c_descripcion = $c_descripcion . $datos[$i]['descripcion'] . "\n";
            $c_descuento = $c_descuento . $datos[$i]['descuento'] . "\n";
        }

        $this->_fpdf->AddPage();
        $Y_fields_name_position = 20;
        $Y_table_position = 26;
        $this->_fpdf->SetFillColor(232, 232, 232);
        $this->_fpdf->SetFont('Arial', 'B', 12);
        $this->_fpdf->SetY($Y_fields_name_position);
        $this->_fpdf->SetX(45);
        $this->_fpdf->Cell(20, 6, utf8_decode('Código'), 1, 0, 'L', 1);
        $this->_fpdf->SetX(65);
        $this->_fpdf->Cell(100, 6, utf8_decode('Descripción'), 1, 0, 'L', 1);
        $this->_fpdf->SetX(135);
        $this->_fpdf->Cell(30, 6, utf8_decode('Descuento'), 1, 0, 'L', 1);
        $this->_fpdf->Ln();
        $this->_fpdf->SetFont('Arial', '', 12);
        $this->_fpdf->SetY($Y_table_position);
        $this->_fpdf->SetX(45);
        $this->_fpdf->MultiCell(20, 6, $c_codigo, 1);
        $this->_fpdf->SetY($Y_table_position);
        $this->_fpdf->SetX(65);
        $this->_fpdf->MultiCell(100, 6, $c_descripcion, 1);
        $this->_fpdf->SetY($Y_table_position);
        $this->_fpdf->SetX(135);
        $this->_fpdf->MultiCell(30, 6, $c_descuento, 1);
        $i = 0;
        $this->_fpdf->SetY($Y_table_position);
        while ($i < $datacount) {
            $this->_fpdf->SetX(45);
            $this->_fpdf->MultiCell(120, 6, '', 1);
            $i = $i + 1;
        }
        $this->_fpdf->Ln();
        $this->_fpdf->Cell(185, 17, 'Lista de ' . $rep, 0, 0, 'C');
        $this->_fpdf->AddPage();
        $this->_fpdf->Output();
    }

    public function stock_actual() {
        $datos = $this->obtener_stock_total();
        $datacount = count($datos);

        $Y_fields_name_position = 35;
        $Y_table_position = 41;
        $opp = 39;
        $contapag = 1;
        $contaobj = 0;

        for ($i = 0; $i < $datacount; $i++) {
            $c_codigo[$contapag] = $c_codigo[$contapag] . $datos[$i]['idproducto'] . "\n";
            $c_descripcion[$contapag] = $c_descripcion[$contapag] . substr($datos[$i]['descripcion'], 0, 44) . "\n";
            $c_unidad_medida[$contapag] = $c_unidad_medida[$contapag] . substr($datos[$i]['unidad_medida'], 0, 7) . "\n";
            $c_stock[$contapag] = $c_stock[$contapag] . $datos[$i]['stock'] . "0" . "\n";
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
            $this->_fpdf->SetFont('Arial', 'B', 11);
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
            $this->_fpdf->SetFont('Courier', '', 11);
            $this->_fpdf->SetY($Y_table_position);
            $this->_fpdf->SetX(15);
            $this->_fpdf->MultiCell(25, 6, $c_codigo[$i], 1);
            $this->_fpdf->SetY($Y_table_position);
            $this->_fpdf->SetX(40);
            $this->_fpdf->MultiCell(105, 6, $c_descripcion[$i], 1);
            $this->_fpdf->SetY($Y_table_position);
            $this->_fpdf->SetX(145);
            $this->_fpdf->MultiCell(20, 6, $c_unidad_medida[$i], 1, 'C');
            $this->_fpdf->SetY($Y_table_position);
            $this->_fpdf->SetX(165);
            $this->_fpdf->MultiCell(30, 6, $c_stock[$i], 1, 'R');
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
        $this->_fpdf->Cell(101.3, 5.8, utf8_decode($datos[0]['razon_social']), 0, 0, 'L');
//ruc
        $setx = 153.6;
        for ($i = 0; $i < 11; $i++) {
            $this->_fpdf->SetX($setx);
            $this->_fpdf->Cell(4.63, 5.8, substr($datos[0]['ruc'], $i, 1), 0, 0, 'C');
            $setx = $setx + 4.63;
        }
        $this->_fpdf->SetFont('Arial', '', 9);
//nombre comercial
        $this->_fpdf->SetY(47.6);
        $this->_fpdf->SetX(22.43);
        $this->_fpdf->Cell(54.56, 4.7, utf8_decode($datos[0]['nombre_comercial']), 0, 0, 'L');
//clase
        $this->_fpdf->SetX(91.42);
        $this->_fpdf->Cell(16.67, 4.7, utf8_decode($datos[0]['clase']), 0, 0, 'R');
//categoria
        $this->_fpdf->SetX(122.19);
        $this->_fpdf->Cell(15.49, 4.7, utf8_decode($datos[0]['categoria']), 0, 0, 'R');
//nro certificado
        $this->_fpdf->SetX(172.19);
        $this->_fpdf->Cell(32.42, 4.7, utf8_decode($datos[0]['numero_certificado']), 0, 0, 'C');
//direccion
        $this->_fpdf->SetY(52.27);
        $this->_fpdf->SetX(22.43);
        $this->_fpdf->Cell(85.6, 4.13, utf8_decode($datos[0]['direccion']), 0, 0, 'L');
//telefono
        $this->_fpdf->SetX(122.19);
        $this->_fpdf->Cell(31.63, 4.13, utf8_decode($datos[0]['telefono']), 0, 0, 'L');
//fax
        $this->_fpdf->SetX(172.19);
        $this->_fpdf->Cell(32.53, 4.13, utf8_decode($datos[0]['fax']), 0, 0, 'L');
//region
        $this->_fpdf->SetY(56.52);
        $this->_fpdf->SetX(17.61);
        $this->_fpdf->Cell(59.52, 4.13, utf8_decode($datos[0]['region']), 0, 0, 'L');
//provincia
        $this->_fpdf->SetX(91.45);
        $this->_fpdf->Cell(51.79, 4.13, utf8_decode($datos[0]['provincia']), 0, 0, 'L');
//distrito
        $this->_fpdf->SetX(158.45);
        $this->_fpdf->Cell(46.28, 4.13, utf8_decode($datos[0]['distrito']), 0, 0, 'L');
//pagina web
        $this->_fpdf->SetY(60.88);
        $this->_fpdf->SetX(22.19);
        $this->_fpdf->Cell(85.61, 4.13, utf8_decode($datos[0]['pagina_web']), 0, 0, 'L');
//email para reservas
        $this->_fpdf->SetX(143.06);
        $this->_fpdf->Cell(61.69, 4.13, utf8_decode($datos[0]['e_mail']), 0, 0, 'L');

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
                $dato = $datos[$j]['cantidad'];
                if ($datos[$j]['idtipo_habitacion'] == $habitacioncuenta && $conteok == false) {
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
                $dato = $datos[$j]['camas'];
                if ($datos[$j]['idtipo_habitacion'] == $habitacioncuenta && $conteok == false) {
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
                if ($datos[$j]['idtipo_habitacion'] == $habitacioncuenta && $conteok == false) {
                    $this->_fpdf->Cell(21.05, 4.30, $datos[$j]['cantidad'], 0, 0, 'C');
                    $total = $total + $datos[$j]['cantidad'];
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
        $datos= $this->obtener_numero_pernoctaciones_x_tipo_habitacion($mesano);
        $datacount = count($datos);
        $habitacioncuenta = 1;
        $conteok = false;
        $total = 0;
        for ($i = 1; $i <= 6; $i++) {
            $this->_fpdf->SetY($sety);
            $this->_fpdf->SetX($setx);
            for ($j = 0; $j < $datacount; $j++) {
                if ($datos[$j]['idtipo_habitacion'] == $habitacioncuenta && $conteok == false) {
                    $this->_fpdf->Cell(21.05, 4.30, $datos[$j]['habitaciones_noche'], 0, 0, 'C');
                    $total = $total + $datos[$j]['habitaciones_noche'];
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
                if ($datos[$j]['idtipo_habitacion'] == $habitacioncuenta && $conteok == false) {
                    $this->_fpdf->Cell(21.05, 4.30, $datos[$j]['pernoctaciones'], 0, 0, 'C');
                    $total = $total + $datos[$j]['pernoctaciones'];
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
                $dato = $datos[$j]['costo'];
                if ($datos[$j]['idtipo_habitacion'] == $habitacioncuenta && $conteok == false) {
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
            if ($datos[$conforme]['dia'] == $i) {
                $this->_fpdf->Cell(12.46, 4.65, $datos[$conforme]['cantidad'], 0, 0, 'C');
                $contadorhuesped = $contadorhuesped + $datos[$conforme]['cantidad'];
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
                if ($datos[$j]['idpais'] == $paiscuenta && $conteok == false) {
                    $this->_fpdf->Cell(26.33, 3.71, $datos[$j]['cantidad'], '', 0, 'C');
                    $internacionaltotal = $internacionaltotal + $datos[$j]['cantidad'];
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
                if ($datos[$j]['idcontinente'] == $continentecuenta && $conteok == false) {
                    $this->_fpdf->Cell(26.33, 3.71, $datos[$j]['cantidad'], '', 0, 'C');
                    $internacionaltotal = $internacionaltotal + $datos[$j]['cantidad'];
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
                if ($datos[$j]['idpais'] == $paiscuenta && $conteok == false) {
                    $this->_fpdf->Cell(26.33, 3.71, $datos[$j]['cantidad'], '', 0, 'C');
                    $internacionaltotal = $internacionaltotal + $datos[$j]['cantidad'];
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
        $datos = $this->obtener_numero_pernoctaciones_huesped_ubigeo_internacional($mesano);
        $datacount = count($datos);
        /* COMIENZA CON AFRICA, CODIGO 4 */
        $continentecuenta = 4;
        $conteok = false;
        for ($i = 0; $i < 5; $i++) {
            $this->_fpdf->SetY($sety);
            $this->_fpdf->SetX($setx);
            for ($j = 0; $j < $datacount; $j++) {
                if ($datos[$j]['idcontinente'] == $continentecuenta && $conteok == false) {
                    $this->_fpdf->Cell(26.33, 3.71, $datos[$j]['cantidad'], '', 0, 'C');
                    $internacionaltotal = $internacionaltotal + $datos[$j]['cantidad'];
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
            if ($datos[$i]['codigo_region'] == 7) {
                $limametro = $limametro + $datos[$i]['cantidad'];
            } else {
                if ($datos[$i]['codigo_provincia'] == 0 || $datos[$i]['codigo_provincia'] == 1) {
                    $limametro = $limametro + $datos[$i]['cantidad'];
                } else {
                    $lima = lima + $datos[$i]['cantidad'];
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
                if ($datos[$j]['codigo_region'] == $regioncount) {
                    $this->_fpdf->Cell(25.90, 3.63, $datos[$j]['cantidad'], 1, 0, 'C');
                    $nacionaltotal = $nacionaltotal + $datos[$j]['cantidad'];
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
            if ($datos[$i]['codigo_region'] == 7) {
                $limametro = $limametro + $datos[$i]['cantidad'];
            } else {
                if ($datos[$i]['codigo_provincia'] == 0 || $datos[$i]['codigo_provincia'] == 1) {
                    $limametro = $limametro + $datos[$i]['cantidad'];
                } else {
                    $lima = lima + $datos[$i]['cantidad'];
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
                if ($datos[$j]['codigo_region'] == $regioncount) {
                    $this->_fpdf->Cell(25.90, 3.63, $datos[$j]['cantidad'], 1, 0, 'C');
                    $nacionaltotal = $nacionaltotal + $datos[$j]['cantidad'];
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
                    if ($datos[$j]['idtipo_empleado'] == $iconta) {
                        if ($datos[$j]['idactividad'] == 1) {
                            $cant = $datos[$j]['cantidad'];
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
                    if ($datos[$j]['idtipo_empleado'] == $iconta) {
                        if ($datos[$j]['idactividad'] == /* CODIGO DE ACTIVIDAD */2) {
                            $cant = $datos[$j]['cantidad'];
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
                    if ($datos[$j]['idtipo_empleado'] == $iconta) {
                        if ($datos[$j]['idactividad'] == /* CODIGO DE ACTIVIDAD */3) {
                            $cant = $datos[$j]['cantidad'];
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
                    if ($datos[$j]['idtipo_empleado'] == $iconta) {
                        if ($datos[$j]['idactividad'] == /* CODIGO DE ACTIVIDAD */4) {
                            $cant = $datos[$j]['cantidad'];
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
                    if ($datos[$j]['idtipo_empleado'] == $iconta) {
                        if ($datos[$j]['idactividad'] == /* CODIGO DE ACTIVIDAD */5) {
                            $cant = $datos[$j]['cantidad'];
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
                    if ($datos[$j]['idtipo_empleado'] == $iconta) {
                        if ($datos[$j]['idactividad'] == /* CODIGO DE ACTIVIDAD */6) {
                            $cant = $datos[$j]['cantidad'];
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
                    if ($datos[$j]['idtipo_empleado'] == $iconta) {
                        if ($datos[$j]['idactividad'] == /* CODIGO DE ACTIVIDAD */7) {
                            $cant = $datos[$j]['cantidad'];
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
            $datos = $this->obtener_stock_por_ubicacion($ubicaciones[$x]['idubicacion']);
            $datacount = count($datos);
            $contaobj = 0;
            $c_codigo[$contapag] = "";
            $c_descripcion[$contapag] = "";
            $c_tipo_producto[$contapag] = "";
            $c_almacen[$contapag] = "";
            $c_unidad_medida[$contapag] = "";
            $c_stock[$contapag] = "";
            for ($i = 0; $i < $datacount; $i++) {
                $c_codigo[$contapag] = $c_codigo[$contapag] . $datos[$i]['idproducto'] . "\n";
                $c_descripcion[$contapag] = $c_descripcion[$contapag] . $datos[$i]['descripcion'] . "\n";
                $c_tipo_producto[$contapag] = $c_tipo_producto[$contapag] . substr($datos[$i]['tipo_producto'], 0, 8) . "\n";
                $c_almacen[$contapag] = $c_almacen[$contapag] . substr($datos[$i]['almacen'], 0, 10) . "\n";
                $c_unidad_medida[$contapag] = $c_unidad_medida[$contapag] . substr($datos[$i]['unidad_medida'], 0, 6) . "\n";
                $c_stock[$contapag] = $c_stock[$contapag] . $datos[$i]['stock'] . "0" . "\n";
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
                $this->_fpdf->SetFont('Courier','B',10);
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
                $this->_fpdf->Cell(30, 5, utf8_decode('Ubicación :   ' . $ubicaciones[$x]['descripcion'] . '     /   Código:  ' . $ubicaciones[$x]['idubicacion']), '', 0, 'L', 1);
                $this->_fpdf->SetFont('Courier', '', 10);
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

    public function ticket_boleta_venta($idventa){
        // DATOS QUE DEBE RECIBIR ESTE REPORTE: IDVENTA 
        $idventa = array($idventa);
        
        //PRIMERO SE OBTIENE LA CANTIDAD DE ITEMS EN EL DETALLE PARA DETERMINAR EL ALTO DE PAGINA DEL TICKET
        $detalle = $this->obtener_datos_detalle_comprobante_venta($idventa);
        $items = count($detalle);
        // EL TAMAÑO INICIAL, ESDECIR, SIN ITEMS REGISTRADOS, ES DE VALOR: $alto=95;
        
        $ancho_celda_datos = 3.8;
        $alto = 92 + ($ancho_celda_datos*$items);
        $ancho = 73;
        $espac = 8;
        $this->_fpdf = new FPDF('P', 'mm', array($ancho, $alto));
        $this->_fpdf->SetAutoPageBreak(false);
        $this->_fpdf->AddPage();
        $this->_fpdf->SetFont('Courier', '', 9);
        $this->_fpdf->SetFillColor(255, 255, 255);
        $datos = $this->obtener_datos_empresa();
        $rep_venta = array('',$datos[0]['rep_venta_1'], $datos[0]['rep_venta_2'],
            $datos[0]['rep_venta_3'],$datos[0]['rep_venta_4'],
            $datos[0]['rep_venta_5'],$datos[0]['rep_venta_6'],
            $datos[0]['rep_venta_7']);
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
            substr($datos[0]['fecha_venta'],8,2),
            substr($datos[0]['fecha_venta'],5,2),
            substr($datos[0]['fecha_venta'],0,4),
            substr($datos[0]['fecha_venta'],11,2),
            substr($datos[0]['fecha_venta'],14,2),
            substr($datos[0]['fecha_venta'],17,2)
            );
        
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho,$ancho_celda_datos,utf8_decode('  FECHA:'.$horafecha[0].'/'.$horafecha[1].'/'.$horafecha[2].'    '.'HORA:'.$horafecha[3].':'.$horafecha[4].':'.$horafecha[5]),0,0,'L',1);
        $espac = $espac + $ancho_celda_datos;
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho,$ancho_celda_datos,utf8_decode('  CLIENTE:           '.$datos[0]['abreviatura'].'/'.$datos[0]['serie'].'-'.$datos[0]['nro_documento']),0,0,'L',1);
        $espac = $espac + $ancho_celda_datos;
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho,$ancho_celda_datos,substr(utf8_decode('  '.$datos[0]['nombres_cliente'].' '.$datos[0]['apellidos_cliente']),0,36),0,0,'L',1);
        
        $espac = $espac + $ancho_celda_datos+2;
        
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
        for($i=0;$i<$items;$i++){
            $this->_fpdf->SetY($espac);
            $this->_fpdf->SetX(0);
            if($detalle[$i]['idpaquete']==0){//NO ES UN PAQUETE
                $this->_fpdf->Cell($ancho,$ancho_celda_datos,utf8_decode('  '.$detalle[$i]['cantidad'].$detalle[$i]['abreviatura'].' '.$detalle[$i]['descripcion']),0,0,'L',1);
            }
            if($detalle[$i]['idproducto']==0){
                $this->_fpdf->Cell($ancho,$ancho_celda_datos,utf8_decode('  '.$detalle[$i]['cantidad'].'PQT'.' '.$detalle[$i]['descripcion']),0,0,'L',1);
            }
            $this->_fpdf->SetY($espac);
            $this->_fpdf->SetX(50);
            $this->_fpdf->Cell(10,$ancho_celda_datos,utf8_decode('S/.'),0,0,'L',1);
            //PARSEAR OBJETO NUMERIC HACIA DOUBLE CON 2 DECIMALES
            $prec = number_format($detalle[$i]['precio_venta'], 2);
            $this->_fpdf->SetY($espac);
            $this->_fpdf->SetX(55);
            $this->_fpdf->Cell(15.5,$ancho_celda_datos,utf8_decode(''.$prec),0,0,'R',1);
            //SUMAR LOS VALORES DEL PRECIO PARA OBTENER EL TOTAL:
            $sbtotal = $sbtotal + $prec;
            
            $espac = $espac + $ancho_celda_datos;
        }
        if($items==0){
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
        $igv = number_format('0', 2);
        
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho,$ancho_celda_datos,utf8_decode('           *   V.VENTA  S/.'),0,0,'L',1);
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(55);
        $this->_fpdf->Cell(15.5,$ancho_celda_datos,utf8_decode(''.  number_format($sbtotal, 2)),0,0,'R',1);
        $espac = $espac + $ancho_celda_datos;
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho,$ancho_celda_datos,utf8_decode('           **  IGV(18%) S/.'),0,0,'L',1);
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(55);
        //CALCULAR TOTAL SUMADO EL IGV:
        $total = $sbtotal + ($igv*$sbtotal);
        
        $this->_fpdf->Cell(15.5,$ancho_celda_datos,utf8_decode(''.  number_format(($sbtotal*$igv), 2)),0,0,'R',1);
        $espac = $espac + $ancho_celda_datos;
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho,$ancho_celda_datos,utf8_decode('           *** TOTAL    S/.'),0,0,'L',1);
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(55);
        $this->_fpdf->Cell(15.5,$ancho_celda_datos,utf8_decode(''.  number_format($total, 2)),0,0,'R',1);
        $espac = $espac + $ancho_celda_datos;
        
        $espac = $espac + $ancho_celda_datos - 3;
        //necesito: vendedor, items, condicion (contado, credito), campo obsrevaciones (si estado = 0: observacion = anulado)
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho,$ancho_celda_datos,utf8_decode(' ITEMS: '.$items),0,0,'L',1);
        $espac = $espac + $ancho_celda_datos;
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho,$ancho_celda_datos,substr(utf8_decode(' VENDEDOR: '.$datos[0]['idempleado'].'/'.$datos[0]['nombres_empleado'].' '.$datos[0]['apellidos_empleado']),0,36),0,0,'L',1);
        $espac = $espac + $ancho_celda_datos;
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        /*DETERMINAR EL TIPO DE TRANSACCION*/if($datos[0]['idtipo_transaccion']==1){$datos[0]['idtipo_transaccion']='CONTADO';}else{$datos[0]['idtipo_transaccion']='CREDITO';}
        $this->_fpdf->Cell($ancho,$ancho_celda_datos,substr(utf8_decode(' CONDICION: '.$datos[0]['idtipo_transaccion']),0,36),0,0,'L',1);
        $espac = $espac + $ancho_celda_datos;
        /*DETERMINAR LA OBSERVACION O SI ESTUVIERA VENTA ANULADA*/
        if($datos[0]['estado']==0){
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
        // DATOS QUE DEBE RECIBIR ESTE REPORTE: IDVENTA 
        $idventa = array($idventa);
        
        //PRIMERO SE OBTIENE LA CANTIDAD DE ITEMS EN EL DETALLE PARA DETERMINAR EL ALTO DE PAGINA DEL TICKET
        $detalle = $this->obtener_datos_detalle_comprobante_venta($idventa);
        $items = count($detalle);
        // EL TAMAÑO INICIAL, ESDECIR, SIN ITEMS REGISTRADOS, ES DE VALOR: $alto=112;
        
        $ancho_celda_datos = 3.8;
        $alto = 112 + ($ancho_celda_datos*$items);
        $ancho = 73;
        $espac = 8;
        $this->_fpdf = new FPDF('P', 'mm', array($ancho, $alto));
        $this->_fpdf->SetAutoPageBreak(false);
        $this->_fpdf->AddPage();
        $this->_fpdf->SetFont('Courier', '', 9);
        $this->_fpdf->SetFillColor(255, 255, 255);
        $datos = $this->obtener_datos_empresa();
        $rep_venta = array('',$datos[0]['rep_venta_1'], $datos[0]['rep_venta_2'],
            $datos[0]['rep_venta_3'],$datos[0]['rep_venta_4'],
            $datos[0]['rep_venta_5'],$datos[0]['rep_venta_6'],
            $datos[0]['rep_venta_7']);
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
            substr($datos[0]['fecha_venta'],8,2),
            substr($datos[0]['fecha_venta'],5,2),
            substr($datos[0]['fecha_venta'],0,4),
            substr($datos[0]['fecha_venta'],11,2),
            substr($datos[0]['fecha_venta'],14,2),
            substr($datos[0]['fecha_venta'],17,2)
            );
        
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho,$ancho_celda_datos,utf8_decode('  FECHA:'.$horafecha[0].'/'.$horafecha[1].'/'.$horafecha[2].'    '.'HORA:'.$horafecha[3].':'.$horafecha[4].':'.$horafecha[5]),0,0,'L',1);
        $espac = $espac + $ancho_celda_datos;
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho,$ancho_celda_datos,utf8_decode('*** TICKET FACTURA ***'),0,0,'C',1);
        $espac = $espac + $ancho_celda_datos;
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        //$this->_fpdf->Cell($ancho,$ancho_celda_datos,utf8_decode('  CLIENTE:           '.$datos[0]['abreviatura'].'/'.$datos[0]['serie'].'-'.$datos[0]['nro_documento']),0,0,'L',1);
        $this->_fpdf->Cell($ancho,$ancho_celda_datos,utf8_decode($datos[0]['abreviatura'].'/'.$datos[0]['serie'].'-'.$datos[0]['nro_documento']),0,0,'C',1);
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
        for($i=0;$i<$items;$i++){
            $this->_fpdf->SetY($espac);
            $this->_fpdf->SetX(0);
            if($detalle[$i]['idpaquete']==0){//NO ES UN PAQUETE
                $this->_fpdf->Cell($ancho,$ancho_celda_datos,utf8_decode('  '.$detalle[$i]['cantidad'].$detalle[$i]['abreviatura'].' '.$detalle[$i]['descripcion']),0,0,'L',1);
            }
            if($detalle[$i]['idproducto']==0){
                $this->_fpdf->Cell($ancho,$ancho_celda_datos,utf8_decode('  '.$detalle[$i]['cantidad'].'PQT'.' '.$detalle[$i]['descripcion']),0,0,'L',1);
            }
            $this->_fpdf->SetY($espac);
            $this->_fpdf->SetX(50);
            $this->_fpdf->Cell(10,$ancho_celda_datos,utf8_decode('S/.'),0,0,'L',1);
            //PARSEAR OBJETO NUMERIC HACIA DOUBLE CON 2 DECIMALES
            $prec = number_format($detalle[$i]['precio_venta'], 2);
            $this->_fpdf->SetY($espac);
            $this->_fpdf->SetX(55);
            $this->_fpdf->Cell(15.5,$ancho_celda_datos,utf8_decode(''.$prec),0,0,'R',1);
            //SUMAR LOS VALORES DEL PRECIO PARA OBTENER EL TOTAL:
            $sbtotal = $sbtotal + $prec;
            
            $espac = $espac + $ancho_celda_datos;
        }
        if($items==0){
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
        $igv = number_format('0', 2);
        
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho,$ancho_celda_datos,utf8_decode('           *   V.VENTA  S/.'),0,0,'L',1);
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(55);
        $this->_fpdf->Cell(15.5,$ancho_celda_datos,utf8_decode(''.  number_format($sbtotal, 2)),0,0,'R',1);
        $espac = $espac + $ancho_celda_datos;
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho,$ancho_celda_datos,utf8_decode('           **  IGV(18%) S/.'),0,0,'L',1);
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(55);
        //CALCULAR TOTAL SUMADO EL IGV:
        $total = $sbtotal + ($igv*$sbtotal);
        
        $this->_fpdf->Cell(15.5,$ancho_celda_datos,utf8_decode(''.  number_format(($sbtotal*$igv), 2)),0,0,'R',1);
        $espac = $espac + $ancho_celda_datos;
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho,$ancho_celda_datos,utf8_decode('           *** TOTAL    S/.'),0,0,'L',1);
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(55);
        $this->_fpdf->Cell(15.5,$ancho_celda_datos,utf8_decode(''.  number_format($total, 2)),0,0,'R',1);
        $espac = $espac + $ancho_celda_datos;
        
        $espac = $espac + $ancho_celda_datos - 3;
        //necesito: vendedor, items, condicion (contado, credito), campo obsrevaciones (si estado = 0: observacion = anulado)
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho,$ancho_celda_datos,utf8_decode(' ITEMS: '.$items),0,0,'L',1);
        $espac = $espac + $ancho_celda_datos;
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho,$ancho_celda_datos,substr(utf8_decode(' RAZON SOCIAL: '),0,36),0,0,'L',1);
        $espac = $espac + $ancho_celda_datos;
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho,$ancho_celda_datos,substr(utf8_decode(' '.$datos[0]['nombres_cliente']),0,36),0,0,'L',1);
        $espac = $espac + $ancho_celda_datos;
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho,$ancho_celda_datos,substr(utf8_decode(' DIRECCION: '),0,36),0,0,'L',1);
        $espac = $espac + $ancho_celda_datos;
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho,$ancho_celda_datos,substr(utf8_decode(' '.$datos[0]['direccion_cliente']),0,36),0,0,'L',1);
        $espac = $espac + $ancho_celda_datos;
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho,$ancho_celda_datos,substr(utf8_decode(' RUC: '.$datos[0]['documento']),0,36),0,0,'L',1);
        $espac = $espac + $ancho_celda_datos;
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        $this->_fpdf->Cell($ancho,$ancho_celda_datos,substr(utf8_decode(' VENDEDOR: '.$datos[0]['idempleado'].'/'.$datos[0]['nombres_empleado'].' '.$datos[0]['apellidos_empleado']),0,36),0,0,'L',1);
        $espac = $espac + $ancho_celda_datos;
        $this->_fpdf->SetY($espac);
        $this->_fpdf->SetX(0);
        /*DETERMINAR EL TIPO DE TRANSACCION*/if($datos[0]['idtipo_transaccion']==1){$datos[0]['idtipo_transaccion']='CONTADO';}else{$datos[0]['idtipo_transaccion']='CREDITO';}
        $this->_fpdf->Cell($ancho,$ancho_celda_datos,substr(utf8_decode(' CONDICION: '.$datos[0]['idtipo_transaccion']),0,36),0,0,'L',1);
        $espac = $espac + $ancho_celda_datos;
        /*DETERMINAR LA OBSERVACION O SI ESTUVIERA VENTA ANULADA*/
        if($datos[0]['estado'] == 0){
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
    
}

?>
