<?php require("../cabecera.php");?>
	<form method="post" action="#">
    	<table width="50%">
        	<caption><h3>Registrar Promocion</h3></caption>
            <tr>
            	<td><label>Codigo</label></td>
                <td><input type="text" readonly="readonly" class="k-textbox" /></td>
            </tr>
            <tr>
            	<td><label>Descripcion</label></td>
                <td><input type="text" class="k-textbox" placeholder="Ingrese descripcion" required /></td>
            </tr>
            <tr>
            	<td><label>Descuento</label></td>
                <td><input type="text" class="k-textbox" placeholder="Ingrese descuento" required /></td>
            </tr>
            <tr>
            	<td><label>Fecha de Inicio</label></td>
                <td><input class="datepicker" value="" placeholder="Ingrese fecha" required /></td>
            </tr>
            <tr>
            	<td><label>Fecha de Finalizacion</label></td>
                <td><input class="datepicker" value="" placeholder="Ingrese fecha" required/></td>
            </tr>
            <tr>
            	<td colspan="2" align="center"><button type="submit" class="k-button">Guardar</button></td>
            </tr>
        </table>
    </form>
<?php require("../pie.php"); ?>