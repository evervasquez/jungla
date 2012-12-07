<div id="sliderContainer">
    <div id="mySlides">
      <div id="slide1" class="slide"> <img src="<?php echo $_params['ruta_img']; ?>jflow-sample-slide1.jpg" alt="Slide 1 jFlow Plus" />
        <div class="slideContent">
          <h3>You Asked, jFlow Delivered</h3>
          <p>It's all about the Community and giving back.  To keep with this tradition, jFlow Plus now has more of the features you want.</p>
        </div>
      </div>
      <div id="slide2" class="slide"> <img src="<?php echo $_params['ruta_img']; ?>jflow-sample-slide2.jpg" alt="Slide 2 jFlow Plus" />
        <div class="slideContent">
          <h3>W3C Valid</h3>
          <p>Are you a stickler for writing valid code?  So is jFlow.  Run this puppy through W3C's validator to see it pass the test!</p>
        </div>
      </div>
      <div id="slide3" class="slide"> <img src="<?php echo $_params['ruta_img']; ?>jflow-sample-slide3.jpg" alt="Slide 3 jFlow Plus" />
        <div class="slideContent">
          <h3>Frequent Code Updates</h3>
          <p>This slider is actively developed and used by thousands of websites.  More features coming soon including more effects and options.</p>
        </div>
      </div>
      <div id="slide4" class="slide"> <img src="<?php echo $_params['ruta_img']; ?>jflow-sample-slide4.jpg" alt="Slide 3 jFlow Plus" />
        <div class="slideContent">
          <h3>Notice the Slide Navigation?</h3>
          <p>That's a new feature.  Click on the paging buttons in the top-right to quickly jump to any jFlow slide number.</p>
        </div>
      </div>
    </div>
    <div id="myController"> 
        <span class="jFlowControl"></span> 
        <span class="jFlowControl"></span> 
        <span class="jFlowControl"></span> 
        <span class="jFlowControl"></span> 
    </div>
    <div class="jFlowPrev"></div>
    <div class="jFlowNext"></div>
  </div>
          
<table>
    <tr valign="top">
        <td width="60%">
            <div id="articulos">
                <?php if (isset($this->datos) && count($this->datos)) {?>
                <h4 class="k-widget k-header">Nuestros Articulos</h4>
                <?php for ($i = 0; $i < count($this->datos); $i++) { ?>

                <div class="article">
                    <?php if (isset ($this->datos[$i]['IMAGEN']) && ($this->datos[$i]['IMAGEN'] != " ")){?>
                       <a rel="sexylightbox[kmx]" href="<?php echo $_params['ruta_img']?>articulos/<?php echo $this->datos[$i]['IMAGEN'] ?>" title="<?php echo $this->datos[$i]['TITULOS'] ?>">
                            <img src="<?php echo $_params['ruta_img']?>articulos/thumb/thumb_<?php echo $this->datos[$i]['IMAGEN'] ?>" class="fotoArt" />
                        </a>
                        <?php } ?>
                    <span class="contArt">
                        <h3><?php echo $this->datos[$i]['TITULO'] ?></h3>
                        <p><?php echo $this->datos[$i]['DESCRIPCION'] ?></p>
                    </span>
                </div>
                <?php }} ?>
            </div>
        </td>
        <td align="center">
            <span id="position">
                <?php if (isset($this->datos_jungla) && count($this->datos_jungla)) {?>
                <ul id="panelbar">
                    <li class="k-state-active">
                        <span class="k-link k-state-selected">¿Qui&eacute;nes somos?</span>
                        <div style="padding: 10px;">
                            <p><?php echo $this->datos_jungla[0]['PRESENTACION'] ?></p>
                        </div>
                    </li>
                    <li>
                        <span>Misi&oacute;n</span>
                        <div style="padding: 10px;">
                            <p><?php echo $this->datos_jungla[0]['MISION'] ?></p>
<!--                            <p>Somos una empresa que pretende ser una alternativa en cuanto a servicio de hospedaje,
con alto nivel de calidad de servicio, seguridad y tranquilidad.</p>-->
                        </div>
                    </li>
                    <li>
                        <span>Visi&oacute;n</span>
                        <div style="padding: 10px;">
                            <p><?php echo $this->datos_jungla[0]['VISION'] ?></p>
<!--                            <p>Ser una empresa líder a nivel de servicios turísticos de calidad, confort, reconocida dentro de la línea de albergue turístico</p>-->
                        </div>
                    </li>
                </ul>
                <?php } ?>
            </span>
            <div class="iframe">
                <h4 class="k-widget k-header">Nuestro video en YouTube</h4>
                <iframe width="420" height="315" src="http://www.youtube.com/embed/3a0iGZ-IOSA" frameborder="0" allowfullscreen></iframe>
            </div>
        </td>
    </tr>
</table>
                    