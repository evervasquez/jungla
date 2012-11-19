<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>La Jungla</title>
        <meta name="description" content="Albergue Turistico La Jungla Tarapoto" />
        <meta name="keywords" content="jungla, tarapoto, turismo, hospedaje, selva" />

        <link rel="shortcut icon" href="<?php echo BASE_URL?>lib/img/favicon.ico" type="image/x-icon" />		
        <script type="text/javascript" src="<?php echo $_params['ruta_js']; ?>jquery.js"></script>
        <script type="text/javascript" src="<?php echo $_params['ruta_js']; ?>jquery.min.js"></script>
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
                <form method="post" action="<?php echo BASE_URL?>" id="login">
                    <table>
                        <tr>
                            <td>
                                <input type="text" required placeholder="Usuario" name="usuario" class="k-textbox" style="width:120px"/>
                            </td>
                            <td>
                                <input type="password" required placeholder="Clave" name="clave" class="k-textbox" style="width:120px"/>
                            </td>
                            <td>
                                <button type="submit" class="k-button">Ingresar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="k-invalid-msg msgerror" data-for="usuario"></span>
                            </td>
                            <td>
                                <span class="k-invalid-msg msgerror" data-for="clave"></span>
                            </td>
                            <td></td>
                        </tr>
                    </table>
                </form>
                <div>
                    <a href="http://www.facebook.com/" class="normaltip" title="Siguenos en Facebook"><img src="<?php echo $_params['ruta_img']; ?>fb.jpg" alt=""></a>
                </div>
            </div>
            <nav id="menuNav">
                <ul id="menu">
                    <li><a href="<?php echo BASE_URL ?>web/"><label>INICIO</label><br>Home</a></li>
                    <li><a href="<?php echo BASE_URL ?>web/servicios"><label>SERVICIOS</label><br>Services</a></li>
                    <li><a href="<?php echo BASE_URL ?>web/fotos"><label>FOTOS</label><br>Photos</a></li>
                    <li><a href="<?php echo BASE_URL ?>web/contactenos"><label>CONTACTENOS</label><br>Contac Us</a></li>
                </ul>
            </nav>
            <div id="contenido">