<?php require("../cabecera.php");?>
	<form method="post" action="#">
    	<table width="50%">
        	<caption><h3>Registrar Empleado</h3></caption>
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
            	<td>DNI</td>
                <td><input type="text" /></td>
            </tr>
            <tr>
            	<td>Telefono</td>
                <td><input type="text" /></td>
            </tr>
            <tr>
            	<td>Direccion</td>
                <td><input type="text" /></td>
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
            	<td>Profesion</td>
                <td>
                	<select>
                    	<option>Seleccione...</option>
                    </select>
            	</td>
            </tr>
            <tr>
            	<td>Fecha de Nacimiento</td>
                <td><input type="text" id="calendario" /><span id="background"><div id="calendar"></div></span></td>
            </tr>
            <tr>
            	<td>Fecha de Contratacion</td>
                <td><input id="datepicker" value=""/></td>
            </tr>
            <tr>
            	<td>Perfil</td>
                <td>
                	<select>
                    	<option>Seleccione...</option>
                    </select>
            	</td>
            </tr>
            <tr>
            	<td>Usuario</td>
                <td><input type="text" /></td>
            </tr>
            <tr>
            	<td>Clave</td>
                <td><input type="password" /></td>
            </tr>
            <tr>
            	<td>Estado</td>
                <td>
                	<input type="radio" name="estado" />Activo
                    <input type="radio" name="estado" />Inactivo
                </td>
            </tr>
            <tr>
            	<td colspan="2" align="center"><button type="button" class="k-button">Guardar</button></td>
            </tr>
        </table>
    </form>
<?php require("../pie.php"); ?>