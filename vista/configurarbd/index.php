<h3>Configurar Base de Datos</h3>
<form method="post" action="<?php if(isset ($this->action))echo $this->action ?>">
    <input type="hidden" name="guardar" id="guardar" value="1"/>
    <table>
        <tr>
            <td><label>SGBD: </label></td>
            <td>
                <select placeholder="Seleccione..." class="combo" name="sgbd">
                    <option></option>
                    <option value="mysql">MySQL</option>            
                    <option value="pgsql">PostgreSQL</option>            
                    <option value="mssql">SQL Server</option>            
                    <option value="oci">Oracle</option>            
                </select>
            </td>
        </tr>
        <tr>
            <td><label>Usuario: </label></td>
            <td><input type="text" placeholder="Ingrese usuario" class="k-textbox" name="usuario" value="" /></td>
        </tr>
        <tr>
            <td><label>Clave: </label></td>
            <td><input type="password" placeholder="Ingrese contraseña" class="k-textbox" name="contraseña" value="" /></td>
        </tr>
        <tr>
            <td><label>Host: </label></td>
            <td><input type="text" placeholder="Ingrese host" class="k-textbox" name="host" value="" /></td>
        </tr>
        <tr>
            <td><label>Puerto: </label></td>
            <td><input type="text" placeholder="Ingrese puerto" class="k-textbox" name="puerto" value="" /></td>
        </tr>
        <tr>
            <td><label>Base de Datos: </label></td>
            <td><input type="text" placeholder="Ingrese nombre bd" class="k-textbox" name="basedatos" value="" /></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <p><button type="submit" class="k-button" id="saveform">Guardar</button>
                <a href="<?php echo BASE_URL ?>" class="k-button cancel">Cancelar</a></p>
            </td>
        </tr>
    </table>
</form>
