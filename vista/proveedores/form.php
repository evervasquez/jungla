<?php require("../cabecera.php");?>
	<form method="post" action="#">
    	<table width="50%">
        	<caption><h3>Registrar Proveedor</h3></caption>
            <tr>
            	<td>Codigo</td>
                <td><input type="text" disabled="disabled" /></td>
            </tr>
            <tr>
            	<td>Razon Social</td>
                <td><input type="text" /></td>
            </tr>
            <tr>
            	<td>Ubigeo</td>
                <td>
                	<select>
                    	<option>Seleccione...</option>
                    </select>
            	</td>
            </tr>
            <tr>
            	<td>Direccion</td>
                <td><input type="text" /></td>
            </tr>
            <tr>
            	<td>Representante</td>
                <td><input type="text" /></td>
            </tr>
            <tr>
            	<td>Telefono</td>
                <td><input type="text" /></td>
            </tr>
            <tr>
            	<td>Email</td>
                <td><input type="text" /></td>
            </tr>
            <tr>
            	<td colspan="2" align="center"><button type="button" class="k-button">Guardar</button></td>
            </tr>
        </table>
    </form>
<?php require("../pie.php"); ?>