<?php require("../cabecera.php");?>
	<form method="post" action="#">
    	<table width="50%" align="center">
        	<caption><h3>Registrar Plan Contable</h3></caption>
            <tr>
            	<td><label>Codigo</label></td>
                <td><input type="text" readonly="readonly" class="k-textbox" /></td>
            </tr>
            <tr>
            	<td><label>Descripcion</label></td>
                <td><input type="text" class="k-textbox" placeholder="Ingrese decripcion" required /></td>
            </tr>
            <tr>
            	<td><label>Nro.de Cuenta</label></td>
                <td><input type="text" class="k-textbox" placeholder="Ingrese Nro.de Cuenta" required /></td>
            </tr>
            <tr>
            	<td><label>Nivel</label></td>
                <td><input type="text" class="k-textbox" placeholder="Ingrese nivel" required /></td>
            </tr>
            <tr>
            	<td><label>Movimiento</label></td>
                <td>
                	<input type="radio" name="DH" />Debe
                    <input type="radio" name="DH" />Haber
                </td>
            </tr>
            <tr>
            	<td><label>Nro.Cuenta Padre</label></td>
                <td>
                	<select class="combo" placeholder="Seleccione...">
                    	<option></option>
                    </select>
                </td>
            </tr>
            <tr>
            	<td><label>Categoria</label></td>
                <td>
                	<select class="combo" placeholder="Seleccione...">
                    	<option></option>
                    </select>
                </td>
            </tr>
            <tr>
            	<td colspan="2" align="center"><button type="button" class="k-button">Guardar</button></td>
            </tr>
        </table>
    </form>
<?php require("../pie.php"); ?>