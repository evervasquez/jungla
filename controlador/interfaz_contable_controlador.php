<?php

class interfaz_contable_controlador extends controller {

    private $_interfaz_contable;
    private $_phpexcel;

    public function __construct() {
        if (!$this->acceso(47)) {
            $this->redireccionar('error/access/5050');
        }
        parent::__construct();
        $this->get_Libreria('phpexcel' . DS . 'PHPExcel');
        $this->get_Libreria('phpexcel' . DS . 'PHPExcel' . DS . 'Writer' . DS . 'Excel2007');
        $this->_phpexcel = new PHPExcel();
        $this->_interfaz_contable = $this->cargar_modelo('interfaz_contable');
    }

    public function index() {
        $this->_vista->renderizar('index');
    }
    
    public function obtener_asientos_intervalo_fechas($datos){
        $datos = $this->_interfaz_contable->selecciona_asientos_intervalo_fechas($datos);
        $cabeceras =  array('idasiento', 'fecha','concepto_movimiento','registro','nro_correlativo','nro_documento','nro_cuenta','cuenta','debe','haber','nro_operacion');
        $datos = $this->get_matriz($datos, $cabeceras);
        return $datos;
    }
    public function obtener_datos_empresa(){
        $datos = $this->_interfaz_contable->selecciona_datos_empresa();
        $cabeceras = array('ruc', 'razon_social');
        $datos = $this->get_matriz($datos, $cabeceras);
        return $datos;
    }
    
    public function prueba(){
        $fecha_inicio = $_POST['fecha_inicio'];
        $fecha_fin = $_POST['fecha_fin'];
        if($fecha_inicio=="" || $fecha_fin==""){
            echo "<script>alert('No se puede generar el reporte debido a datos erroneos o faltantes')</script>";
            die();
        }
        $fecha_inicio_fecha_fin = array($fecha_inicio, $fecha_fin);
        $datos = $this->obtener_asientos_intervalo_fechas($fecha_inicio_fecha_fin);
        $datacount = count($datos);
        $datos_empresa = $this->obtener_datos_empresa();
                //algunos datos sobre autoría
        $this->_phpexcel->getProperties()->setCreator("LaJungla");
        $this->_phpexcel->getProperties()->setLastModifiedBy("La Jungla");
        $this->_phpexcel->getProperties()->setTitle("Libro Diario - La Jungla");
        $this->_phpexcel->getProperties()->setSubject("Reportes Contables");
        $this->_phpexcel->getProperties()->setDescription("Reporte de Libro Diario perteneciente a La Jungla");

        //Trabajamos con la hoja activa principal denominacion, cuenta, glosa, debe y haber
        $this->_phpexcel->setActiveSheetIndex(0);
        //fila en la que se inicia la tabla
        $table_position = 7;
        
        //ANCHO Y ENCABEZADO DE LAS COLUMNAS //20 EN WIDTH ES 140 EN EL ANCHO VALOR DE EXCEL
        $this->_phpexcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
        $this->_phpexcel->getActiveSheet()->SetCellValue("A".($table_position-2), 'Nro. de Operacion');
        
        $this->_phpexcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
        $this->_phpexcel->getActiveSheet()->SetCellValue("A".($table_position-6), 'LIBRO DIARIO');
        
        $this->_phpexcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
        $this->_phpexcel->getActiveSheet()->SetCellValue("A".($table_position-5), 'PERIODO DEL: ');
        
        $this->_phpexcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
        $this->_phpexcel->getActiveSheet()->SetCellValue("A".($table_position-4), 'RUC: ');
        
        $this->_phpexcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
        $this->_phpexcel->getActiveSheet()->SetCellValue("A".($table_position-3), 'RAZON SOCIAL: ');
        
        $this->_phpexcel->getActiveSheet()->getColumnDimension('B')->setWidth(13);
        $this->_phpexcel->getActiveSheet()->SetCellValue("B".($table_position-2), 'Fecha');
        
        $this->_phpexcel->getActiveSheet()->getColumnDimension('B')->setWidth(13);
        $this->_phpexcel->getActiveSheet()->SetCellValue("B".($table_position-5), str_replace('-', '/', $fecha_inicio));
        
        $this->_phpexcel->getActiveSheet()->getColumnDimension('B')->setWidth(13);
        $this->_phpexcel->getActiveSheet()->SetCellValue("B".($table_position-4), $datos_empresa[0]['ruc'], PHPExcel_Cell_DataType::TYPE_STRING);
        
        $this->_phpexcel->getActiveSheet()->getColumnDimension('B')->setWidth(13);
        $this->_phpexcel->getActiveSheet()->SetCellValue("B".($table_position-3), $datos_empresa[0]['razon_social']);
        
        $this->_phpexcel->getActiveSheet()->getColumnDimension('C')->setWidth(34.3);
        $this->_phpexcel->getActiveSheet()->SetCellValue("C".($table_position-2), 'Glosa');
        
        $this->_phpexcel->getActiveSheet()->getColumnDimension('C')->setWidth(34.3);
        $this->_phpexcel->getActiveSheet()->SetCellValue("C".($table_position-5), 'AL:  '.str_replace('-', '/', $fecha_fin));
        
        $this->_phpexcel->getActiveSheet()->getColumnDimension('D')->setWidth(14);
        $this->_phpexcel->getActiveSheet()->SetCellValue("D".($table_position-1), 'Libro/Registro');
        $this->_phpexcel->getActiveSheet()->SetCellValue("D".($table_position-2), 'Ref. de Operación');
        
        $this->_phpexcel->getActiveSheet()->getColumnDimension('E')->setWidth(13);
        $this->_phpexcel->getActiveSheet()->SetCellValue("E".($table_position-1), 'Correlativo');
        
        $this->_phpexcel->getActiveSheet()->getColumnDimension('F')->setWidth(17.8);
        $this->_phpexcel->getActiveSheet()->SetCellValue("F".($table_position-1), 'Documento');
        
        $this->_phpexcel->getActiveSheet()->getColumnDimension('G')->setWidth(12);
        $this->_phpexcel->getActiveSheet()->SetCellValue("G".($table_position-1), 'Cuenta');
        $this->_phpexcel->getActiveSheet()->SetCellValue("G".($table_position-2), 'CC. Asoc. a la Operac.');
        
        $this->_phpexcel->getActiveSheet()->getColumnDimension('H')->setWidth(51.4);
        $this->_phpexcel->getActiveSheet()->SetCellValue("H".($table_position-1), 'Denominación');
        
        $this->_phpexcel->getActiveSheet()->getColumnDimension('I')->setWidth(13);
        $this->_phpexcel->getActiveSheet()->SetCellValue("I".($table_position-1), 'Debe');
        $this->_phpexcel->getActiveSheet()->SetCellValue("I".($table_position-2), 'Movimiento');
        
        $this->_phpexcel->getActiveSheet()->getColumnDimension('J')->setWidth(13);
        $this->_phpexcel->getActiveSheet()->SetCellValue("J".($table_position-1), 'Haber');
       
        //iteramos para los resultados    
         
        $total_debe = 0;
        $total_haber = 0;
        for($i = 0; $i<$datacount; $i++){
            //$this->_phpexcel->getActiveSheet()->getStyle('A'.$i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
            $this->_phpexcel->getActiveSheet()->SetCellValue("A".($i+$table_position), $datos[$i]['nro_operacion']);
            $this->_phpexcel->getActiveSheet()->SetCellValue("B".($i+$table_position), substr($datos[$i]['fecha'], 8, 2).'/'. substr($datos[$i]['fecha'], 5, 2).'/'. substr($datos[$i]['fecha'],0,4));
            $this->_phpexcel->getActiveSheet()->SetCellValue("C".($i+$table_position), $datos[$i]['concepto_movimiento']);
            $this->_phpexcel->getActiveSheet()->SetCellValue("D".($i+$table_position), $datos[$i]['registro']);
            //PARSEAR NUMERO CORRELATIVO HASTA LOS CARACTERES MENCIONADOS EN EL OBJETO $cantidad_caracteres DE LA SIGUIENTE LINEA
            $cantidad_caracteres = 6;
            $correlativo = '00000000'.$datos[$i]['idasiento'];
            $correlativo = substr($correlativo, (strlen($correlativo) - $cantidad_caracteres), $cantidad_caracteres);
            //
            $this->_phpexcel->getActiveSheet()->setCellValueExplicitByColumnAndRow("4"/*<=SE REFIERE A LA COLUMNA 'E'*/,($i+$table_position),$correlativo, PHPExcel_Cell_DataType::TYPE_STRING);
            $this->_phpexcel->getActiveSheet()->SetCellValue("F".($i+$table_position), $datos[$i]['nro_documento']);            
            $this->_phpexcel->getActiveSheet()->setCellValueExplicitByColumnAndRow("6"/*<=SE REFIERE A LA COLUMNA 'G'*/,($i+$table_position),$datos[$i]['nro_cuenta'], PHPExcel_Cell_DataType::TYPE_STRING);
            $this->_phpexcel->getActiveSheet()->SetCellValue("H".($i+$table_position), $datos[$i]['cuenta']);
            $this->_phpexcel->getActiveSheet()->SetCellValue("I".($i+$table_position), $datos[$i]['debe']);          
            $this->_phpexcel->getActiveSheet()->SetCellValue("J".($i+$table_position), $datos[$i]['haber']);
            
            $total_debe = $total_debe + $datos[$i]['debe'];
            $total_haber = $total_haber + $datos[$i]['haber'];
        }
        $this->_phpexcel->getActiveSheet()->SetCellValue("H".($table_position+$datacount), 'TOTALES');        
        $this->_phpexcel->getActiveSheet()->SetCellValue("I".($table_position+$datacount), $total_haber);        
        $this->_phpexcel->getActiveSheet()->SetCellValue("J".($table_position+$datacount), $total_haber);
        
        /*FORMATEAR ALINEACION*/
        $this->_phpexcel->getActiveSheet()->getStyle('G'.$table_position)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->_phpexcel->getActiveSheet()->getStyle('G'.$table_position)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $this->_phpexcel->getActiveSheet()->duplicateStyle( $this->_phpexcel->getActiveSheet()->getStyle('G'.$table_position), 'G'.$table_position.':G'.($table_position+$datacount));
        
        $this->_phpexcel->getActiveSheet()->getStyle("A".($table_position-2))->getFont()->setBold(true);
        $this->_phpexcel->getActiveSheet()->duplicateStyle( $this->_phpexcel->getActiveSheet()->getStyle("A".($table_position-2)), "A".($table_position-6).":A".($table_position-3));
        $this->_phpexcel->getActiveSheet()->getStyle("A".($table_position-2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->_phpexcel->getActiveSheet()->getStyle("A".($table_position-2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $styleArray = array('borders' => array('outline' => array('style' => PHPExcel_Style_Border::BORDER_THICK, 'color' => array('argb' => '00000000'),),),);
        $this->_phpexcel->getActiveSheet()->getStyle("A".($table_position-2))->applyFromArray($styleArray);
        $this->_phpexcel->getActiveSheet()->duplicateStyle( $this->_phpexcel->getActiveSheet()->getStyle("A".($table_position-2)), "A".($table_position-2).":J".($table_position-1));
        
        /*COMBINAR CELDAS CABECERA*/
        $this->_phpexcel->getActiveSheet()->mergeCells("A".($table_position-2).":A".($table_position-1));
        $this->_phpexcel->getActiveSheet()->mergeCells("B".($table_position-2).":B".($table_position-1));
        $this->_phpexcel->getActiveSheet()->mergeCells("C".($table_position-2).":C".($table_position-1));
        $this->_phpexcel->getActiveSheet()->mergeCells("D".($table_position-2).":F".($table_position-2));
        $this->_phpexcel->getActiveSheet()->mergeCells("G".($table_position-2).":H".($table_position-2));
        $this->_phpexcel->getActiveSheet()->mergeCells("I".($table_position-2).":J".($table_position-2));
         //
         //FORMATOS ESPECIALES DE CELDA
        $this->_phpexcel->getActiveSheet()->getStyle('I'.$table_position)->getNumberFormat()->setFormatCode('#,##0.00');
        $this->_phpexcel->getActiveSheet()->duplicateStyle( $this->_phpexcel->getActiveSheet()->getStyle('I'.$table_position), 'I'.$table_position.':I'.($table_position+$datacount));
        $this->_phpexcel->getActiveSheet()->duplicateStyle( $this->_phpexcel->getActiveSheet()->getStyle('I'.$table_position), 'J'.$table_position.':J'.($table_position+$datacount));

        $this->_phpexcel->getActiveSheet()->getStyle("I".($table_position+$datacount))->getFont()->setBold(true);
        $this->_phpexcel->getActiveSheet()->getStyle('I'.($table_position+$datacount))->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
        $this->_phpexcel->getActiveSheet()->getStyle('I'.($table_position+$datacount))->getFill()->getStartColor()->setARGB('FFFF0000');
        $this->_phpexcel->getActiveSheet()->duplicateStyle( $this->_phpexcel->getActiveSheet()->getStyle('I'.($table_position+$datacount)), 'A'.($table_position+$datacount).':J'.($table_position+$datacount));
        
        
        
//            $this->_phpexcel->getActiveSheet()->SetCellValue("A1", 'Escribir en A1');
            /*ANCHO DE COLUMNA
            $this->_phpexcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);  */
            /*ALTO DE FILA
            $this->_phpexcel->getActiveSheet()->getRowDimension('1')->setRowHeight(40);*/
//            $this->_phpexcel->getActiveSheet()->SetCellValue("A2", 'Escribir en A2');
//            $this->_phpexcel->getActiveSheet()->setCellValue("A3", 'Escribir en A3');
            //$this->_phpexcel->getActiveSheet()->setCellValue("E".$row["id_cli"], $row["telefono_cli"]);
            //$this->_phpexcel->getActiveSheet()->setCellValue("F".$row["id_cli"], $row["pais_cli"]);
        

        //Titulo del libro y seguridad 
        $this->_phpexcel->getActiveSheet()->setTitle('Reporte');
        $this->_phpexcel->getSecurity()->setLockWindows(true);
        $this->_phpexcel->getSecurity()->setLockStructure(true);


        // Se modifican los encabezados del HTTP para indicar que se envia un archivo de Excel.
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="reporteLibroDiario.xlsx"');
        header('Cache-Control: max-age=0');

        //Creamos el Archivo .xlsx
        $objWriter = PHPExcel_IOFactory::createWriter($this->_phpexcel, 'Excel2007');
        $objWriter->save('php://output');
        
    }
    
}

?>
