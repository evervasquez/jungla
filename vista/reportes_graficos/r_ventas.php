<?php
$chart = new Highchart();
$chart->chart->renderTo = "container";
$chart->chart->type = "column";
$chart->title->text = "Ventas Mensuales de Productos y Estadias en el Albergue La Jungla";
$chart->subtitle->text = "lajungla.tarapoto.com";

$chart->xAxis->categories = array("Ene", "Feb", "Mar", "Abr", "May", "Jun",
                                  "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");

$chart->yAxis->min = 0;
$chart->yAxis->title->text = "Ventas en S/.";
$chart->legend->layout = "vertical";
$chart->legend->backgroundColor = "#FFFFFF";
$chart->legend->align = "left";
$chart->legend->verticalAlign = "top";
$chart->legend->x = 100;
$chart->legend->y = 70;
$chart->legend->floating = 1;
$chart->legend->shadow = 1;

$chart->tooltip->formatter = new HighchartJsExpr("function() {
    return '' + this.x +': S/. '+ this.y +'.00';}");

$chart->plotOptions->column->pointPadding = 0.2;
$chart->plotOptions->column->borderWidth = 0;

$chart->series[] = array('name' => "Dineron Por Estadia",
                         'data' => array((float)$this->datos[0]['cantidad'],(float)$this->datos[1]['cantidad'], 
                             (float)$this->datos[2]['cantidad'], (float)$this->datos[3]['cantidad'], 
                             (float)$this->datos[4]['cantidad'], (float)$this->datos[5]['cantidad'],
                             (float)$this->datos[6]['cantidad'], (float)$this->datos[7]['cantidad'], 
                             (float)$this->datos[8]['cantidad'], (float)$this->datos[9]['cantidad'], 
                             (float)$this->datos[10]['cantidad'], (float)$this->datos[11]['cantidad']));

$chart->series[] = array('name' => "Dinero Por Ventas de Productos",
                         'data' => array((float)$this->datos[12]['cantidad'],(float)$this->datos[13]['cantidad'], 
                             (float)$this->datos[14]['cantidad'], (float)$this->datos[15]['cantidad'], 
                             (float)$this->datos[16]['cantidad'], (float)$this->datos[17]['cantidad'],
                             (float)$this->datos[18]['cantidad'], (float)$this->datos[19]['cantidad'], 
                             (float)$this->datos[20]['cantidad'], (float)$this->datos[21]['cantidad'], 
                             (float)$this->datos[22]['cantidad'], (float)$this->datos[23]['cantidad']));
/*
$chart->series[] = array('name' => "London",
                         'data' => array(48.9, 38.8, 39.3, 41.4, 47.0, 48.3,
                                         59.0, 59.6, 52.4, 65.2, 59.3, 51.2));

$chart->series[] = array('name' => "Berlin",
                         'data' => array(42.4, 33.2, 34.5, 39.7, 52.6, 75.5,
                                         57.4, 60.4, 47.6, 39.1, 46.8, 51.1));*/

?>

<html>
  <head>
    <title>Ventas</title>
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
