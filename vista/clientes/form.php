<?php require("../cabecera.php");?>
	<form method="post" action="#">
    	<table width="50%">
        	<caption><h3>Registrar Cliente</h3></caption>
            <tr>
            	<td>Codigo</td>
                <td><input type="text" disabled="disabled" /></td>
            </tr>
            <tr>
            	<td>Nombre</td>
                <td><input type="text" /></td>
            </tr>
            <tr>
            	<td>Apellidos</td>
                <td><input type="text" /></td>
            </tr>
            <tr>
            	<td>Nro.Documento</td>
                <td><input type="text" /></td>
            </tr>
            <tr>
            	<td>Telefono</td>
                <td><input type="text" /></td>
            </tr>
            <tr>
            	<td>Email</td>
                <td><input type="email" /></td>
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
            	<td>Membresia</td>
                <td>
                	<select>
                    	<option>Seleccione...</option>
                    </select>
            	</td>
            </tr>
            <tr>
            	<td>Profesion</td>
                <td>
                	<select>
                    	<option>Seleccione...</option>
                    </select>
            	</td>
            </tr>
            <tr>
            	<td>Fecha de Nacimiento</td>
                <td><input type="date"/></td>
            </tr>
            <tr>
            	<td>Sexo</td>
                <td>
                	<input type="radio" name="sexo" />M
                    <input type="radio" name="sexo" />F
                <td>
            </tr>
            <tr>
            	<td>Estado Civil</td>
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