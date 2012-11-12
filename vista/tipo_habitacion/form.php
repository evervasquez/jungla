<form method="post" action="<?php if(isset ($this->action))echo $this->action ?>" id="frm">
    <input type="hidden" name="guardar" id="guardar" value="1"/>
    <table width="50%" align="center" class="tabForm">
        <caption><h3><?php echo $this->titulo ?></h3></caption>
        <tr>
            <td><label>Codigo:</label></td>
            <td><input type="text" class="k-textbox" readonly="readonly" name="codigo" id="codigo"
                       value="<?php if(isset ($this->datos[0]['idtipo_habitacion']))echo $this->datos[0]['idtipo_habitacion']?>"/></td>
        </tr>
        <tr>
            <td><label>Descripcion:</label></td>
            <td><input type="text" class="k-textbox" placeholder="Ingrese tipo de habitacion" required name="descripcion" onkeypress="return soloLetras(event)"
                       id="descripcion" value="<?php if(isset ($this->datos[0]['descripcion']))echo $this->datos[0]['descripcion']?>"/></td>
        </tr>
        <tr>
            <td><label>Costo:</label></td>
            <td><input type="text" class="k-textbox" placeholder="Ingrese costo" required name="costo" 
                       id="costo" value="<?php if(isset ($this->datos[0]['costo']))echo $this->datos[0]['costo']?>"/></td>
        </tr>
        <tr>
            <td><label>Nro de camas:</label></td>
            <td><input type="text" class="k-textbox" placeholder="Ingrese nro de camas" required name="camas" 
                       id="camas" value="<?php if(isset ($this->datos[0]['camas']))echo $this->datos[0]['camas']?>"/></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <p><button type="submit" class="k-button" id="saveform">Guardar</button>
                <a href="<?php echo BASE_URL ?>tipo_habitacion" class="k-button cancel">Cancelar</a></p>
            </td>
        </tr>
    </table>
</form>