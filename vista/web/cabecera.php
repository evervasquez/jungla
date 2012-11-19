<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>La Jungla</title>
        <meta name="description" content="Albergue Turistico La Jungla Tarapoto" />
        <meta name="keywords" content="jungla, tarapoto, turismo, hospedaje, selva" />
	
        <link rel="shortcut icon" href="<?php echo BASE_URL?>lib/img/favicon.ico" type="image/x-icon" />
        <script type="text/javascript" src="<?php echo $_params['ruta_js']; ?>jquery.min.js"></script>
        
        <!-- compartir-->
        <script type="text/javascript">var switchTo5x=true;</script>
        <script type="text/javascript" src="<?php echo $_params['ruta_js']; ?>buttons.js"></script>
        <script type="text/javascript">stLight.options({publisher: "658251a0-6222-4f0c-a9c3-235584b8e73a"});</script>
        
        <!--facebook-->
        <script type="text/javascript">
            jQuery.noConflict();jQuery(function (){jQuery(".slide_likebox").hover(function(){jQuery(".slide_likebox").stop(true, false).animate({right:"0"},"medium");},
                function(){jQuery(".slide_likebox").stop(true, false).animate({right:"-250"},"medium");},500);return false;});
        </script>
        <link rel="stylesheet" href="<?php echo $_params['ruta_css']; ?>fanbox.css" type="text/css" media="screen">
        <div class="slide_likebox">    
            <div style="color: rgb(255, 255, 255); padding: 8px 5px 0pt 50px;"> 
                <div class='likeboxwrap'> 
                    <span>
                        <iframe src="http://www.facebook.com/plugins/likebox.php?href=http://www.facebook.com/lajungla.tarapoto&amp;width=238&amp;colorscheme=light&amp;connections=15&amp;stream=false&amp;header=false&amp;height=350" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:228px; height:320px;">
                        </iframe>
                    </span>        
                </div>    
            </div>
        </div>	
            
        <script type="text/javascript" src="<?php echo $_params['ruta_js']; ?>jquery.js"></script>
        <script type="text/javascript" src="<?php echo $_params['ruta_js']; ?>funcionesweb.js"></script>
        <script type="text/javascript" src="<?php echo $_params['ruta_js']; ?>kendo.web.min.js"></script>
        <link href="<?php echo $_params['ruta_css']; ?>styles/kendo.common.min.css" media="screen" rel="stylesheet" type="text/css" />
        <link href="<?php echo $_params['ruta_css']; ?>styles/kendo.black.min.css" media="screen" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="<?php echo $_params['ruta_css']; ?>estilosweb.css" media="all" />
        <script type="text/javascript" src="<?php echo $_params['ruta_js']; ?>jflow.plus.min.js"></script>
	<link href="<?php echo $_params['ruta_css']; ?>jflow.style.css" type="text/css" media="all" rel="stylesheet" />
    	
        <?php if(isset($_params['js']) && count($_params['js'])): ?>
        <?php for($i=0; $i < count($_params['js']); $i++): ?>
        
        <script src="<?php echo $_params['js'][$i] ?>" type="text/javascript"></script>
        
        <?php endfor; ?>
        <?php endif; ?>
        
        <?php if(isset($_params['css']) && count($_params['css'])): ?>
        <?php for($i=0; $i < count($_params['css']); $i++): ?>
        
        <link href="<?php echo $_params['css'][$i] ?>" type="text/css" rel="stylesheet" media="screen" />
        
        <?php endfor; ?>
        <?php endif; ?>
        
    </head>
    <body>
        <div id="main">
            <div id="header">
                <span id="logo"><img src="<?php echo BASE_URL?>lib/img/logoweb.png" id="logoJungla"></span>
                <span id="titleJungla">
                    <h1 class="titJungla">LA JUNGLA</h1>
                    <h2 class="subtitJungla">El &uacute;nico rinc&oacute;n de la selva en la ciudad</h2>
                </span>
            </div>
            <div id="sesion">
                <form method="post" action="<?php echo BASE_URL?>login" id="login">
                    <table>
                        <tr valign="top">
                            <td>
                                <label></label>
                            </td>
                            <td>
                                <input type="text" required placeholder="Usuario" name="usuario" class="k-textbox" validationMessage="Ingrese Usuario ↑"/>
                                <br><span class="k-invalid-msg msgerror" data-for="usuario"></span>
                            </td>
                            <td>
                                <input type="password" required placeholder="Clave" name="clave" class="k-textbox" validationMessage="Ingrese Clave ↑"/>
                                <br><span class="k-invalid-msg msgerror" data-for="clave"></span>
                            </td>
                            <td>
                                <button type="submit" class="k-button">Ingresar</button>
                            </td>
                        </tr>
                    </table>
                </form>
                <div>
                    <span class='st_fblike_large' displayText='Facebook Like'></span>
                    <span class='st_facebook_large' displayText='Facebook'></span>
                    <span class='st_twitter_large' displayText='Tweet'></span>
                    <span class='st_googleplus_large' displayText='Google +'></span>
                    <span class='st_blogger_large' displayText='Blogger'></span>
                    <span class='st_messenger_large' displayText='Messenger'></span>
                    <span class='st_linkedin_large' displayText='LinkedIn'></span>
                    <span class='st_email_large' displayText='Email'></span>
                </div>
            </div>
            <nav id="menuNav">
                <ul id="menu">
                    <li><a href="<?php echo BASE_URL ?>"><label>INICIO</label><br>Home</a></li>
                    <li><a href="<?php echo BASE_URL ?>web/servicios"><label>SERVICIOS</label><br>Services</a></li>
                    <li><a href="<?php echo BASE_URL ?>web/fotos"><label>FOTOS</label><br>Photos</a></li>
                    <li><a href="<?php echo BASE_URL ?>web/contactenos"><label>CONTACTENOS</label><br>Contac Us</a></li>
                </ul>
            </nav>
            <div id="contenido">