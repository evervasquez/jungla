<?php require("../cabecera.php");?>
	<form method="post" action="#">
    	<table width="50%">
        	<caption><h3>Registrar Cliente</h3></caption>
            <tr>
            	<td><label>Codigo</label></td>
                <td><input type="text" readonly="readonly" class="k-textbox"/></td>
            </tr>
            <tr>
            	<td><label>Nombre</label></td>
                <td><input type="text" class="k-textbox" placeholder="Ingrese nombre" required/></td>
            </tr>
            <tr>
            	<td><label>Apellidos</label></td>
                <td><input type="text" class="k-textbox" placeholder="Ingrese apellidos" required /></td>
            </tr>
            <tr>
            	<td><label>Nro.Documento</label></td>
                <td><input type="text" class="k-textbox" placeholder="Ingrese nro.de documento" required /></td>
            </tr>
            <tr>
            	<td><label>Telefono</label></td>
                <td><input type="text" class="k-textbox" placeholder="Ingrese nro.telefonico" required /></td>
            </tr>
            <tr>
            	<td><label>Email</label></td>
                <td><input type="email" class="k-textbox" placeholder="Ingrese email" required /></td>
            </tr>
            <tr>
            	<td><label>Ubigeo</label></td>
                <td>
                	<select class="combo" placeholder="Seleccione...">
                    	<option></option>
                    </select>
            	</td>
            </tr>
            <tr>
            	<td><label>Membresia</label></td>
                <td>
                	<select class="combo" placeholder="Seleccione...">
                    	<option></option>
                    </select>
            	</td>
            </tr>
            <tr>
            	<td><label>Profesion</label></td>
                <td>
                	<select class="combo" placeholder="Seleccione...">
                    	<option></option>
                    </select>
            	</td>
            </tr>
            <tr>
            	<td><label>Fecha de Nacimiento</label></td>
                <td><input class="datepicker" value=""  placeholder="Seleccione fecha"/></td>
            </tr>
            <tr>
            	<td><label>Sexo</label></td>
                <td>
                	<input type="radio" name="sexo" />M
                    <input type="radio" name="sexo" />F
                <td>
            </tr>
            <tr>
            	<td><label>Estado Civil</label></td>
                <td>
                	<select class="combo" placeholder="Seleccione...">
                    	<option></option>
                    </select>
            	</td>
            </tr>
            <tr>
            	<td colspan="2" align="center"><button type="submit" class="k-button">Guardar</button></td>
            </tr>
        </table>
    </form>
<?php require("../pie.php"); ?>