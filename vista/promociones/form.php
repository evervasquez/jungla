<?php require("../cabecera.php");?>
	<form method="post" action="#">
    	<table width="50%">
        	<caption><h3>Registrar Promocion</h3></caption>
            <tr>
            	<td>Codigo</td>
                <td><input type="text" disabled="disabled" /></td>
            </tr>
            <tr>
            	<td>Descripcion</td>
                <td><input type="text" /></td>
            </tr>
            <tr>
            	<td>Descuento</td>
                <td><input type="text" /></td>
            </tr>
            <tr>
            	<td>Fecha de Inicio</td>
                <td><input class="datepicker" value="" /></td>
            </tr>
            <tr>
            	<td>Fecha de Finalizacion</td>
                <td><input class="datepicker" value="" /></td>
            </tr>
            <tr>
            	<td colspan="2" align="center"><button type="button" class="k-button">Guardar</button></td>
            </tr>
        </table>
    </form>
<?php require("../pie.php"); ?>