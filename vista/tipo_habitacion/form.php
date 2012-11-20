<form method="post" action="<?php if(isset ($this->action))echo $this->action ?>" id="frm">
    <input type="hidden" name="guardar" id="guardar" value="1"/>
    <h3><?php echo $this->titulo ?></h3>
    <div id="tabla">
    <table align="center" class="tabForm">
        <tr>
            <td><label>Codigo:</label></td>
            <td><input type="text" class="k-textbox" readonly="readonly" name="codigo" id="codigo"
                       value="<?php if(isset ($this->datos[0]['idtipo_habitacion']))echo $this->datos[0]['idtipo_habitacion']?>"/></td>
            <td>
                <div class="msgerror"></div>
            </td>
        </tr>
        <tr>
            <td><label for="descripcion">Descripcion:</label></td>
            <td><input type="text" class="k-textbox" placeholder="Ingrese tipo de habitacion" required name="descripcion" onkeypress="return soloLetras(event)"
                       id="descripcion" value="<?php if(isset ($this->datos[0]['descripcion']))echo $this->datos[0]['descripcion']?>"/></td>
            <td>
                <div class="k-invalid-msg msgerror" data-for="descripcion"></div>
            </td>
        </tr>
        <tr>
            <td><label for="costo">Costo:</label></td>
            <td><input type="text" class="precio" placeholder="Ingrese costo" required name="costo" 
                       id="costo" value="<?php if(isset ($this->datos[0]['costo']))echo $this->datos[0]['costo']?>"/></td>
            <td>
                <div class="k-invalid-msg msgerror" data-for="costo"></div>
            </td>
        </tr>
        <tr>
            <td><label for="camas">Numero de camas:</label></td>
            <td><input type="text" class="cantidad" placeholder="Ingrese nro de camas" required name="camas" 
                       id="camas" value="<?php if(isset ($this->datos[0]['camas']))echo $this->datos[0]['camas']?>"/></td>
            <td>
                <div class="k-invalid-msg msgerror" data-for="camas"></div>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <p><button type="submit" class="k-button" id="saveform">Guardar</button>
                <a href="<?php echo BASE_URL ?>tipo_habitacion" class="k-button cancel">Cancelar</a></p>
            </td>
            <td>
                <div class="msgerror"></div>
            </td>
        </tr>
    </table>
    </div>
</form>