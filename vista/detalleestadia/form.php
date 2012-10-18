<?php require("../cabecera.php");?>
	<form method="post" action="#">
    	<table width="50%">
        	<caption><h3>Registrar Ruta del Huesped</h3></caption>
            <tr>
            	<td>Codigo</td>
                <td><input type="text" disabled="disabled" /></td>
            </tr>
            <tr>
            	<td>Cliente</td>
                <td>
                	<select>
                    	<option>Seleccione...</option>
                    </select>
                </td>
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
            	<td>Tipo de Ruta</td>
                <td>
                	<select>
                    	<option>Seleccione...</option>
                    </select>
                </td>
            </tr>
            <tr>
            	<td colspan="2" align="center"><button type="button" class="k-button">Guardar</button></td>
            </tr>
        </table>
    </form>
<?php require("../pie.php"); ?>