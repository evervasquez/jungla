<?php require("../cabecera.php");?>
	<form method="post" action="#">
    	<table width="50%">
        	<caption><h3>Registrar Cuota de Pago</h3></caption>
            <tr>
            	<td>Codigo</td>
                <td><input type="text" disabled="disabled" /></td>
            </tr>
            <tr>
            	<td>Cod.Compra</td>
                <td>
                	<select>
                    	<option>Seleccione...</option>
                    </select>
            	</td>
            </tr>
            <tr>
            	<td>Monto de la Cuota</td>
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
            	<td>Fecha de Pago</td>
                <td><input type="date" /></td>
            </tr>
            <tr>
            	<td>Fecha de Vencimiento</td>
                <td><input type="date" /></td>
            </tr>
            <tr>
            	<td>Mora</td>
                <td><input type="text" /></td>
            </tr>
            <tr>
            	<td colspan="2" align="center"><button type="button" class="k-button">Guardar</button></td>
            </tr>
        </table>
    </form>
<?php require("../pie.php"); ?>