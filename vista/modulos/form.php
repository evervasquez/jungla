<form method="post" action="<?php if(isset ($this->action))echo $this->action ?>">
    <input type="hidden" name="guardar" id="guardar" value="1"/>
    <table width="50%" align="center">
        <caption><h3><?php echo $this->titulo ?></h3></caption>
        <tr>
            <td><label>Codigo:</label></td>
            <td><input type="text" class="k-textbox" readonly="readonly" name="codigo" id="codigo"
                       value="<?php if(isset ($this->datos[0]['idmodulo']))echo $this->datos[0]['idmodulo']?>"/></td>
        </tr>
        <tr>
            <td><label>Descripcion:</label></td>
            <td><input type="text" class="k-textbox" placeholder="Ingrese modulo" required name="descripcion"
                       id="descripcion" value="<?php if(isset ($this->datos[0]['descripcion']))echo $this->datos[0]['descripcion']?>"/></td>
        </tr>
        
        <tr>
            <td><label>Url:</label></td>
            <td><input type="text" class="k-textbox" placeholder="Ingrese url" required required name="url"
                       id="descripcion" value="<?php if(isset ($this->datos[0]['url']))echo $this->datos[0]['url']?>"/></td>
        </tr>
        <tr>
            <td><label>Modulo Padre:</label></td>
            <td>
                <select class="combo" placeholder="Seleccione..." required name="modulo_padre">
                    <option></option>
                    <?php for($i=0;$i<count($this->modulos_padre);$i++){ ?>
                        <?php if( $this->datos[0]['idmodulo_padre'] == $this->modulos_padre[$i]['idmodulo'] ){ ?>
                    <option value="<?php echo $this->modulos_padre[$i]['idmodulo'] ?>" selected="selected"><?php echo $this->modulos_padre[$i]['descripcion'] ?></option>
                        <?php } else { ?>
                    <option value="<?php echo $this->modulos_padre[$i]['idmodulo'] ?>"><?php echo $this->modulos_padre[$i]['descripcion'] ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label>Estado:</label></td>
            <td>
                <?php if (isset ($this->datos[0]['estado']) && $this->datos[0]['estado']==0) {?>
                    <input type="radio" name="estado" value ="1" />Activo
                    <input type="radio" name="estado" value="0" checked="checked"/>Inactivo
                <?php } else { ?>
                <input type="radio" name="estado" value ="1" checked="checked"/>Activo
                <input type="radio" name="estado" value="0" />Inactivo
                <?php } ?>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <p><button type="submit" class="k-button">Guardar</button>
                <a href="<?php echo BASE_URL ?>modulos" class="k-button">Cancelar</a></p>
            </td>
        </tr>
    </table>
</form>