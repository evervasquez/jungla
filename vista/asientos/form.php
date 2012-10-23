<?php require("../cabecera.php");?>
	<form method="post" action="#">
    	<table width="50%">
        	<caption><h3>Registrar Asiento</h3></caption>
            <tr>
            	<td><label>Codigo</label></td>
                <td><input type="text" class="k-textbox" readonly="readonly" /></td>
            </tr>
            <tr>
            	<td><label>Nro.de Asiento</label></td>
                <td><input type="text" class="k-textbox" placeholder="Ingrese Nro.de Asiento" required /></td>
            </tr>
            <tr>
            	<td>Plantilla Movimiento</td>
                <td>
                	<select class="combo" placeholder="Seleccione plantilla" required>
                    	<option></option>
                    </select>
            	</td>
            </tr>
            <tr>
            	<td><label>Glosa</label></td>
                <td><input type="text" class="k-textbox" placeholder="Ingrese Glosa" required /></td>
            </tr>
            <tr>
            	<td><label>Fecha</label></td>
                <td><input class="datepicker" value="" placeholder="Seleccion fecha" required/></td>
            </tr>
            <tr>
            	<td colspan="2" align="center"><button type="submit" class="k-button">Guardar</button></td>
            </tr>
        </table>
    </form>
<?php require("../pie.php"); ?>