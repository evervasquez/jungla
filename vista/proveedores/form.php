<?php require("../cabecera.php");?>
	<form method="post" action="#">
    	<table width="50%" align="center">
        	<caption><h3>Registrar Proveedor</h3></caption>
            <tr>
            	<td><label>Codigo</label></td>
                <td><input type="text" readonly="readonly" class="k-textbox" /></td>
            </tr>
            <tr>
            	<td><label>Razon Social</label></td>
                <td><input type="text" class="k-textbox" placeholder="Ingrese razon social" required /></td>
            </tr>
            <tr>
            	<td><label>RUC</label></td>
                <td><input type="text" class="k-textbox" placeholder="Ingrese razon social" required /></td>
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
            	<td><label>Direccion</label></td>
                <td><input type="text" class="k-textbox" placeholder="Ingrese direccion" required /></td>
            </tr>
            <tr>
            	<td><label>Representante</label></td>
                <td><input type="text" class="k-textbox" placeholder="Ingrese nombre representante" required /></td>
            </tr>
            <tr>
            	<td><label>Telefono</label></td>
                <td><input type="text" class="k-textbox" placeholder="Ingrese numero telefonico" required /></td>
            </tr>
            <tr>
            	<td><label>Email</label></td>
                <td><input type="text" class="k-textbox" placeholder="Ingrese email" required /></td>
            </tr>
            <tr>
            	<td colspan="2" align="center"><button type="submit" class="k-button">Guardar</button></td>
            </tr>
        </table>
    </form>
<?php require("../pie.php"); ?>