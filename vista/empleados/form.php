<?php require("../cabecera.php");?>
	<form method="post" action="#">
    	<table width="50%" align="center">
        	<caption><h3>Registrar Empleado</h3></caption>
            <tr>
            	<td><label>Codigo</label></td>
                <td><input type="text" class="k-textbox" disabled="disabled" /></td>
            </tr>
            <tr>
            	<td><label>Nombre</label></td>
                <td><input type="text" class="k-textbox" placeholder="Ingrese nombre" required/></td>
            </tr>
            <tr>
            	<td><label>Apellidos</label></td>
                <td><input type="text" class="k-textbox" placeholder="Ingrese apellidos" required/></td>
            </tr>
            <tr>
            	<td><label>DNI</label></td>
                <td><input type="text" class="k-textbox" placeholder="Ingrese Nro.de DNI" required/></td>
            </tr>
            <tr>
            	<td><label>Telefono</label></td>
                <td><input type="text" class="k-textbox" placeholder="Ingrese Nro.Telefonico" required/></td>
            </tr>
            <tr>
            	<td><label>Direccion</label></td>
                <td><input type="text" class="k-textbox" placeholder="Ingrese direccion" required/></td>
            </tr>
            <tr>
            	<td><label>Ubigeo</label></td>
                <td>
                	<select class="combo" placeholder="Seleccione..." required>
                    	<option></option>
                        <option>Tarapoto</option>
                        <option>Lima</option>
                        <option>Tacna</option>
                        <option>Loreto</option>
                        <option>Trujillo</option>
                    </select>
            	</td>
            </tr>
            <tr>
            	<td><label>Profesion</label></td>
                <td>
                	<select class="combo" placeholder="Seleccione..." required>
                    	<option></option>
                    </select>
            	</td>
            </tr>
            <tr>
            	<td><label>Fecha de Nacimiento</label></td>
                <td><input class="datepicker" value="" placeholder="Seleccione fecha" required/></td>
            </tr>
            <tr>
            	<td><label>Fecha de Contratacion</label></td>
                <td><input class="datepicker" value="" placeholder="Seleccione fecha" required/></td>
            </tr>
            <tr>
            	<td><label>Perfil</label></td>
                <td>
                	<select class="combo"  placeholder="Seleccione..." required>
                    	<option></option>
                    </select>
            	</td>
            </tr>
            <tr>
            	<td><label>Usuario</label></td>
                <td><input type="text" class="k-textbox" placeholder="Ingrese usuario" required/></td>
            </tr>
            <tr>
            	<td><label>Clave</label></td>
                <td><input type="password" class="k-textbox" placeholder="Ingrese clave" required/></td>
            </tr>
            <tr>
            	<td><label>Estado</label></td>
                <td>
                	<input type="radio" name="estado"/>Activo
                    <input type="radio" name="estado"/>Inactivo
                </td>
            </tr>
            <tr>
            	<td colspan="2" align="center"><button type="submit" class="k-button">Guardar</button></td>
            </tr>
        </table>
    </form>
<?php require("../pie.php"); ?>