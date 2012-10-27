	<form method="post" action="#">
        <fieldset>
            <legend><h3>Registrar Empleado</h3></legend>
    	<table width="50%" align="center" class="tabForm">
            <tr>
                <td align="center"><label>Codigo</label></td>
                <td><input type="text" class="k-textbox" disabled="disabled" /></td>
            </tr>
            <tr>
            	<td><label>Nombre</label></td>
                <td><input type="text" class="k-textbox" placeholder="Ingrese nombre" required/></td>
                <td><label>Apellidos</label></td>
                <td><input type="text" class="k-textbox" placeholder="Ingrese apellidos" required onkeypress="return soloLetras(event)"/></td>
            </tr>
            <tr>
            	<td><label>DNI</label></td>
                <td><input type="text" class="k-textbox" placeholder="Ingrese Nro.de DNI" required onKeyPress="return soloNumeros(event);" maxlength="8"/></td>
                <td><label>Telefono</label></td>
                <td><input type="text" class="k-textbox" placeholder="Ingrese Nro.Telefonico" required/></td>
            </tr>
            <tr>
            	<td><label>Direccion</label></td>
                <td><input type="text" class="k-textbox" placeholder="Ingrese direccion" required/></td>
                <td><label>Ubigeo</label></td>
                <td>
                    <select class="combo" placeholder="Seleccione..." required>
                    	<option value="0"></option>
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
                <td><label>Fecha de Nacimiento</label></td>
                <td><input class="datepicker" readonly="readonly" value="" placeholder="Seleccione fecha" required/></td>
            </tr>
            <tr>
            	<td><label>Fecha de Contratacion</label></td>
                <td><input class="datepicker" readonly="readonly" value="" placeholder="Seleccione fecha" required/></td>
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
            	<td colspan="4" align="center"><button type="submit" class="k-button">Guardar</button></td>
            </tr>
        </table>
        </fieldset>
    </form>