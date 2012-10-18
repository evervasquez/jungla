<?php require("cabecera.php"); ?>
	<div id="contacto">
    	<form action="#" method="post" id="frmContacto">
        	<h1 id="titleContacto">Contacto</h1>
        	<table align="center">
            	<tr>
                	<td><label class="txtCont">Nombre</label></td>
                    <td><input type="text" id="nombreContacto" class="inpCont" required></td>
                </tr>
                <tr>
                	<td><label class="txtCont">E-mail</label></td>
                    <td><input type="email" id="emailContacto" class="inpCont" required></td>
                </tr>
                <tr>
                	<td><label class="txtCont">Tel&eacute;fono</label></td>
                    <td><input type="text" id="telefonoContacto" class="inpCont" required></td>
                <tr>
                	<td><label class="txtCont">Mensaje</label></td>
                    <td><textarea id="mensajeContacto" style="height:100px;" class="inpCont" required/></textarea></td>
                </tr>
                <tr align="center">
                	<td colspan="2">
                    <input type="submit" class="boton" value="Enviar"/>
                    <button type="reset" class="boton">Limpiar</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
<?php require("pie.php"); ?>