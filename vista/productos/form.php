<?php require("../cabecera.php");?>
	<form method="post" action="#">
    	<table width="50%" align="center">
        	<caption><h3>Registrar Producto</h3></caption>
            <tr>
            	<td><label>Codigo</label></td>
                <td><input type="text" readonly="readonly" class="k-textbox" /></td>
            </tr>
            <tr>
            	<td><label>Descripcion</label></td>
                <td><input type="text" class="k-textbox" placeholder="Ingrese descripcion" required /></td>
            </tr>
            <tr>
            	<td><label>Stock</label></td>
                <td><input type="text" class="k-textbox" placeholder="Ingrese stock" required /></td>
            </tr>
            <tr>
            	<td><label>Precio Unitario</label></td>
                <td><input type="text" class="k-textbox" placeholder="Ingrese precio" required /></td>
            </tr>
            <tr>
            	<td><label>Precio de Compra</label></td>
                <td><input type="text" class="k-textbox" placeholder="Ingrese precio" required /></td>
            </tr>
            <tr>
            	<td><label>Tipo de Producto</label></td>
                <td>
                	<select class="combo"  placeholder="Seleccione..." required>
                    	<option></option>
                    </select>
            	</td>
            </tr>
            <tr>
            	<td><label>Ubicacion</label></td>
                <td>
                	<select class="combo"  placeholder="Seleccione..." required>
                    	<option></option>
                    </select>
            	</td>
            </tr>
            <tr>
            	<td><label>Unidad de Medida</label></td>
                <td>
                	<select class="combo"  placeholder="Seleccione..." required>
                    	<option></option>
                    </select>
                    <a href="../unidadmedida/" class="k-button">Nuevo</a>
            	</td>
            </tr>
            <tr>
            	<td><label>Servicio</label></td>
                <td>
                	<select class="combo"  placeholder="Seleccione..." required>
                    	<option></option>
                    </select>
            	</td>
            </tr>
            <tr>
            	<td><label>Promocion</label></td>
                <td>
                	<select class="combo"  placeholder="Seleccione..." required>
                    	<option></option>
                    </select>
            	</td>
            </tr>
            <tr>
            	<td><label>Paquete</label></td>
                <td>
                	<select class="combo"  placeholder="Seleccione..." required>
                    	<option></option>
                    </select>
            	</td>
            </tr>
            <tr>
            	<td><label>Estado</label></td>
                <td><input type="radio" name="estado"/>Activo<input type="radio" name="estado"/>Inactivo</td>
            </tr>
            <tr>
            	<td colspan="2" align="center"><button type="submit" class="k-button">Guardar</button></td>
            </tr>
        </table>
    </form>
<?php require("../pie.php"); ?>