	<form method="post" action="#">
    	<table width="50%" align="center">
        	<caption><h3>Registrar Ubicacion</h3></caption>
            <tr>
            	<td><label>Codigo</label></td>
                <td><input type="text" readonly="readonly" class="k-textbox" /></td>
            </tr>
            <tr>
            	<td>Descripcion</td>
                <td><input type="text" class="k-textbox" placeholder="Ingrese ubicacion" required /></td>
            </tr>
            <tr>
            	<td><label>Almacen</label></td>
                <td>
                	<select class="combo"  placeholder="Seleccione..." required>
                    	<option></option>
                    </select>
            	</td>
            </tr>
            <tr>
            	<td colspan="2" align="center"><button type="submit" class="k-button">Guardar</button></td>
            </tr>
        </table>
    </form>