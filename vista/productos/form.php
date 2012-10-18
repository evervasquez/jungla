<?php require("../cabecera.php");?>
	<form method="post" action="#">
    	<table width="50%">
        	<caption><h3>Registrar Producto</h3></caption>
            <tr>
            	<td>Codigo</td>
                <td><input type="text" disabled="disabled" /></td>
            </tr>
            <tr>
            	<td>Descripcion</td>
                <td><input type="text" /></td>
            </tr>
            <tr>
            	<td>Stock</td>
                <td><input type="text" /></td>
            </tr>
            <tr>
            	<td>Precio Unitario</td>
                <td><input type="text" /></td>
            </tr>
            <tr>
            	<td>Precio de Compra</td>
                <td><input type="text" /></td>
            </tr>
            <tr>
            	<td>Tipo de Producto</td>
                <td>
                	<select>
                    	<option>Seleccione...</option>
                    </select>
            	</td>
            </tr>
            <tr>
            	<td>Ubicacion</td>
                <td>
                	<select>
                    	<option>Seleccione...</option>
                    </select>
            	</td>
            </tr>
            <tr>
            	<td>Unidad de Medida</td>
                <td>
                	<select>
                    	<option>Seleccione...</option>
                    </select>
                    <a href="../unidadmedida/" class="k-button">Nuevo</a>
            	</td>
            </tr>
            <tr>
            	<td>Servicio</td>
                <td>
                	<select>
                    	<option>Seleccione...</option>
                    </select>
            	</td>
            </tr>
            <tr>
            	<td>Promocion</td>
                <td>
                	<select>
                    	<option>Seleccione...</option>
                    </select>
            	</td>
            </tr>
            <tr>
            	<td>Paquete</td>
                <td>
                	<select>
                    	<option>Seleccione...</option>
                    </select>
            	</td>
            </tr>
            <tr>
            	<td>Estado</td>
                <td><input type="radio" name="estado"/>Activo<input type="radio" name="estado"/>Inactivo</td>
            </tr>
            <tr>
            	<td colspan="2" align="center"><button type="button" class="k-button">Guardar</button></td>
            </tr>
        </table>
    </form>
<?php require("../pie.php"); ?>