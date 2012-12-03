<div id="gallery">
<?php 
    $divfotos = '';
    include("fb.php");
    $listafotos =  fb_albums('472148372819412');
    echo "<h1>Galería</h1>";
    foreach($listafotos as $index => $valor){
            $galeria = file_get_contents("https://graph.facebook.com/".$valor['ida']."/photos?limit=100");
            $galeria = json_decode($galeria);
            $fotos = $galeria->data;
            $divfotos .=
                '<ul class="scroll-pane">
                <p style="font-weight:bold;" title="'.$valor['nombre'].'">'.cortar_string ($valor['nombre'], 50).'</p>
                <p>'. $valor['total'].' fotos publicadas</p>';
                    foreach($fotos as $idfoto => $foto){
                        $divfotos .= '<span><a rel="sexylightbox[kmx]" title="Foto '.($idfoto+1).' de la galería" href="'.$foto->source.'"><img class="imgfb" title="Foto '.($idfoto+1).' de la galería" src="'.$foto->picture.'" /></a></span>';
                    }
            $divfotos .='<br>
                </ul>';
    }
    echo $divfotos;
?>
</div>