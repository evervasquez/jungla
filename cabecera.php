<?php 
session_start();
require("basedatos/conexion.php");
$error="";
if(isset($_POST['usuario'])){
	$u=$_POST['usuario'];
	$c=$_POST['clave'];
	$sql="SELECT usuario,clave FROM empleados "."WHERE usuario='$u' and clave='$c'"; 
	$r=mssql_query($sql);
	if($f=mssql_fetch_array($r)){
		
		die("<script>
				alert('Ingresaste');
				window.location='vista/principal.php';
			</script>");
	}
	else{
		$error="Usuario o clave no valida";
	}
	mssql_close();
}
?>	
<!DOCTYPE HTML>
<html lang="en">
<html>
    <meta charset="utf-8">
    <head>
        <title>..::La Jungla::..</title>
        <meta name="description" content="Albergue Turistico La Jungla Tarapoto" />
        <meta name="keywords" content="jungla, tarapoto, turismo, hospedaje, selva" />
		<script type="text/javascript" src="lib/js/jquery.js"></script>
        <script type="text/javascript" src="lib/js/jqueryui.js"></script>
        <script type="text/javascript" src="lib/js/script.js"></script>
        <link rel="stylesheet" href="lib/css/estilos.css" media="all" />
        <link rel="shortcut icon" href="lib/img/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="lib/css/le-frog/jquery-ui-1.9.0.custom.css" media="all" />
    </head>
    <body id="page1">
        <div id="iniJungla">
            <header>
                <span id="logo"><img src="lib/img/logo.png" id="logoJungla"></span>
                <span id="titleJungla">
                    <h1 class="titJungla">La Jungla</h1>
                    <h2 class="subtitJungla">El &uacute;nico rinc&oacute;n de la selva en la ciudad</h2>
                </span>
                <nav id="menuNav">
                    <ul>
                        <li><a href="index.php"><img src="lib/img/inicio.png" class="icnAcceso" /><br>INICIO<br>Home</a></li>
                        <li><a href="servicios.php"><img src="lib/img/servicios.png" class="icnAcceso" /><br>SERVICIOS<br>Services</a></li>
                        <li><a href="fotos.php"><img src="lib/img/fotos.png" class="icnAcceso" /><br>FOTOS<br>Photos</a></li>
                        <li><a href="contacto.php"><img src="lib/img/contactenos.png" class="icnAcceso" /><br>CONTACTENOS<br>Contac Us</a></li>
                    </ul>
                </nav>
            </header>
            <div id="contenido">