<!DOCTYPE HTML>
<html lang="en">
    <meta charset="utf-8">
    <head>
        <title>La Jungla</title>
        <meta name="description" content="Albergue Turistico La Jungla Tarapoto" />
        <meta name="keywords" content="jungla, tarapoto, turismo, hospedaje, selva" />
			
        <script type="text/javascript" src="<?php echo BASE_URL?>lib/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL?>lib/js/jqueryui.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL?>lib/js/script.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL?>vista/web/js/funciones.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL?>lib/js/jquery.textshadow.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL?>lib/js/kendo.all.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL?>vista/web/js/jquery.skitter.min.js"></script>
        <link rel="stylesheet" href="<?php echo BASE_URL?>vista/web/css/estilos.css" media="all" />
        <link rel="shortcut icon" href="<?php echo BASE_URL?>lib/img/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="<?php echo BASE_URL?>lib/css/le-frog/jquery-ui-1.9.0.custom.css" media="all" />
        <link href="<?php echo BASE_URL?>vista/web/css/styles/kendo.common.min.css" media="screen" rel="stylesheet" type="text/css" />
        <link href="<?php echo BASE_URL?>vista/web/css/styles/kendo.black.min.css" media="screen" rel="stylesheet" type="text/css" />
	<link href="<?php echo BASE_URL?>vista/web/css/skitter.styles.css" type="text/css" media="all" rel="stylesheet" />
        
    </head>
    <body id="page1">
        <div id="iniJungla">
            <header>
                <span id="logo"><img src="<?php echo BASE_URL?>lib/img/logoweb.png" id="logoJungla"></span>
                <span id="titleJungla">
                    <h1 class="titJungla">LA JUNGLA</h1>
                    <h2 class="subtitJungla">El &uacute;nico rinc&oacute;n de la selva en la ciudad</h2>
                </span>
            </header>
                <div id="sesion">
                    <form method="post" action="<?php echo BASE_URL?>">
                        <div id="userSesion">
                            <input type="text" required placeholder="Usuario" class="k-textbox" style="width:120px"/>
                            <input type="password" required placeholder="Clave" class="k-textbox" style="width:120px"/>
                        </div>
                        <div>
                            <span class="error"></span>
                            <button type="submit" class="k-button">Ingresar</button>
                        </div>
                    </form>
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