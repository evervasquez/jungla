<?php require("../cabecera.php");?>
	<form method="post" action="#">
    	<table width="50%">
        	<caption><h3>Registrar Plan Contable</h3></caption>
            <tr>
            	<td>Codigo</td>
                <td><input type="text" disabled="disabled" /></td>
            </tr>
            <tr>
            	<td>Nro.de Asiento</td>
                <td><input type="text" /></td>
            </tr>
            <tr>
            	<td>Descripcion</td>
                <td><input type="text" /></td>
            </tr>
            <tr>
            	<td>Nivel</td>
                <td><input type="text" /></td>
            </tr>
            <tr>
            	<td>Nro.de Asiento Padre</td>
                <td>
                	<select>
                    	<option>Seleccione...</option>
                    </select>
                </td>
            </tr>
            <tr>
            	<td>Debe</td>
                <td>
                	<input type="radio" name="DH" />Debe
                    <input type="radio" name="DH" />Haber
                </td>
            </tr>
            <tr>
            	<td colspan="2" align="center"><button type="button" class="k-button">Guardar</button></td>
            </tr>
        </table>
    </form>
<?php require("../pie.php"); ?>