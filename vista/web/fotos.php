<div id="gallery">								
<h3>Mis Fotos de Facebook</h3>
<?php
$album = 'http://www.facebook.com/media/set/?set=a.496984383669144.118773.472148372819412&type=3'; //Link del Album Cambia lo que esta entre ' '
$total = 9; //Cuantas fotos mostrar

$palabras = array('http://','https://','www.facebook.com/media/set/?set=a.');
$album = str_replace($palabras,'',$album);
$aID = explode('.',$album);
settype($aID,'array');
$aID = $aID[0]; 

$str_graph = file_get_contents('http://graph.facebook.com/'.$aID.'/photos?limit='.$total);

$datos = json_decode($str_graph,true);

$anterior = $datos["paging"]['previous'];//Estos por si los necesitas para ver las demas fotos
$siguiente = $datos["paging"]['next'];//Estos por si los necesitas para ver las demas fotos

$fotos = $datos["data"];
foreach($fotos as $index => $valor){
	$thumfoto = $valor['images'][5]['source'];
	$foto = $valor['source'];
	$link = $valor['link'];
	$descripcion =  $valor['name'];
	$descarga = $valor['images'][0]['source'].'?dl=1';//La mejor Calidad
	//Tu decides como mostrar, arriba tienes los valores necesarios.
	echo  '<a href="'.$descarga.'"><img width="200" height="200" src="'.$thumfoto.'" title="'.str_replace(array('"'),'',utf8_decode($descripcion)).'" ></a>&nbsp;';
}
//echo '<pre>';
//print_r($fotos);
//echo '</pre>';
?>
</div>