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
        $cabeceras = array('idasiento', 'fecha','concepto_movimiento','registro','nro_correlativo','nro_documento','nro_cuenta','cuenta','debe','haber','nro_operacion');
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
                //algunos datos sobre autoría
        $this->_phpexcel->getProperties()->setCreator("LaJungla");
        $this->_phpexcel->getProperties()->setLastModifiedBy("La Jungla");
        $this->_phpexcel->getProperties()->setTitle("Libro Diario - La Jungla");
        $this->_phpexcel->getProperties()->setSubject("Reportes Contables");
        $this->_phpexcel->getProperties()->setDescription("Reporte de Libro Diario perteneciente a La Jungla");

        //Trabajamos con la hoja activa principal denominacion, cuenta, glosa, debe y haber
        $this->_phpexcel->setActiveSheetIndex(0);

        //20 EN WIDTH ES 140 EN EL ANCHO VALOR DE EXCEL
        //ANCHO Y ENCABEZADO DE LAS COLUMNAS
        $this->_phpexcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
        $this->_phpexcel->getActiveSheet()->SetCellValue("A1", 'Nro. de Operacion');
        
        $this->_phpexcel->getActiveSheet()->getColumnDimension('B')->setWidth(13);
        $this->_phpexcel->getActiveSheet()->SetCellValue("B1", 'Fecha');
        
        $this->_phpexcel->getActiveSheet()->getColumnDimension('C')->setWidth(34.3);
        $this->_phpexcel->getActiveSheet()->SetCellValue("C1", 'Glosa');
        
        $this->_phpexcel->getActiveSheet()->getColumnDimension('D')->setWidth(14);
        $this->_phpexcel->getActiveSheet()->SetCellValue("D2", 'Libro/Registro');
        $this->_phpexcel->getActiveSheet()->SetCellValue("D1", 'Ref. de Operación');
        
        $this->_phpexcel->getActiveSheet()->getColumnDimension('E')->setWidth(13);
        $this->_phpexcel->getActiveSheet()->SetCellValue("E2", 'Correlativo');
        
        $this->_phpexcel->getActiveSheet()->getColumnDimension('F')->setWidth(17.8);
        $this->_phpexcel->getActiveSheet()->SetCellValue("F2", 'Documento');
        
        $this->_phpexcel->getActiveSheet()->getColumnDimension('G')->setWidth(12);
        $this->_phpexcel->getActiveSheet()->SetCellValue("G2", 'Cuenta');
        $this->_phpexcel->getActiveSheet()->SetCellValue("G1", 'CC. Asoc. a la Operac.');
        
        $this->_phpexcel->getActiveSheet()->getColumnDimension('H')->setWidth(51.4);
        $this->_phpexcel->getActiveSheet()->SetCellValue("H2", 'Denominación');
        
        $this->_phpexcel->getActiveSheet()->getColumnDimension('I')->setWidth(13);
        $this->_phpexcel->getActiveSheet()->SetCellValue("I2", 'Debe');
        $this->_phpexcel->getActiveSheet()->SetCellValue("I1", 'Movimiento');
        
        $this->_phpexcel->getActiveSheet()->getColumnDimension('J')->setWidth(13);
        $this->_phpexcel->getActiveSheet()->SetCellValue("J2", 'Haber');
        
        //iteramos para los resultados    
        $table_position = 3; //fila en la que se inicia la tabla
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
            
        }
        /*FORMATEAR ALINEACION*/
        $this->_phpexcel->getActiveSheet()->getStyle('G'.$table_position)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->_phpexcel->getActiveSheet()->duplicateStyle( $this->_phpexcel->getActiveSheet()->getStyle('G'.$table_position), 'G'.$table_position.':G'.($table_position+$datacount));
        $this->_phpexcel->getActiveSheet()->getStyle('G'.$table_position)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        
        /*COMBINAR CELDAS CABECERA*/
        $this->_phpexcel->getActiveSheet()->mergeCells('A1:A2');
        $this->_phpexcel->getActiveSheet()->mergeCells('B1:B2');
        $this->_phpexcel->getActiveSheet()->mergeCells('C1:C2');
        $this->_phpexcel->getActiveSheet()->mergeCells('D1:F1');
        $this->_phpexcel->getActiveSheet()->mergeCells('G1:H1');
        $this->_phpexcel->getActiveSheet()->mergeCells('I1:J1');
         //
         //FORMATOS ESPECIALES DE CELDA
        $this->_phpexcel->getActiveSheet()->getStyle('I'.$table_position)->getNumberFormat()->setFormatCode('#,##0.00');
        $this->_phpexcel->getActiveSheet()->duplicateStyle( $this->_phpexcel->getActiveSheet()->getStyle('I'.$table_position), 'I'.$table_position.':I'.($table_position+$datacount));
        $this->_phpexcel->getActiveSheet()->duplicateStyle( $this->_phpexcel->getActiveSheet()->getStyle('I'.$table_position), 'J'.$table_position.':J'.($table_position+$datacount));
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
        header('Content-Disposition: attachment;filename="reporteClientes.xlsx"');
        header('Cache-Control: max-age=0');

        //Creamos el Archivo .xlsx
        $objWriter = PHPExcel_IOFactory::createWriter($this->_phpexcel, 'Excel2007');
        $objWriter->save('php://output');
        
    }
    
}

?>
