<?php require("../cabecera.php");?>
	<form method="post" action="#">
    	<table width="50%">
        	<caption><h3>Registrar Cuota de Cobro</h3></caption>
            <tr>
            	<td>Codigo</td>
                <td><input type="text" disabled="disabled" /></td>
            </tr>
            <tr>
            	<td>Cod.Venta</td>
                <td>
                	<select>
                    	<option>Seleccione...</option>
                    </select>
            	</td>
            </tr>
            <tr>
            	<td>Monto del Cobro</td>
                <td><input type="text" /></td>
            </tr>
            <tr>
            	<td>Monto Pagado</td>
                <td><input type="text" /></td>
            </tr>
            <tr>
            	<td>Nro.de Cuotas</td>
                <td><input type="text" /></td>
            </tr>
            <tr>
            	<td>Fecha de Cobro</td>
                <td><input class="datepicker" value="" /></td>
            </tr>
            <tr>
            	<td>Fecha de Vencimiento</td>
                <td><input class="datepicker" value="" /></td>
            </tr>
            <tr>
            	<td>Interes</td>
                <td><input type="text" /></td>
            </tr>
            <tr>
            	<td colspan="2" align="center"><button type="button" class="k-button">Guardar</button></td>
            </tr>
        </table>
    </form>
<?php require("../pie.php"); ?>