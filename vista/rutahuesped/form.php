<?php require("../cabecera.php");?>
	<form method="post" action="#">
    	<table width="50%" align="center">
        	<caption><h3>Registrar Ruta del Huesped</h3></caption>
            <tr>
            	<td><label>Codigo</label></td>
                <td><input type="text" readonly="readonly" class="k-textbox" /></td>
            </tr>
            <tr>
            	<td><label>Cliente</label></td>
                <td>
                	<select class="combo"  placeholder="Seleccione..." required>
                    	<option></option>
                    </select>
                </td>
            </tr>
            <tr>
            	<td><label>Ubigeo</label></td>
                <td>
                	<select class="combo"  placeholder="Seleccione..." required>
                    	<option></option>
                    </select>
                </td>
            </tr>
            <tr>
            	<td><label>Tipo de Ruta</label></td>
                <td>
                	<select class="combo"  placeholder="Seleccione..." required>
                    	<option></option>
                    </select>
                </td>
            </tr>
            <tr>
            	<td><label>Observaciones</label></td>
                <td><textarea class="k-textbox" style="height:100px" placeholder="Ingrese las observaciones"></textarea>
            </tr>
            <tr>
            	<td colspan="2" align="center"><button type="submit" class="k-button">Guardar</button></td>
            </tr>
        </table>
    </form>
<?php require("../pie.php"); ?>