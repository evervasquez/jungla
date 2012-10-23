<?php require("../cabecera.php");?>
	<form method="post" action="#">
    	<table width="50%" align="center">
        	<caption><h3>Registrar Modulo</h3></caption>
            <tr>
            	<td><label>Codigo</label></td>
                <td><input type="text" readonly="readonly" class="k-textbox" /></td>
            </tr>
            <tr>
            	<td><label>Descripcion</label></td>
                <td><input type="text" class="k-textbox" placeholder="Ingrese modulo" required /></td>
            </tr>
            <tr>
            	<td><label>URL</label></td>
                <td><input type="text" class="k-textbox" placeholder="Ingrese url" required /></td>
            </tr>
            <tr>
            	<td><label>Modulo Padre</label></td>
                <td>
                	<select class="combo" placeholder="Seleccione..." required>
                    	<option></option>
                    </select>
                </td>
            </tr>
            <tr>
            	<td><label>Estado</label></td>
                <td>
                	<input type="radio" name="estado" />Activo
                    <input type="radio" name="estado" />Inactivo
                </td>
            </tr>
            <tr>
            	<td colspan="2" align="center"><button type="submit" class="k-button">Guardar</button></td>
            </tr>
        </table>
    </form>
<?php require("../pie.php"); ?>