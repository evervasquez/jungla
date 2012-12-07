<?php
$chart = new Highchart();

$chart->chart->renderTo = "container";
$chart->chart->plotBackgroundColor = null;
$chart->chart->plotBorderWidth = null;
$chart->chart->plotShadow = false;
$chart->title->text = "Porcetanje de Pasajeros en el Albergue Turistico La Jungla";

$chart->tooltip->formatter = new HighchartJsExpr("function() {
    return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';}");

$chart->plotOptions->pie->allowPointSelect = 1;
$chart->plotOptions->pie->cursor = "pointer";
$chart->plotOptions->pie->dataLabels->enabled = 1;
$chart->plotOptions->pie->dataLabels->color = "#000000";
$chart->plotOptions->pie->dataLabels->connectorColor = "#000000";
$chart->plotOptions->pie->showInLegend = 1;

$chart->plotOptions->pie->dataLabels->formatter = new HighchartJsExpr("function() {
    return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %'; }");

$chart->series[] = array('type' => "pie",
                         'name' => "Browser share",
                         'data' => array(array("Nacionales",(float)$this->datos[0]['NACIONALES']),
                                         array("Internacionales",(float)$this->datos[0]['INTERNACIONALES'])
                                         /*array('name' => 'Chrome',
                                               'y' => 12.8,
                                               'sliced' => true,
                                               'selected' => true),
                                         array("Safari", 8.5),
                                         array("Opera", 6.2),
                                         array("Others", 0.7)*/));
?>

<html>
  <head>
    <title>Pasajeros</title>
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