<?php

$chart = new Highchart();

$chart->chart->renderTo = "container";
$chart->chart->type = "column";
$chart->chart->margin = array(50, 50, 100, 80);
$chart->title->text = "Grafico Del Total de Pasajeros Por Mes";

$chart->xAxis->categories = array('Enero','Febrero','Marzo','Abril','Mayo',
                                  'Junio','Julio','Agosto', 'Septiembre','Octubre',
                                  'Noviembre','Diciembre');

$chart->xAxis->labels->rotation = -35;
$chart->xAxis->labels->align = "right";
$chart->xAxis->labels->style->font = "normal 12px consola, sans-serif";
$chart->yAxis->min = 0;
$chart->yAxis->title->text = "Pasajeros (unidades)";
$chart->legend->enabled = true;

$chart->tooltip->formatter = new HighchartJsExpr("function() {
    return '<b>'+ this.x +'</b><br/>'+
    'Pasajeros Totales: '+ Highcharts.numberFormat(this.y, 2) +
    ' ';}");
$a=(int)$this->datos[0]['XCANTIDAD'];
$chart->series[] = array('name' => 'Cantidad de Pasajeros',
    
                         'data' => array((int)$this->datos[0]['XCANTIDAD'], (int)$this->datos[1]['XCANTIDAD'], (int)$this->datos[2]['XCANTIDAD'], (int)$this->datos[3]['XCANTIDAD'], (int)$this->datos[4]['XCANTIDAD'], 
                                            (int)$this->datos[5]['XCANTIDAD'], (int)$this->datos[6]['XCANTIDAD'], (int)$this->datos[7]['XCANTIDAD'], (int)$this->datos[8]['XCANTIDAD'],
                                         (int)$this->datos[9]['XCANTIDAD'], (int)$this->datos[10]['XCANTIDAD'], (int)$this->datos[11]['XCANTIDAD']),
    //letra
                         'dataLabels' => array('enabled' => true,
                                               'rotation' => -90,
                                               'color' => '#FFFFFF',
                                               'align' => 'right',
                                               'x' => 3,
                                               'y' => 10,
                                               'formatter' => new HighchartJsExpr("function() {
                                                  return this.y;}"),
                                               'style' => array('font' => 'normal 12px Verdana, sans-serif')));
?>

<html>
  <head>
    <title>Column with rotated labels</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <?php
      foreach ($chart->getScripts() as $script) {
         echo '<script type="text/javascript" src="' . $script . '"></script>';
      }
    ?>
  </head>
  <body>
    <div id="container"></div>
    <script type="text/javascript">
    <?php
      echo $chart->render("chart1");
    ?>
    </script>
  </body>
</html>