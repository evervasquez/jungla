<?php require("../cabecera.php");?>
	<form method="post" action="#">
    	<table width="50%" align="center">
        	<caption><h3>Registrar Cuota de Pago</h3></caption>
            <tr>
            	<td>Codigo</td>
                <td><input type="text" readonly="readonly" class="k-textbox" /></td>
            </tr>
            <tr>
            	<td>Cod.Compra</td>
                <td>
                	<select class="combo" placeholder="Seleccione...">
                    	<option></option>
                    </select>
            	</td>
            </tr>
            <tr>
            	<td>Monto del Cobro</td>
                <td><input type="text" class="k-textbox" placeholder="Ingrese monto" required/></td>
            </tr>
            <tr>
            	<td>Monto Pagado</td>
                <td><input type="text" class="k-textbox" placeholder="Ingrese monto" required/></td>
            </tr>
            <tr>
            	<td>Nro.de Cuotas</td>
                <td><input type="text" class="k-textbox" placeholder="Ingrese nro.de cobros" required/></td>
            </tr>
            <tr>
            	<td>Fecha de Pago</td>
                <td><input class="datepicker" value="" placeholder="Ingrese fecha" required/></td>
            </tr>
            <tr>
            	<td>Fecha de Vencimiento</td>
                <td><input class="datepicker" value="" placeholder="Ingrese fecha" required/></td>
            </tr>
            <tr>
            	<td>Interes</td>
                <td><input type="text" class="k-textbox" placeholder="Ingrese interes" required/></td>
            </tr>
            <tr>
            	<td colspan="2" align="center"><button type="submit" class="k-button">Guardar</button></td>
            </tr>
        </table>
    </form>
<?php require("../pie.php"); ?>