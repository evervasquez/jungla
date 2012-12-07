<form method="post" action="<?php if(isset ($this->action))echo $this->action ?>" id="frm">
    <input type="hidden" name="guardar" id="guardar" value="1"/>
    <h3><?php echo $this->titulo ?></h3>
    <div id="tabla">
    <table align="center" class="tabForm">
        <tr>
            <td><label>Codigo:</label></td>
            <td><input type="text" class="k-textbox" readonly="readonly" name="codigo" id="codigo"
                       value="<?php if(isset ($this->datos[0]['IDMODULO']))echo $this->datos[0]['IDMODULO']?>"/></td>
            <td>
                <div class="msgerror"></div>
            </td>
        </tr>
        <tr>
            <td><label for="descripcion">Descripcion:</label></td>
            <td><input type="text" class="k-textbox" placeholder="Ingrese modulo" required name="descripcion" onkeypress="return soloLetras(event)"
                       id="descripcion" value="<?php if(isset ($this->datos[0]['DESCRIPCION']))echo $this->datos[0]['DESCRIPCION']?>"/></td>
            <td>
                <div class="k-invalid-msg msgerror" data-for="descripcion"></div>
            </td>
        </tr>
        <tr>
            <td><label for="url">Url:</label></td>
            <td><input type="text" class="k-textbox" placeholder="Ingrese url" required required name="url"
                       id="url" value="<?php if(isset ($this->datos[0]['URL']))echo $this->datos[0]['URL']?>"/></td>
            <td>
                <div class="k-invalid-msg msgerror" data-for="url"></div>
            </td>
        </tr>
        <tr>
            <td><label for="modulo_padre">Modulo Padre:</label></td>
            <td>
                <select class="combo" placeholder="Seleccione..." required name="modulo_padre">
                    <option></option>
                    <?php for($i=0;$i<count($this->modulos_padre);$i++){ ?>
                        <?php if( $this->datos[0]['IDMODULO_PADRE'] == $this->modulos_padre[$i]['IDMODULO'] ){ ?>
                    <option value="<?php echo $this->modulos_padre[$i]['IDMODULO'] ?>" selected="selected"><?php echo $this->modulos_padre[$i]['DESCRIPCION'] ?></option>
                        <?php } else { ?>
                    <option value="<?php echo $this->modulos_padre[$i]['IDMODULO'] ?>"><?php echo $this->modulos_padre[$i]['DESCRIPCION'] ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
            </td>
            <td>
                <div class="k-invalid-msg msgerror" data-for="modulo_padre"></div>
            </td>
        </tr>
        <tr>
            <td><label>Estado:</label></td>
            <td>
                <?php if (isset ($this->datos[0]['ESTADO']) && $this->datos[0]['ESTADO']==0) {?>
                    <input type="radio" name="estado" value ="1" />Activo
                    <input type="radio" name="estado" value="0" checked="checked"/>Inactivo
                <?php } else { ?>
                <input type="radio" name="estado" value ="1" checked="checked"/>Activo
                <input type="radio" name="estado" value="0" />Inactivo
                <?php } ?>
            </td>
            <td>
                <div class="msgerror"></div>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <p><button type="submit" class="k-button" id="saveform">Guardar</button>
                <a href="<?php echo BASE_URL ?>modulos" class="k-button cancel">Cancelar</a></p>
            </td>
            <td>
                <div class="msgerror"></div>
            </td>
        </tr>
    </table>
    </div>
</form>